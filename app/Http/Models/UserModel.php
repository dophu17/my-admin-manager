<?php namespace App\Http\Models;

use App\Http\Models\Model;

class UserModel extends Model
{
	protected $table = 'users';
	protected $primary = 'id';

	protected function rules()
	{
		return array(
			//something
		);
	}

	protected function messages()
	{
		return array(
			//something
		);
	}
}