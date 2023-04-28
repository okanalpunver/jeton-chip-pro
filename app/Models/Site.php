<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $guarded = [];

    protected $hidden = ['paytr_merchant_id', 'paytr_merchant_key', 'paytr_merchant_salt'];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }

    public function products()
    {
        return $this->hasManyThrough('App\Models\Product', 'App\Models\Category');
    }

    public function bankAccounts()
    {
        return $this->hasMany('App\Models\BankAccount');
    }

    public function news()
    {
        return $this->hasMany('App\Models\News');
    }

    public function testimonials()
    {
        return $this->hasMany('App\Models\Testimonial');
    }

    public function pages()
    {
        return $this->hasMany('App\Models\Page');
    }

    /**
     * Scope a query to only include active sites.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
