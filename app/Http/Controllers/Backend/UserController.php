<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\UserModel;

use Hash;
use DB;
use Input;
use Validator;
use Auth;
use Session;
use File;

class UserController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$clsUser 				= new UserModel();
		$data 					= array();

		$data['titleContent'] 	= 'Users';
		$data['lists'] 			= $clsUser->getAll();

		return view('backend.users.index', $data);
	}


	public function getAdd()
	{
		$data 					= array();

		$data['titleContent'] 	= 'Add user';

		return view('backend.users.add', $data);
	}


	public function postAdd()
	{
		$clsUser 				= new UserModel();
		$inputs 				= Input::all();
		$avatar					= Input::file('avatar');

		$rules 					= $clsUser->rules();
		$messages 				= $clsUser->messages();

		$validator  = Validator::make($inputs, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->route('backend.users.add')->withErrors($validator)->withInput();
        }

        $datas = $clsUser->setValue($inputs);

        // image
        $imageName = NULL;
        if ( $avatar ) {
        	$imageName = time() . '-' . $avatar->getClientOriginalName();
        }
        $datas['avatar'] = $imageName;
        $datas['created_at'] = date('Y-m-d H:i:s');
        $status = $clsUser->insert($datas);

        if ( $status ) {
        	// upload image
    		if ( $avatar ) {
    			$avatar->move(public_path() . '/uploads/users/', $imageName);
    		}

        	Session::flash('success', trans('common.message_add_success'));
        } else {
        	Session::flash('faild', trans('common.message_add_faild'));
        }

		return redirect()->route('backend.users');
	}


	public function getEdit($id)
	{
		$clsUser 				= new UserModel();
		$data 					= array();

		$data['titleContent'] 	= 'Edit user';
		$data['user'] 			= $clsUser->getByID($id);

		if ( empty($data['user']) ) {
			return response()->view('errors.page_404', [], 404);
		}

		return view('backend.users.edit', $data);
	}


	public function postEdit($id)
	{
		$clsUser 				= new UserModel();
		$inputs 				= Input::all();
		$avatar					= Input::file('avatar');

		$user 					= $clsUser->getByID($id);
		$rules 					= $clsUser->rules();
		if ( $inputs['email'] == $user->email ) {
			unset($rules['email']);
		}
		if ( empty($inputs['password']) ) {
        	unset($rules['password']);
        }
		$messages 				= $clsUser->messages();

		$validator  = Validator::make($inputs, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->route('backend.users.edit', [ $id ])->withErrors($validator)->withInput();
        }

        $datas = $clsUser->setValue($inputs);
        if ( empty($inputs['password']) ) {
        	unset($datas['password']);
        }

        // image
        $imageName = NULL;
        if ( $inputs['keep_image'] == 0 ) {
        	if ( $avatar ) {
        		$imageName = time() . '-' . $avatar->getClientOriginalName();
        	} else {
        		$imageName = null;
        	}
        	
        } else {
        	$imageName = $user->avatar;
        }
        $datas['avatar'] = $imageName;
        $datas['updated_at'] = date('Y-m-d H:i:s');
        $status = $clsUser->update($id, $datas);

        if ( $status ) {
        	// upload image
        	if ( $inputs['keep_image'] == 0 ) {
	        	// delete old image
	        	if ( File::exists(public_path() . '/uploads/users/' . $user->avatar) ) {
	        		File::delete(public_path() . '/uploads/users/' . $user->avatar);
	        	}
	        	// update new image
        		if ( $avatar ) {
        			$avatar->move(public_path() . '/uploads/users/',  $imageName);	
        		}
	        }

        	Session::flash('success', trans('common.message_update_success'));
        } else {
        	Session::flash('faild', trans('common.message_update_faild'));
        }

		return redirect()->route('backend.users');
	}


	public function getDelete($id)
	{
		$clsUser 		= new UserModel();

		$status 		= $clsUser->delete($id);

        if ( $status ) {
        	Session::flash('success', trans('common.message_delete_success'));
        } else {
        	Session::flash('faild', trans('common.message_delete_faild'));
        }

		return redirect()->route('backend.users');
	}


	public function getProfile($id)
	{
		$clsUser 		= new UserModel();
		$data['user'] 	= $clsUser->getByID($id);

		if ( empty($data['user']) ) {
			return response()->view('errors.page_404', [], 404);
		}

		return view('backend.users.profile', $data);
	}


	public function postEditProfile($id)
	{
		$clsUser 				= new UserModel();
		$inputs 				= Input::all();

		$user 					= $clsUser->getByID($id);
		$rules 					= $clsUser->rules();
		if ( $inputs['email'] == $user->email ) {
			unset($rules['email']);
		}
		$messages 				= $clsUser->messages();
		$avatar					= Input::file('avatar');

		$validator  = Validator::make($inputs, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->route('backend.users.edit', [ $id ])->withErrors($validator)->withInput();
        }

        $datas = $clsUser->setValue($inputs);

        // image
        $imageName = NULL;
        if ( $avatar ) {
        	$imageName = time() . '-' . $avatar->getClientOriginalName() . '.' . $avatar->getClientOriginalExtension();
        } else {
        	$imageName = $user->avatar;
        }
        $datas['avatar'] = $imageName;
        $datas['updated_at'] = date('Y-m-d H:i:s');
        $status = $clsUser->update($id, $datas);

        if ( $status ) {
        	// upload image
        	if ( $avatar ) {
	        	$avatar->move(public_path() . '/uploads/users/', $imageName);
	        	// delete old image
	        	if ( File::exists(public_path() . '/uploads/users/', $user->avatar) ) {
	        		File::delete(public_path() . '/uploads/users/', $user->avatar);
	        	}
	        }

        	Session::flash('success', trans('common.message_add_success'));
        } else {
        	Session::flash('faild', trans('common.message_add_faild'));
        }

		return redirect()->route('backend.users.profile');
	}



}