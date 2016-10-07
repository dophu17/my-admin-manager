<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\ContactModel;

use Hash;
use DB;
use Input;
use Validator;
use Auth;
use Session;
use File;

class ContactController extends BackendController
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$clsContact 				= new ContactModel();
		$data 						= array();

		$data['titleContent'] 		= 'Contact';
		$data['lists'] 				= $clsContact->getAll();

		return view('backend.contacts.index', $data);
	}


	public function getDetail($id)
	{
		$clsContact 				= new ContactModel();
		$data 						= array();

		$data['titleContent'] 		= 'Detail contact';
		$data['contact'] 			= $clsContact->getByID($id);

		return view('backend.contacts.detail', $data);
	}


	public function getDelete($id)
	{
		$clsContact 				= new ContactModel();

		$status 					= $clsContact->delete($id);

        if ( $status ) {
        	Session::flash('success', trans('common.message_delete_success'));
        } else {
        	Session::flash('faild', trans('common.message_delete_faild'));
        }

		return redirect()->route('backend.contacts');
	}
}