<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\CategoryModel;

use Hash;
use DB;
use Input;
use Validator;
use Auth;
use Session;
use File;

class CategoryController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$clsCategory 			= new CategoryModel();
		$data 					= array();

		$data['titleContent'] 	= 'Categories';
		$data['lists'] 			= $clsCategory->getAll();

		return view('backend.categories.index', $data);
	}


	public function getAdd()
	{
		$data 					= array();

		$data['titleContent'] 	= 'Add category';

		return view('backend.categories.add', $data);
	}


	public function postAdd()
	{
		$clsCategory 			= new CategoryModel();
		$inputs 				= Input::all();
		$icon					= Input::file('icon');

		$rules 					= $clsCategory->rules();
		$messages 				= $clsCategory->messages();

		$validator  = Validator::make($inputs, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->route('backend.categories.add')->withErrors($validator)->withInput();
        }

        $datas = $clsCategory->setValue($inputs);

        // image
        $imageName = NULL;
        if ( $icon ) {
        	$imageName = time() . '-' . $icon->getClientOriginalName() . '.' . $icon->getClientOriginalExtension();
        }
        $datas['icon'] = $imageName;
        $datas['created_at'] = date('Y-m-d H:i:s');
        $status = $clsCategory->insert($datas);

        if ( $status ) {
        	// upload image
    		if ( $icon ) {
    			$icon->move(public_path() . '/uploads/categories/', $imageName);
    		}

        	Session::flash('success', trans('common.message_add_success'));
        } else {
        	Session::flash('faild', trans('common.message_add_faild'));
        }

		return redirect()->route('backend.categories');
	}


	public function getEdit($id)
	{
		$clsCategory 				= new CategoryModel();
		$data 						= array();

		$data['titleContent'] 		= 'Edit category';
		$data['category'] 			= $clsCategory->getByID($id);

		if ( empty($data['category']) ) {
			return response()->view('errors.page_404', [], 404);
		}

		return view('backend.categories.edit', $data);
	}


	public function postEdit($id)
	{
		$clsCategory 				= new CategoryModel();
		$inputs 					= Input::all();
		$icon						= Input::file('icon');

		$category 					= $clsCategory->getByID($id);
		$rules 						= $clsCategory->rules();
		$messages 					= $clsCategory->messages();

		$validator  				= Validator::make($inputs, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->route('backend.categories.edit', [ $id ])->withErrors($validator)->withInput();
        }

        $datas = $clsCategory->setValue($inputs);
        if ( empty($inputs['password']) ) {
        	unset($datas['password']);
        }

        // image
        $imageName = NULL;
    	if ( $icon ) {
    		$imageName = time() . '-' . $icon->getClientOriginalName();
    	} else {
    		if ( empty($inputs['icon_old']) ) {
    			$imageName = null;
    		} else {
	        	$imageName = $category->icon;
	        }
    	}
        $datas['icon'] = $imageName;
        $datas['updated_at'] = date('Y-m-d H:i:s');
        $status = $clsCategory->update($id, $datas);

        if ( $status ) {
        	// upload image
        	if ( $icon ) {
	        	// delete old image
	        	if ( File::exists(public_path() . '/uploads/categories/' . $category->icon) ) {
	        		File::delete(public_path() . '/uploads/categories/' . $category->icon);
	        	}
	        	// update new image
        		if ( $icon ) {
        			$icon->move(public_path() . '/uploads/categories/',  $imageName);	
        		}
	        } else {
	        	if ( empty($inputs['icon_old']) ) {
	    			// delete old icon
		        	if ( File::exists(public_path() . '/uploads/products/' . $category->icon) ) {
		        		File::delete(public_path() . '/uploads/products/' . $category->icon);
		        	}
	    		}
	        }

        	Session::flash('success', trans('common.message_update_success'));
        } else {
        	Session::flash('faild', trans('common.message_update_faild'));
        }

		return redirect()->route('backend.categories');
	}


	public function getDelete($id)
	{
		$clsCategory 		= new CategoryModel();

		$status 			= $clsCategory->delete($id);

        if ( $status ) {
        	Session::flash('success', trans('common.message_delete_success'));
        } else {
        	Session::flash('faild', trans('common.message_delete_faild'));
        }

		return redirect()->route('backend.categories');
	}
}