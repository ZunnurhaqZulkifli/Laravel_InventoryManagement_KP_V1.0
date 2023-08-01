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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function variation()
    {
        return $this->hasMany(Variation::class);
    }
}
