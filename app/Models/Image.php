<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = ['path' , 'products_id', 'gallery_id', 'users_id', 'variation_id'];
    use HasFactory;

    public function url()
    {
        return Storage::url($this->path);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }
}