<?php namespace App\Http\Models;

use App\Http\Models\Model;
use Auth;

class UserModel extends Model
{
	protected $table = 'users';
	protected $primary = 'id';

	public function rules()
	{
		return array(
			'name' 			=> 'required',
			'email' 		=> 'required|email|unique:users,email',
			'password' 		=> 'required',
			'avatar'		=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		);
	}

	public function messages()
	{
		return array(
			'name.required' 	=> trans('validation.required'),
			'email.required' 	=> trans('validation.required'),
			'email.email' 		=> trans('validation.email'),
			'email.unique' 		=> trans('validation.unique'),
			'password.required' => trans('validation.required'),
			'avatar.image' 		=> trans('validation.image'),
			'avatar.mimes' 		=> trans('validation.mimes'),
			'avatar.max' 		=> trans('validation.max'),
		);
	}

	public function setValue($data)
	{
		return array(
			'name' 			=> !empty($data['name']) ? $data['name'] : NULL,
			'email' 		=> !empty($data['email']) ? $data['email'] : NULL,
			'password' 		=> !empty($data['password']) ? bcrypt($data['password']) : NULL,
			'sex' 			=> !empty($data['sex']) ? $data['sex'] : NULL,
			'avatar' 		=> !empty($data['avatar']) ? $data['avatar'] : NULL,
			'address' 		=> !empty($data['address']) ? $data['address'] : NULL,
			'birthday' 		=> date('Y-m-d', strtotime($data['birthday'])),
			'phone' 		=> !empty($data['phone']) ? $data['phone'] : NULL,
			'fax' 			=> !empty($data['fax']) ? $data['fax'] : NULL,
			'last_user' 	=> !empty(Auth::user()->id) ? Auth::user()->id : NULL,
		);
	}
}