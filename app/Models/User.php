<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
	public $timestamps = true;
	protected $fillable = array('name', 'email', 'password', 'phone_number', 'role');

	

    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function patient()
	{
		return $this->hasOne('App/Models\Patient','user_id');
	}

	public function student()
	{
		return $this->hasOne('App/Models\Student','user_id');
	}
}
