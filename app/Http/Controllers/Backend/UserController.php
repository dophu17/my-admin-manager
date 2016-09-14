<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;

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
		$data = array(
			'name' 		=> 'dophu17',
			'email' 	=> 'dophu17@gmail.com',
			'password' 	=> Hash::make('123456')
		);

		DB::table('users')->insert($data);
	}
}