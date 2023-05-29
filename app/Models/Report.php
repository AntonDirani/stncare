<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Report extends Model {

	protected $table = 'reports';
	public $timestamps = true;
	protected $fillable = array('report');

	public function post()
	{
		return $this->belongsToMany('App/Models\Post', 'post_id');
	}

}