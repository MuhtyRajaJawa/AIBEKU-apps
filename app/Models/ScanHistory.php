<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScanHistory extends Model
{
    protected $fillable = [

        'image',

        'object',

        'material',

        'category',

        'condition',

        'recommendations'

    ];

    protected $casts = [

        'recommendations' => 'array'

    ];
}