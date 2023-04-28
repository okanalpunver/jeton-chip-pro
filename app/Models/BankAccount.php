<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $guarded = [];

    public function site()
    {
        return $this->belongsTo('App\Models\Site');
    }
}
