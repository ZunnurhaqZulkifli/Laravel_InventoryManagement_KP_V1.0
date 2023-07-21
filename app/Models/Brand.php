<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = ['name'];
    
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Products::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    
    public function variations()
    {
        return $this->hasMany(Variation::class);
    }
}
