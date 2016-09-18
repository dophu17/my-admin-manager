<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Hash;
use DB;
use Input;
use Auth;
use Session;

class AuthController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		
	}


	public function getLogin()
	{
		return view('auth.login');
	}


	public function postLogin()
	{
		$inputs = array(
			'email' 		=> Input::get('email'),
			'password' 		=> Input::get('password')
		);

		if ( Auth::attempt($inputs, true) ) {
            return redirect()->route('backend.home');
        }

        Session::flash('fail', 'Login failed!');
		return redirect()->route('auth.login');
	}


	public function getLogout()
	{
		Auth::logout();

		return redirect()->route('auth.login');
	}
}