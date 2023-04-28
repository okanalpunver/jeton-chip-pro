<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];
    
    protected $with = ['site'];

    protected $casts = [
        'response' => 'array',
    ];

    public function site()
    {
        return $this->belongsTo('App\Models\Site');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function bankAccount()
    {
        return $this->belongsTo('App\Models\BankAccount');
    }
}
