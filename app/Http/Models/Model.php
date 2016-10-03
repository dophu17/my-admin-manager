<?php namespace App\Http\Models;

use DB;

class Model
{
	protected $table = 'Table name';
	protected $primary = 'Primary field name';

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


	public function insert($data)
	{
		return DB::table($this->table)->insert($data);
	}


	public function update($id, $data)
	{
		return DB::table($this->table)->where($this->primary, $id)->update($data);
	}


	public function delete($id)
	{
		return DB::table($this->table)->where($this->primary, $id)->delete();
	}


	public function getByID($id)
	{
		return DB::table($this->table)->where($this->primary, $id)->first();
	}


	public function getAll($orderField = 'id', $orderValue = 'desc')
	{
		return DB::table($this->table)->orderBy($orderField, $orderValue)->paginate(10);	
	}
}