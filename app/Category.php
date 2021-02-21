<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'title','image','is_active','icon','slug'
    ];

    public function coupon()
    {
      return $this->hasMany('App\Coupon');
    }
    public function store()
    {
      return $this->belongsToMany('App\Store');
    }
}
