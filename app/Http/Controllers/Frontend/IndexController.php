<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\PasswordUpdateRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Helpers\ApiResponse;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Brand;
use App\Models\MultiImg;


class IndexController extends Controller
{
    public function index()
    {
    	$products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
    	$sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
    	$categories = Category::orderBy('category_name_en','ASC')->get();

    	$featured = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
    	$hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();

    	$special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(6)->get();

    	$special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();

    	$skip_category_0 = Category::skip(0)->first();
    	$skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

    	$skip_category_1 = Category::skip(1)->first();
    	$skip_product_1 = Product::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();



    	// return $skip_category->id;
    	// die();

    	return view('frontend.index',compact('categories','sliders','products','featured','hot_deals','special_offer','special_deals','skip_category_0','skip_product_0','skip_category_1','skip_product_1'));

    }

    public function UserLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function UserProfile()
    {
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);
    	return view('frontend.profile.user_profile',compact('user'));
    }

    public function UserProfileStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
            'phone' => 'required|string|max:255',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            $notification = [
                'message' => $validator->errors()->first(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification)->witarput();
        }
        try {
            $data = User::find(Auth::user()->id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            if ($request->file('profile_photo_path')) {
                $file = $request->file('profile_photo_path');
                @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/user_images'), $filename);
                $data->profile_photo_path = $filename;
            }
            $data->save();
            $notification = [
                'message' => 'User Profile Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('dashboard')->with($notification);
            
        } catch (\Exception $e) {
            $notification = [
                'message' => 'Failed to update user profile',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function UserChangePassword(){
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	return view('frontend.profile.change_password',compact('user'));
    }
   

    public function UserPasswordUpdate(PasswordUpdateRequest $request)
    {
        try {
            $hashedPassword = Auth::user()->password;
        
            if (!Hash::check($request->oldpassword, $hashedPassword)) {
                throw new \Exception('Old password is incorrect');
            }
        
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
        
            $notification = [
                'message' => 'User password updated successfully',
                'alert-type' => 'success'
            ];
        
            Auth::logout();
            return redirect()->route('login')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function ProductDetails($id,$slug){
		$product = Product::findOrFail($id);

		$color_en = $product->product_color_en;
		$product_color_en = explode(',', $color_en);

		$color_ar = $product->product_color_ar;
		$product_color_ar = explode(',', $color_ar);

		$size_en = $product->product_size_en;
		$product_size_en = explode(',', $size_en);

		$size_ar = $product->product_size_ar;
		$product_size_ar = explode(',', $size_ar);

		$multiImag = MultiImg::where('product_id',$id)->get();

		$cat_id = $product->category_id;
		$relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
	 	return view('frontend.product.product_details',compact('product','multiImag','product_color_en','product_color_ar','product_size_en','product_size_ar','relatedProduct'));

	}

    public function TagWiseProduct($tag){
		$products = Product::where('status',1)->where('product_tags_en',$tag)->where('product_tags_ar',$tag)->orderBy('id','DESC')->paginate(3);
		$categories = Category::orderBy('category_name_en','ASC')->get();
		return view('frontend.tags.tags_view',compact('products','categories'));

	}

    public function SubCatWiseProduct(Request $request, $subcat_id,$slug){
		$products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(3);
		$categories = Category::orderBy('category_name_en','ASC')->get();
		$breadsubcat = SubCategory::with(['category'])->where('id',$subcat_id)->get();
		///  Load More Product with Ajax 
		if ($request->ajax()) {
        $grid_view = view('frontend.product.grid_view_product',compact('products'))->render();
        $list_view = view('frontend.product.list_view_product',compact('products'))->render();
            return response()->json(['grid_view' => $grid_view,'list_view',$list_view]);	
		}
		///  End Load More Product with Ajax 
		return view('frontend.product.subcategory_view',compact('products','categories','breadsubcat'));
	}

    
    public function SubSubCatWiseProduct($subsubcat_id,$slug){
		$products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->paginate(6);
		$categories = Category::orderBy('category_name_en','ASC')->get();

		$breadsubsubcat = SubSubCategory::with(['category','subcategory'])->where('id',$subsubcat_id)->get();

		return view('frontend.product.sub_subcategory_view',compact('products','categories','breadsubsubcat'));

	}



    /// Product View With Ajax
	public function ProductViewAjax(Request $request)
    {
        $id = $request->id;
		$product = Product::with('category','brand')->findOrFail($id);

		$color = $product->product_color_en;
		$product_color = explode(',', $color);

		$size = $product->product_size_en;
		$product_size = explode(',', $size);

		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size,

		));

	} // end method 

 // Product Seach 
	public function ProductSearch(Request $request){

		$request->validate(["search" => "required"]);

		$item = $request->search;
		// echo "$item";
        $categories = Category::orderBy('category_name_en','ASC')->get();
		$products = Product::where('product_name_en','LIKE',"%$item%")->get();
		return view('frontend.product.search',compact('products','categories'));

	} // end method 


	///// Advance Search Options 

	public function SearchProduct(Request $request){

		$request->validate(["search" => "required"]);

		$item = $request->search;		 
        
		$products = Product::where('product_name_en','LIKE',"%$item%")->select('product_name_en','product_thambnail','selling_price','id','product_slug_en')->limit(5)->get();
		return view('frontend.product.search_product',compact('products'));



	} // end method 



    



    
    
}