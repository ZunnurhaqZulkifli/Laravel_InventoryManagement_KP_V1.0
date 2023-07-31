<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'path'];

    use HasFactory;

    public function products()
    {
        return $this->hasMany(Products::class);
    }

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    public function variations()
    {
        return $this->belongsToMany(Variation::class);
    }

    public function variation()
    {
        return $this->belongsToMany(Variation::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function getCountedProducts()
    {
        return $this->products()->count('products');
    }

}
