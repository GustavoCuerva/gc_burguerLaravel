<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $casts = [
        'itens' => 'array'
    ];
    
    protected $dates = ['date'];
    protected $guarded = [];
}
