<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeList extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function recipes()
    {
        $this->hasMany(Recipes::class);
    }
}
