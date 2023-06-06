<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Post extends Model {

	protected $table = 'posts';
	public $timestamps = true;
	protected $fillable = array('student_id', 'description', 'treatment_id');

	public function report()
	{
		return $this->belongsToMany('App/Models\Report', 'report_id');
	}

	public function patient()
	{
		return $this->belongsToMany('App/Models\Patient', 'patient');
	}

	public function date()
	{
		return $this->belongsToMany('App/Models\Date', 'date_id');
	}

	public function student()
	{
		return $this->belongsTo('App/Models\Student', 'student_id');
	}

	public function photos()
	{
		return $this->belongsToMany(Photo::class,'post_photo','post_id','photo_id');
	}

	public function treatment()
	{
		return $this->belongsTo('App/Models\Treatment', 'treatment_id');
	}

	public function favorite_list()
	{
		return $this->hasMany('App/Models\Favorite_list', 'post_id');
	}

}