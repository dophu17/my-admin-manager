<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\ProductModel;
use App\Http\Models\ImageModel;

use Hash;
use DB;
use Input;
use Validator;
use Auth;
use Session;
use File;

class ProductController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$clsProduct 				= new ProductModel();
		$data 						= array();

		$data['titleContent'] 		= 'Products';
		$data['lists'] 				= $clsProduct->getAll();

		return view('backend.products.index', $data);
	}


	public function getAdd()
	{
		$data 					= array();

		$data['titleContent'] 	= 'Add product';

		return view('backend.products.add', $data);
	}


	public function postAdd()
	{
		$clsProduct 			= new ProductModel();
		$clsImage 				= new ImageModel();
		$inputs 				= Input::all();
		$avatar					= Input::file('avatar');

		$rules 					= $clsProduct->rules();
		$messages 				= $clsProduct->messages();

		$validator  = Validator::make($inputs, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->route('backend.products.add')->withErrors($validator)->withInput();
        }

        $datas = $clsProduct->setValue($inputs);

        // image
        $imageName = NULL;
        if ( $avatar ) {
        	$imageName = time() . '-' . $avatar->getClientOriginalName();
        }
        $datas['avatar'] = $imageName;
        $datas['created_at'] = date('Y-m-d H:i:s');
        $status = $clsProduct->insertGetID($datas);

        if ( $status ) {
        	// upload image
    		if ( $avatar ) {
    			$avatar->move(public_path() . '/uploads/products/', $imageName);
    		}

	        // insert album and upload image
	        if ( !empty($inputs['images']) ) {
	        	foreach ( $inputs['images'] as $item ) {
	        		$imageName = time() . '-' . $item->getClientOriginalName();
		        	$dataImages = array(
		        		'product_id' 	=> $status,
		        		'name'			=> $imageName,
		        	);
			        $statusImage = $clsImage->insert($dataImages);
			        if ( $statusImage ) {
			        	$item->move(public_path() . '/uploads/products/', $imageName);
			        }
		        }
	        }

        	Session::flash('success', trans('common.message_add_success'));
        } else {
        	Session::flash('faild', trans('common.message_add_faild'));
        }

		return redirect()->route('backend.products');
	}


	public function getEdit($id)
	{
		$clsProduct 				= new ProductModel();
		$clsImage					= new ImageModel();
		$data 						= array();

		$data['titleContent'] 		= 'Edit product';
		$data['product'] 			= $clsProduct->getByID($id);
		$data['productImages']		= $clsImage->getImageProduct($id);

		if ( empty($data['product']) ) {
			return response()->view('errors.page_404', [], 404);
		}

		return view('backend.products.edit', $data);
	}


	public function postEdit($id)
	{
		$clsProduct 			= new ProductModel();
		$clsImage				= new ImageModel();

		$inputs 				= Input::all();
		$avatar					= Input::file('avatar');
		$images					= Input::file('images');
		$images_old				= Input::get('images_old');

		$product 				= $clsProduct->getByID($id);
		$productImagesAlbum		= $clsImage->getImageProduct($id);
		$rules 					= $clsProduct->rules();
		$messages 				= $clsProduct->messages();

		$validator  = Validator::make($inputs, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->route('backend.products.edit', [ $id ])->withErrors($validator)->withInput();
        }

        $datas = $clsProduct->setValue($inputs);

        // avatar
        $imageName = NULL;
    	if ( $avatar ) {
    		$imageName = time() . '-' . $avatar->getClientOriginalName();
    	} else {
    		if ( empty($inputs['avatar_old']) ) {
    			$imageName = null;
    		} else {
	        	$imageName = $product->avatar;
	        }
    	}

        
        $datas['avatar'] = $imageName;
        $datas['updated_at'] = date('Y-m-d H:i:s');
        $status = $clsProduct->update($id, $datas);

        if ( $status ) {
        	// upload avatar
        	if (  $avatar ) {
	        	// delete old avatar
	        	if ( File::exists(public_path() . '/uploads/products/' . $product->avatar) ) {
	        		File::delete(public_path() . '/uploads/products/' . $product->avatar);
	        	}
	        	// update new avatar
        		if ( $avatar ) {
        			$avatar->move(public_path() . '/uploads/products/',  $imageName);	
        		}
	        } else {
	        	if ( empty($inputs['avatar_old']) ) {
	    			// delete old avatar
		        	if ( File::exists(public_path() . '/uploads/products/' . $product->avatar) ) {
		        		File::delete(public_path() . '/uploads/products/' . $product->avatar);
		        	}
	    		}
	        }

	        // upload images album
	        // delete old images album
        	$clsImage->deleteImageProduct($id);
	        if ( !empty($productImagesAlbum) ) {
	        	foreach ( $productImagesAlbum as $item ) {
	        		if ( $images_old ) {
	        			if ( !in_array($item->name, $images_old) ) {
		        			if ( File::exists(public_path() . '/uploads/products/' . $item->name) ) {
				        		File::delete(public_path() . '/uploads/products/' . $item->name);
				        	}
		        		}
	        		}
	        	}
	        }

	    	if ( $images_old ) {
	    		foreach ( $images_old as $item ) {
	        		$dataImagesAlbum 	= array(
	    				'product_id' 	=> $id,
	    				'name' 			=> $item,
					);
					$clsImage->insert($dataImagesAlbum);
	        	}
	    	}
	        
	        // update new images album
	    	$imageProductName = null;
	    	if ( $images ) {
	    		foreach ( $images as $k => $v ) {
		    		if ( $v ) {
		    			$imageProductName = time() . '-' . $v->getClientOriginalName();
		    			$dataImagesAlbum 	= array(
		    				'product_id' 	=> $id,
		    				'name' 			=> $imageProductName,
						);
						$statusImageAlbum = $clsImage->insert($dataImagesAlbum);
		    			if ( $statusImageAlbum ) {
		    				$v->move(public_path() . '/uploads/products/',  $imageProductName);
		    			}
		    		}
		    	}
	    	}

        	Session::flash('success', trans('common.message_update_success'));
        } else {
        	Session::flash('faild', trans('common.message_update_faild'));
        }

		return redirect()->route('backend.products');
	}


	public function getDelete($id)
	{
		$clsProduct 			= new ProductModel();

		$product 				= $clsProduct->getByID($id);
		$productImagesAlbum		= $clsImage->getImageProduct($id);
		$status 				= $clsProduct->delete($id);

        if ( $status ) {
        	// delete avatar
        	if ( File::exists(public_path() . '/uploads/products/' . $product->avatar) ) {
        		File::delete(public_path() . '/uploads/products/' . $product->avatar);
        	}
        	// delete album
        	foreach ( $productImagesAlbum as $item) {
        		$clsImage->delete($item->id);
        		if ( File::exists(public_path() . '/uploads/products/' . $item->name) ) {
	        		File::delete(public_path() . '/uploads/products/' . $item->name);
	        	}
        	}
        	Session::flash('success', trans('common.message_delete_success'));
        } else {
        	Session::flash('faild', trans('common.message_delete_faild'));
        }

		return redirect()->route('backend.products');
	}
}