<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryOrder extends Pivot
{
    protected $guarded = [];
    
    protected $casts = [
        'extra' => 'array'
    ];
}
