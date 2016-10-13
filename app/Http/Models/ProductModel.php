<?php namespace App\Http\Models;

use App\Http\Models\Model;

class ProductModel extends Model
{
	protected $table = 'products';
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
			'price' 				=> !empty($data['price']) ? bcrypt($data['price']) : NULL,
			'price_promotion' 		=> !empty($data['price_promotion']) ? $data['price_promotion'] : NULL,
			'color' 				=> !empty($data['color']) ? $data['color'] : NULL,
			'weight' 				=> !empty($data['weight']) ? $data['weight'] : NULL,
			'height' 				=> !empty($data['height']) ? $data['height'] : NULL,
			'made_in' 				=> !empty($data['made_in']) ? $data['made_in'] : NULL,
			'version_year' 			=> !empty($data['version_year']) ? $data['version_year'] : NULL,
			'model' 				=> !empty($data['model']) ? $data['model'] : NULL,
			'tag' 					=> !empty($data['tag']) ? $data['tag'] : NULL,
			'description' 			=> !empty($data['description']) ? $data['description'] : NULL,
			'status' 				=> !empty($data['status']) ? $data['status'] : NULL,
			'orderby' 				=> !empty($data['orderby']) ? $data['orderby'] : NULL,
			'is_feature' 			=> !empty($data['is_feature']) ? $data['is_feature'] : NULL,
			'is_new' 				=> !empty($data['is_new']) ? $data['is_new'] : NULL,
			'created_at' 			=> !empty($data['created_at']) ? $data['created_at'] : NULL,
			'updated_at' 			=> !empty($data['updated_at']) ? $data['updated_at'] : NULL,
			'last_user' 			=> !empty(Auth::user()->id) ? Auth::user()->id : NULL,
		);
	}

}