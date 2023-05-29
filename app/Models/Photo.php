<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Photo extends Model {

	protected $table = 'photos';
	public $timestamps = true;
	protected $fillable = array('image');

	public function post()
	{
		return $this->belongsToMany('App/Models\Post', 'post_id');
	}

	public function treatment()
	{
		return $this->belongsToMany('App/Models\Treatment', 'treatment_id', 'photo_id');
	}

	public function student()
	{
		return $this->hasOne('App/Models\Student');
	}

}