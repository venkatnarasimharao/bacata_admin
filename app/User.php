<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password','mobile','gender','dob','address','website','brief','image','is_admin','is_active','confirmed','confirmation_code','facebook_id','google_id','points'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function getImageAttribute()
	{
		if (! $this->attributes['image']) {
			return 'user.png';
		}
		return $this->attributes['image'];
	}
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function followers()
	{
		return $this->belongsToMany(User::class, 'followers', 'leader_id', 'follower_id')->withTimestamps();
	}
		
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function followings()
	{
		return $this->belongsToMany(User::class, 'followers', 'follower_id', 'leader_id')->withTimestamps();
	}
	
	public function coupon()
	{
		return $this->hasMany('App\Coupon');
	}
	public function discussion()
	{
		return $this->hasMany('App\Discussion');
	}
	public function likes()
  {
    return $this->morphMany(Like::class, 'likeable');
  }   
  public function comments()
  {
    return $this->morphMany(Comment::class, 'commentable');
  }
}
