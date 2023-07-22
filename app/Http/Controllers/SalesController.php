<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {
        //
    }

    public function show($id)
    {
        // $products = Products::all();
        $sale = Sales::findOrFail($id);
        $items = explode( ',', $sale->items);
        $quantities = explode( ',', $sale->quantity);

        return view('sales.show', [
            'sale' => $sale,
            'items' => $items,
            'quantities' => $quantities,
        ]);
    }

    public function addtoTotalSale(Request $request)
    {

        $total = Sales::all()->sum('totalSales');
        $totalSales = $request->input('totalPrice');
        $cart = session()->get('cart', []);
        // dd($item);

        if ($totalSales > 0) {

            $products = session()->get('cart');

            $q0 = collect($products)->pluck('brand', 'name')->
            implode(',', array_map(function ($item) {
                return implode(',', $item);
            }, $products));

            $q1 = collect($products)->pluck('quantity')->
            implode(',', array_map(function ($item) {
                return implode(',', $item);
            }, $products));
            
            $sale = Sales::create([
                'totalSales' => $request->input('totalPrice'),
                'items' => $q0,
                'quantity' => $q1,
            ]);

            foreach ($cart as $key => $value) {
                unset($cart[$key]);
                session()->put('cart', $cart);
            }

            return redirect()->route('sales.record')->with('success', 'Sales Good!');

        } else {
            return view('cart')->with('error', 'Cart is empty!');
        }

    }

    public function sales()
    {
        $sales = Sales::orderBy('created_at', 'desc')->get();
        $products = Products::all();
        $total = Sales::all()->sum('totalSales');

        return view('sales.record', compact('sales', 'products', 'total'));
    }
}
