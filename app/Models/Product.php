<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public $appends = [
        'currency'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'status' => 'boolean',
        'qty' => 'float',
    ];

    public $with = ['category'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function getCurrencyAttribute()
    {
        return $this->category->site->currency;
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'order_products');
    }
}
