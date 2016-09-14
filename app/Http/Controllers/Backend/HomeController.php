<?php namespace App\Http\Controllers;

use App\Http\Controllers\BackendController;

class HomeController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		echo 1;die;
	}
}