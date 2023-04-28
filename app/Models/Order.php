<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    protected $with = ['user', 'site', 'categories', 'payment'];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category')
            ->using('App\Models\CategoryOrder')
            ->withPivot(['qty', 'extra']);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function site()
    {
        return $this->belongsTo('App\Models\Site');
    }

    public function payment()
    {
        return $this->hasOne('App\Models\Payment');
    }
}
