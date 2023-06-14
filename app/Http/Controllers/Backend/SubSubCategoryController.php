<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Models\SubCategory;
use App\Models\Category;
use Carbon\Carbon;
use Image;
use App\Helpers\ApiResponse;

class SubSubCategoryController extends Controller
{
    public function SubSubCategoryView()
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
    	return view('backend.category.sub_subcategory_view',compact('subsubcategory','categories'));
    }
    
    public function SubSubCategoryAdd()
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('backend.category.subsubcategory_add',compact('categories'));
  
    }
    public function GetSubCategory(Request $request)
    {
        $category_id = $request->category_id;
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        if ($category_id){
            return ApiResponse::sendResponse(200, 'all data fetched', $subcat);
        }
        return ApiResponse::sendResponse(200, 'there is no data to fetch', []);
    }

    public function SubSubCategoryStore(Request $request){

        $request->validate([
             'category_id' => 'required',
             'subcategory_id' => 'required',
             'subsubcategory_name_en' => 'required',
             'subsubcategory_name_ar' => 'required',
         ],[
             'category_id.required' => 'Please select Any option',
             'subsubcategory_name_en.required' => 'Input SubSubCategory English Name',
         ]);

         if ($request->hasFile('subsubcategory_image')) {
            $image = $request->file('subsubcategory_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/subsubcategory/' . $name_gen);
            $save_url = 'upload/subsubcategory/' . $name_gen;
        }
 
        SubSubCategory::insert([
         'category_id' => $request->category_id,
         'subcategory_id' => $request->subcategory_id,
         'subsubcategory_name_en' => $request->subsubcategory_name_en,
         'subsubcategory_name_ar' => $request->subsubcategory_name_ar,
         'subsubcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subsubcategory_name_en)),
         'subsubcategory_slug_ar' => str_replace(' ', '-',$request->subsubcategory_name_ar),
         'subsubcategory_image' => $save_url,
         'created_at' => Carbon::now(),
          
 
         ]);
 
         $notification = array(
             'message' => 'Sub-SubCategory Inserted Successfully',
             'alert-type' => 'success'
         );
 
         return redirect()->route('all.subsubcategory')->with($notification);
 
     } // end method 

     public function SubSubCategoryEdit($id){
    	try{

            if (!SubSubCategory::find($id)) {
                throw new \Exception('we didn\'t find the sub-sub-category to edit it');
            }
            $categories = Category::orderBy('category_name_en','ASC')->get();
            $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
            $subsubcategories = SubSubCategory::findOrFail($id);
            return view('backend.category.sub_subcategory_edit',compact('categories','subcategories','subsubcategories'));
        }catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->route('all.subcategory')->with($notification);
        }

    }

    public function SubSubCategoryUpdate(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_ar' => 'required',
            'subsubcategory_image'=> 'required',
        ],[
            'category_id.required' => 'Please select any option',
            'subsubcategory_name_en.required' => 'Input SubCategory English Name',
        ]);
        $subsubcat_id = $request->id;
        if ($request->hasFile('subsubcategory_image')) {
            $image = $request->file('subsubcategory_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/subsubcategory/' . $name_gen);
            $save_url = 'upload/subsubcategory/' . $name_gen;
        }
    	SubSubCategory::findOrFail($subsubcat_id)->update([
		'category_id' => $request->category_id,
		'subcategory_id' => $request->subcategory_id,
		'subsubcategory_name_en' => $request->subsubcategory_name_en,
		'subsubcategory_name_ar' => $request->subsubcategory_name_ar,
		'subsubcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subsubcategory_name_en)),
		'subsubcategory_slug_ar' => str_replace(' ', '-',$request->subsubcategory_name_ar),
        'subsubcategory_image' => $save_url,
        'updated_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'Sub-SubCategory Update Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('all.subsubcategory')->with($notification);

    } // end method 


    public function SubSubCategoryDelete($id)
    {

        try{
            if (!SubSubCategory::find($id)) {
                throw new \Exception('we didn\'t find the sub-sub-Category to delete it');
            }
            $subsubcategory=SubSubCategory::findOrFail($id);
            $subsubcategory->delete();
            $img = $subsubcategory->subsubcategory_image;
            unlink($img);
            $notification = array(
                'message' => 'Sub-Sub-Category Deleted Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.subsubcategory')->with($notification);
            } catch (\Exception $e) {
                $notification = [
                    'message' => $e->getMessage(),
                    'alert-type' => 'error'
                ];
                return redirect()->route('all.subsubcategory')->with($notification);
            }

    }


    public function GetSubSubCategory(Request $request)
    {
        $subcategory_id = $request->subcategory_id;
        $subcat = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name_en', 'ASC')->get();
        if ($subcategory_id){
            return ApiResponse::sendResponse(200, 'all data fetched', $subcat);
        }
        return ApiResponse::sendResponse(200, 'there is no data to fetch', []);
    }

   


     
    
}