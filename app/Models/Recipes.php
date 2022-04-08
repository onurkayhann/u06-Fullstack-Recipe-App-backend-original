<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'title',
        'recipelist_id'
    ];

    public function userList()
    {
        $this->belongsTo(RecipeList::class);
    }
}
