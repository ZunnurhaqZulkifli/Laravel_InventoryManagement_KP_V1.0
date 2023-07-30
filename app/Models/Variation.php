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
        return $this->hasMany(Products::class);
    }

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }
    
    use HasFactory;
}
