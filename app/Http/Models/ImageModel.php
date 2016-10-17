<?php namespace App\Http\Models;

use App\Http\Models\Model;
use DB;

class ImageModel extends Model
{
	protected $table = 'images';
	protected $primary = 'id';

	public function getImageProduct($productID)
	{
		return DB::table($this->table)->where('product_id', $productID)->orderBy($this->primary, 'asc')->get();
	}

	public function deleteImageProduct($productID)
	{
		return DB::table($this->table)->where('product_id', $productID)->delete();
	}
}