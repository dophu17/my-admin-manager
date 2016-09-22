<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\UserModel;

use Hash;
use DB;

class UserController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
<<<<<<< HEAD
		$clsUser = new UserModel();

		$data['listUser'] = $clsUser->getAll();
		$data['titleContent'] = 'User';

		return view('backend.users.index');
=======
		$clsUser 				= new UserModel();
		$data 					= array();

		$data['titleContent'] 	= 'Users';
		$data['listUser'] 		= $clsUser->getAll();

		return view('backend.users.index', $data);
	}


	public function getEdit($id)
	{
		
>>>>>>> 39f6a1e918c62c2129dfed868485f125d5d62304
	}


	public function getProfile()
	{
		return view('backend.users.profile');
	}


	public function getEditProfile($id)
	{
		$clsUser = new UserModel();
		$user = $clsUser->getByID($id);

		if ( empty($user) ) {
			return response()->view('errors.page_404', [], 404);
		}

		echo '<pre>';
		print_r($user);
		echo '</pre>';
		die;
	}


	public function postEditProfile($id)
	{
		
	}



}