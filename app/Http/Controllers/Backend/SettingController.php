<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\SettingModel;

use Hash;
use DB;
use Input;
use Validator;
use Auth;
use Session;
use File;

class SettingController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$clsSetting 				= new SettingModel();
		$data 						= array();

		$data['titleContent'] 		= 'Settings';
		$data['lists'] 				= $clsSetting->getAll();

		return view('backend.settings.index', $data);
	}


	public function postIndex()
	{
		$clsSetting 				= new SettingModel();
		$data 						= array();

		$inputs 					= Input::all();

		foreach ( $inputs as $key => $value ) {
			$data['value'] = $value;
			$clsSetting->update($key, $data);
		}

		return redirect()->route('backend.settings');
	}
}