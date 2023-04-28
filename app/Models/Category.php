<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function site()
    {
        return $this->belongsTo('App\Models\Site');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'order_categories');
    }

    public function getPhotoAttribute($value)
    {
        if ($value) {
            return '/storage/'.$value;
        }
        
        return '/frontend/img/zynga-chip-small.png';
    }
}
