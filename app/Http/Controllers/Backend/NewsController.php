<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\NewsModel;

use Hash;
use DB;
use Input;
use Validator;
use Auth;
use Session;
use File;

class NewsController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$clsNews 					= new NewsModel();
		$data 						= array();

		$data['titleContent'] 		= 'News';
		$data['lists'] 				= $clsNews->getAll();

		return view('backend.news.index', $data);
	}


	public function getAdd()
	{
		$data 					= array();

		$data['titleContent'] 	= 'Add news';

		return view('backend.news.add', $data);
	}


	public function postAdd()
	{
		$clsNews 				= new NewsModel();
		$inputs 				= Input::all();
		$avatar					= Input::file('avatar');

		$rules 					= $clsNews->rules();
		$messages 				= $clsNews->messages();

		$validator  = Validator::make($inputs, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->route('backend.news.add')->withErrors($validator)->withInput();
        }

        $datas = $clsNews->setValue($inputs);

        // image
        $imageName = NULL;
        if ( $avatar ) {
        	$imageName = time() . '-' . $avatar->getClientOriginalName();
        }
        $datas['avatar'] = $imageName;
        $datas['created_at'] = date('Y-m-d H:i:s');
        $status = $clsNews->insertGetID($datas);

        if ( $status ) {
        	// upload image
    		if ( $avatar ) {
    			$avatar->move(public_path() . '/uploads/news/', $imageName);
    		}
        	Session::flash('success', trans('common.message_add_success'));
        } else {
        	Session::flash('faild', trans('common.message_add_faild'));
        }

		return redirect()->route('backend.news');
	}


	public function getEdit($id)
	{
		$clsNews 					= new NewsModel();
		$data 						= array();

		$data['titleContent'] 		= 'Edit news';
		$data['news'] 				= $clsNews->getByID($id);

		if ( empty($data['news']) ) {
			return response()->view('errors.page_404', [], 404);
		}

		return view('backend.news.edit', $data);
	}


	public function postEdit($id)
	{
		$clsNews 				= new NewsModel();

		$inputs 				= Input::all();
		$avatar					= Input::file('avatar');

		$news 					= $clsNews->getByID($id);
		$rules 					= $clsNews->rules();
		$messages 				= $clsNews->messages();

		$validator  = Validator::make($inputs, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->route('backend.news.edit', [ $id ])->withErrors($validator)->withInput();
        }

        $datas = $clsNews->setValue($inputs);

        // avatar
        $imageName = NULL;
    	if ( $avatar ) {
    		$imageName = time() . '-' . $avatar->getClientOriginalName();
    	} else {
    		if ( empty($inputs['avatar_old']) ) {
    			$imageName = null;
    		} else {
	        	$imageName = $news->avatar;
	        }
    	}

        
        $datas['avatar'] = $imageName;
        $datas['updated_at'] = date('Y-m-d H:i:s');
        $status = $clsNews->update($id, $datas);

        if ( $status ) {
        	// upload avatar
        	if (  $avatar ) {
	        	// delete old avatar
	        	if ( File::exists(public_path() . '/uploads/news/' . $news->avatar) ) {
	        		File::delete(public_path() . '/uploads/news/' . $news->avatar);
	        	}
	        	// update new avatar
        		if ( $avatar ) {
        			$avatar->move(public_path() . '/uploads/news/',  $imageName);	
        		}
	        } else {
	        	if ( empty($inputs['avatar_old']) ) {
	    			// delete old avatar
		        	if ( File::exists(public_path() . '/uploads/news/' . $news->avatar) ) {
		        		File::delete(public_path() . '/uploads/news/' . $news->avatar);
		        	}
	    		}
	        }

        	Session::flash('success', trans('common.message_update_success'));
        } else {
        	Session::flash('faild', trans('common.message_update_faild'));
        }

		return redirect()->route('backend.news');
	}


	public function getDelete($id)
	{
		$clsNews 			= new NewsModel();

		$news 				= $clsNews->getByID($id);
		$status 			= $clsNews->delete($id);

        if ( $status ) {
        	if ( File::exists(public_path() . '/uploads/news/' . $news->avatar) ) {
        		File::delete(public_path() . '/uploads/news/' . $news->avatar);
        	}
        	Session::flash('success', trans('common.message_delete_success'));
        } else {
        	Session::flash('faild', trans('common.message_delete_faild'));
        }

		return redirect()->route('backend.news');
	}
}