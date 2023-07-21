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
        $products = Products::all();
        $sale = Sales::findOrFail($id);

        return view('sales.show', [
            'sale' => $sale,
            'items' => $sale->products_id,
        ]);
    }

    public function addtoTotalSale(Request $request)
    {

        $total = Sales::all()->sum('totalSales');
        $totalSales = $request->input('totalPrice');
        $cart = session()->get('cart', []);
        // dd($item);

        if ($totalSales > 0) {

            $products = session()->get('cart', []);

            foreach ($products as $product) {
                $productIds[] = $product['name'];
            }

            $item = implode(' , ', $productIds);

            $validatedData = $request->validate([
                'totalSales' => $request->input('totalPrice'),
            ]);

            foreach ($cart as $key => $value) {
                unset($cart[$key]);
                session()->put('cart', $cart);
            }

            $sale = new Sales();
            $sale->totalSales = $request->input('totalPrice');
            $sale->products_id = $item;
            $sale->save();

            return redirect()->route('sales.record')->with('success', 'Sales Good!');

        } else {
            return view('cart')->with('error', 'Cart is empty!');
        }

    }

    public function sales(Request $request)
    {
        $sales = Sales::orderBy('created_at', 'desc')->get();
        $products = Products::all();
        $total = Sales::all()->sum('totalSales');

        // dd($total);
        

        return view('sales.record', compact('sales', 'products', 'total'));
    }
}
