<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Products;
use App\Models\Sales;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->only(['']);
    }

    public function home()
    {
        $hotitems = Products::with('brand')
            ->where('on_pressed', '>=', '5')
            ->orderBy('on_pressed', 'desc')
            ->take(3)
            ->get();

        $topSales = User::with(['sales' => function ($query) {
            $query->orderBy('totalSales', 'desc');
        }])->get();

        $sales = Sales::orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $hotimages = Products::with('brand')
            ->where('on_pressed', '>=', '5')
            ->orderBy('on_pressed', 'desc')
            ->take(4)
            ->get();

        $lowstocks = Products::where('quantity', '<=', '2')->take(3)->get();
        $total = Sales::all()->sum('totalSales');
        $images = Gallery::orderBy('created_at', 'asc')->take(3)->get();

        return view('home.home', [
            'hotitems' => $hotitems,
            'hotimages' => $hotimages,
            'lowstocks' => $lowstocks,
            'images' => $images,
            'sales' => $sales,
            'total' => $total,
            'topSales' => $topSales,
        ]);

    }

    public function testPage()
    {
        return view('home.test');
    }
}
