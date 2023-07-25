<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = ['products_id','totalSales', 'items', 'quantity'];
    
    public function products()
    {
        $this->hasMany(Products::class);
    }
}
