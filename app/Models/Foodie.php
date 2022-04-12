<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foodie extends Model
{
    use HasFactory;

    protected $table = 'foodie';

    protected $fillable = [
        'name',
        'description',
        'cuisine',
        'userId'
    ];
}
