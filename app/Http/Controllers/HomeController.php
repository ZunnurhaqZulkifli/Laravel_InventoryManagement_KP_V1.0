<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHomeImage;
use App\Models\Brand;
use App\Models\Gallery;
use App\Models\HomeImage;
use App\Models\Image;
use App\Models\Products;
use App\Models\Sales;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->only(['']);
    }

    public function home()
    {
        $hotitems = Products::with('brand')->orderBy('price', 'desc')->take(3)->get();
        $sales = Sales::orderBy('created_at', 'desc')->take(3)->get();
        $hotimages = Products::with('brand')->orderBy('price', 'desc')->take(4)->get();
        $lowstocks = Products::orderBy('quantity', 'asc')->take(5)->get();
        $total = Sales::all()->sum('totalSales');

        // $images = Products::orderBy('price', 'desc')->get()->all();
        $images = Gallery::orderBy('created_at', 'asc')->take(3)->get();
        
        $brands = Brand::all();
        // dd($images);

        return view('home.home', [
            'hotitems' => $hotitems,
            'hotimages' => $hotimages,
            'lowstocks' => $lowstocks,
            'brands' => $brands,
            'images' => $images,
            'sales' => $sales,
            'total' => $total,
        ]);

    }

    public function testPage()
    {
        return view('home.test');
    }
}
