<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'description', 'category_id', 'brand_id', 'variation_id', 'quantity', 'flavour'];
    
    public function category() //make sure this is correct
    {
        return $this->belongsTo(Category::class);
    }

    public function brand() //make sure this is also correct!
    {
        return $this->belongsTo(Brand::class);
    }

    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }
    
    public function variations()
    {
        return $this->belongsToMany(Variation::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

}
