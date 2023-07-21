<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $table = 'variations';
    protected $fillable = ['name'];

    public function products()
    {
        $this->hasMany(Products::class);
    }

    public function brands()
    {
        $this->hasMany(Brand::class);
    }

    public function categories()
    {
        $this->hasMany(Category::class);
    }

    public function category()
    {
        $this->hasMany(Category::class);
    }
    
    use HasFactory;
}
