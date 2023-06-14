<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;
use Carbon\Carbon;

class BrandController extends Controller
{
    public function BrandView()
    {
        $brands = Brand::latest()->get();
    	return view('backend.brand.brand_view',compact('brands'));
    }

    public function BrandStore(Request $request)
    {
        $request->validate([
    		'brand_name_en' => 'required',
    		'brand_name_ar' => 'required',
    		'brand_image' => 'required',
    	],[
    		'brand_name_en.required' => 'Input Brand English Name',
    		'brand_name_ar.required' => 'Input Brand Arabic Name',
    	]);

    	$image = $request->file('brand_image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
    	$save_url = 'upload/brand/'.$name_gen;

	    Brand::insert([
		'brand_name_en' => $request->brand_name_en,
		'brand_name_ar' => $request->brand_name_ar,
		'brand_slug_en' => strtolower(str_replace(' ', '-',$request->brand_name_en)),
		'brand_slug_ar' => str_replace(' ', '-',$request->brand_name_ar),
		'brand_image' => $save_url,
        'created_at'=>Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'Brand Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    }

	public function BrandEdit($id)
	{
    	try{

			if (!Brand::find($id)) {
				throw new \Exception('we didn\'t find the brand to edit it');
			}
			$brand = Brand::findOrFail($id);
			return view('backend.brand.brand_edit',compact('brand'));
		}catch (\Exception $e) {
			$notification = [
				'message' => $e->getMessage(),
				'alert-type' => 'error'
			];
			return redirect()->route('all.brand')->with($notification);
		}

    }

	public function BrandUpdate(Request $request)
	{
    	$brand_id = $request->id;
    	$old_img = $request->old_image;

    	if ($request->file('brand_image')) {

    	unlink($old_img);
    	$image = $request->file('brand_image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
    	$save_url = 'upload/brand/'.$name_gen;

		Brand::findOrFail($brand_id)->update([
		'brand_name_en' => $request->brand_name_en,
		'brand_name_ar' => $request->brand_name_ar,
		'brand_slug_en' => strtolower(str_replace(' ', '-',$request->brand_name_en)),
		'brand_slug_ar' => str_replace(' ', '-',$request->brand_name_ar),
		'brand_image' => $save_url,
		'updated_at'=>Carbon::now(),


    	]);

	    $notification = array(
			'message' => 'Brand Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('all.brand')->with($notification);

    	}else{

    	Brand::findOrFail($brand_id)->update([
		'brand_name_en' => $request->brand_name_en,
		'brand_name_ar' => $request->brand_name_ar,
		'brand_slug_en' => strtolower(str_replace(' ', '-',$request->brand_name_en)),
		'brand_slug_ar' => str_replace(' ', '-',$request->brand_name_ar),
		

    	]);

	    $notification = array(
			'message' => 'Brand Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('all.brand')->with($notification);
	}
    }


	public function BrandDelete($id)
	{
		try{

		if (!Brand::find($id)) {
			throw new \Exception('we didn\'t find the brand to delete it');
		}
    	$brand = Brand::findOrFail($id);
		$brand->delete();
		$img = $brand->brand_image;
    	unlink($img);
		$notification = array(
			'message' => 'Brand deleted Successfully',
			'alert-type' => 'success'
		);
		return redirect()->route('all.brand')->with($notification);
		} catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->route('all.brand')->with($notification);
        }
    }
    
}