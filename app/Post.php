<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;

	protected $table='posts';
	public $primarykey='id';
	
	protected $fillable=[
		'title',
		'body',
		'tag',
		'user_id'
	];

	protected $dates=['deleted_at'];

	public function user(){
		return $this->belongsTo("App\User");
	}
}
