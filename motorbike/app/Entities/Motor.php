<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $fillable = [
        'model', 'cc', 'color', 'weight', 'price', 'photo', 'created_at', 'updated_at',
    ];
}
