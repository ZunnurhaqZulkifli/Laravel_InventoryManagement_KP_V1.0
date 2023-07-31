<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Variation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $variations = Variation::all();

        return view('admin.products_create', [
            'categories' => $categories,
            'brands' => $brands,
            'variations' => $variations,
        ]);
    }

}
