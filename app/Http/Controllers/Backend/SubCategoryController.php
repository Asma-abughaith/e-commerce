<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Carbon\Carbon;
use Image;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){

    	$categories = Category::orderBy('category_name_en','ASC')->get();
    	$subcategory = SubCategory::latest()->get();
    	return view('backend.category.subcategory_view',compact('subcategory','categories'));

    }

    public function SubCategoryAdd()
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('backend.category.subcategory_add',compact('categories'));
  
    }
    public function SubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_ar' => 'required',
            'subcategory_image'=> 'required',
        ],[
            'category_id.required' => 'Please select any option',
            'subcategory_name_en.required' => 'Input SubCategory English Name',
        ]);
    
        if ($request->hasFile('subcategory_image')) {
            $image = $request->file('subcategory_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/subcategory/' . $name_gen);
            $save_url = 'upload/subcategory/' . $name_gen;
        } else {
            $save_url = null; // Set a default value or handle the missing image case as required.
        }
    
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_ar' => str_replace(' ', '-', $request->subcategory_name_ar),
            'subcategory_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
    
        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.subcategory')->with($notification);
    }

    public function SubCategoryEdit($id)
    {
        try{

            if (!SubCategory::find($id)) {
                throw new \Exception('we didn\'t find the sub-category to edit it');
            }
            $categories = Category::orderBy('category_name_en','ASC')->get();
            $subcategory = SubCategory::findOrFail($id);
            return view('backend.category.subcategory_edit',compact('subcategory','categories'));
        }catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->route('all.subcategory')->with($notification);
        }
    }

    public function SubCategoryUpdate(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_ar' => 'required',
            'subcategory_image'=> 'required',
        ],[
            'category_id.required' => 'Please select any option',
            'subcategory_name_en.required' => 'Input SubCategory English Name',
        ]);

    	$subcat_id = $request->id;

        if ($request->hasFile('subcategory_image')) {
            $image = $request->file('subcategory_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/subcategory/' . $name_gen);
            $save_url = 'upload/subcategory/' . $name_gen;
        } 
    	 SubCategory::findOrFail($subcat_id)->update([
		'category_id' => $request->category_id,
		'subcategory_name_en' => $request->subcategory_name_en,
		'subcategory_name_ar' => $request->subcategory_name_ar,
		'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
		'subcategory_slug_ar' => str_replace(' ', '-',$request->subcategory_name_ar),
        'subcategory_image' => $save_url,
        'updated_at' => Carbon::now(),
		 

    	]);

	    $notification = array(
			'message' => 'SubCategory Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('all.subcategory')->with($notification);

    }  // end method


    public function SubCategoryDelete($id){
        try{
        if (!SubCategory::find($id)) {
            throw new \Exception('we didn\'t find the sub-Category to delete it');
        }
    	$subcategory=SubCategory::findOrFail($id);
        $subcategory->delete();
        $img = $subcategory->subcategory_image;
    	unlink($img);
    	$notification = array(
			'message' => 'SubCategory Deleted Successfully',
			'alert-type' => 'info'
		);
		return redirect()->route('all.subcategory')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->route('all.subcategory')->with($notification);
        }
    }


    


    
    

}