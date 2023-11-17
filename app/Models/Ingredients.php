<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    use HasFactory;

    // Model Relationships -----------------------------------------------------
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function recipes()
    {
        return $this->belongsToMany(Recipes::class);
    }
}
