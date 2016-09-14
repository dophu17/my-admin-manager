<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;

class HomeController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		return view('backend.home.index');
	}
}