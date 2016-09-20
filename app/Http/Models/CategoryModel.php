<?php namespace App\Http\Models;

use App\Http\Models\Model;

class CategoryModel extends Model
{
	protected $table = 'categories';
	protected $primary = 'id';

	public function rules()
	{
		return array(
			'name' => 'required'
		);
	}

	public function messages()
	{
		return array(
			'name.required' => 'Please enter name'
		);
	}
}