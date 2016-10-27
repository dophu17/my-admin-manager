<?php namespace App\Http\Models;

use App\Http\Models\Model;

use Auth;

class NewsModel extends Model
{
	protected $table = 'news';
	protected $primary = 'id';


	public function rules()
	{
		return array(
			'name' 			=> 'required',
			'avatar'		=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		);
	}

	public function messages()
	{
		return array(
			'name.required' 	=> trans('validation.required'),
			'avatar.image' 		=> trans('validation.image'),
			'avatar.mimes' 		=> trans('validation.mimes'),
			'avatar.max' 		=> trans('validation.max'),
		);
	}

	public function setValue($data)
	{
		return array(
			'name' 					=> !empty($data['name']) ? $data['name'] : NULL,
			'name_slug' 			=> !empty($data['name_slug']) ? $data['name_slug'] : NULL,
			'avatar' 				=> !empty($data['avatar']) ? $data['avatar'] : NULL,
			'description' 			=> !empty($data['description']) ? $data['description'] : NULL,
			'content' 				=> !empty($data['content']) ? $data['content'] : NULL,
			'last_user' 			=> !empty(Auth::user()->id) ? Auth::user()->id : NULL,
		);
	}


}