<?php namespace App\Http\Models;

use App\Http\Models\Model;

use Auth;

class CategoryModel extends Model
{
	protected $table = 'categories';
	protected $primary = 'id';

	public function rules()
	{
		return array(
			'name' 					=> 'required',
			'icon'					=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'orderby'				=> 'numeric',
		);
	}

	public function messages()
	{
		return array(
			'name.required' 		=> trans('validation.required'),
			'avatar.image' 			=> trans('validation.image'),
			'avatar.mimes' 			=> trans('validation.mimes'),
			'avatar.max' 			=> trans('validation.max'),
			'orderby.numeric' 		=> trans('validation.numeric'),
		);
	}

	public function setValue($data)
	{
		return array(
			'name' 					=> !empty($data['name']) ? $data['name'] : NULL,
			'name_slug' 			=> !empty($data['name_slug']) ? $data['name_slug'] : NULL,
			'icon' 					=> !empty($data['icon']) ? bcrypt($data['icon']) : NULL,
			'tag' 					=> !empty($data['tag']) ? $data['tag'] : NULL,
			'orderby' 				=> !empty($data['orderby']) ? $data['orderby'] : NULL,
			'last_user' 			=> !empty(Auth::user()->id) ? Auth::user()->id : NULL,
		);
	}
}