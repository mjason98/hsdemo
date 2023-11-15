<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
    ];

    // Model Relationships -----------------------------------------------------
    public function author()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
