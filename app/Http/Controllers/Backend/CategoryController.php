<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\CategoryModel;

use Auth;

class CategoryController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$clsCategory = new CategoryModel();

		echo '<pre>';
		print_r($clsCategory->rules());
		echo '</pre>';
		die;

		$data['listCategories'] = $clsCategory->getAll();

		return view('backend.categories.index', $data);
	}


	public function getAdd()
	{

	}


	public function postAdd()
	{

	}


	public function getEdit($id)
	{

	}


	public function postEdit($id)
	{

	}


	public function getDelete($id)
	{
		
	}
}