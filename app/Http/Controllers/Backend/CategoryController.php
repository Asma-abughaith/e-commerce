<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
 
class CategoryController extends Controller
{
    public function CategoryView()
	{
    	$category = Category::latest()->get();
    	return view('backend.category.category_view',compact('category'));
    }

    public function CategoryStore(Request $request){

       $request->validate([
    		'category_name_en' => 'required',
    		'category_name_ar' => 'required',
    	],[
    		'category_name_en.required' => 'Input Category English Name',
    		'category_name_ar.required' => 'Input Category Arabic Name',
    	]);

		Category::insert([
		'category_name_en' => $request->category_name_en,
		'category_name_ar' => $request->category_name_ar,
		'category_slug_en' => strtolower(str_replace(' ', '-',$request->category_name_en)),
		'category_slug_ar' => str_replace(' ', '-',$request->category_name_ar),
		'created_at'=>Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'Category Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 


    public function CategoryEdit($id){
		try{

			if (!Category::find($id)) {
				throw new \Exception('we didn\'t find the category to edit it');
			}
			$category = Category::findOrFail($id);
			return view('backend.category.category_edit',compact('category'));
		}catch (\Exception $e) {
			$notification = [
				'message' => $e->getMessage(),
				'alert-type' => 'error'
			];
			return redirect()->route('all.brand')->with($notification);
		}

    }


    public function CategoryUpdate(Request $request ,$id)
	{
      Category::findOrFail($id)->update([
		'category_name_en' => $request->category_name_en,
		'category_name_ar' => $request->category_name_ar,
		'category_slug_en' => strtolower(str_replace(' ', '-',$request->category_name_en)),
		'category_slug_ar' => str_replace(' ', '-',$request->category_name_ar),
		'updated_at'=>Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'Category Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('all.category')->with($notification);


    } // end method


    public function CategoryDelete($id)
	{
		try{

		if (!Category::find($id)) {
			throw new \Exception('we didn\'t find the category to delete it');
		}
		Category::findOrFail($id)->delete();
		$notification = array(
			'message' => 'Category Deleted Successfully',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
		} catch (\Exception $e) {
			$notification = [
				'message' => $e->getMessage(),
				'alert-type' => 'error'
			];
			return redirect()->route('all.category')->with($notification);
		}
    } // end method 


}
 