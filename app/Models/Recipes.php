<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'instructions',
        'users_id',
    ];

    protected $hidden = [
        'created_at',
    ];

    // Model Relationships -----------------------------------------------------
    public function author()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredients::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }
}
