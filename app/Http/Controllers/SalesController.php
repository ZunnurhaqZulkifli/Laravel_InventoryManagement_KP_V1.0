<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Sales;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
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
        $items = explode('|', $sale->items);
        $quantities = explode(',', $sale->quantity);
        $productItems = explode(',', $sale->products_id);

        return view('sales.show', [
            'sale' => $sale,
            'items' => $items,
            'quantities' => $quantities,
            'productItems' => $productItems,
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

            $q0 = collect($products)->pluck('name')->
                implode(',', array_map(function ($item) {
                return implode(',', $item);
            }, $products));

            $q1 = collect($products)->pluck('quantity')->
                implode(',', array_map(function ($item) {
                return implode(',', $item);
            }, $products));

            $q2 = collect($products)->pluck('id')->
                implode(',', array_map(function ($item) {
                return implode(',', $item);
            }, $products));

            // dd($q0);

            $sale = Sales::create([
                'totalSales' => $request->input('totalPrice'),
                'items' => $q0,
                'quantity' => $q1,
                'products_id' => $q2,
            ]);

            foreach ($cart as $key => $value) {
                unset($cart[$key]);
                session()->put('cart', $cart);
            }

            Toastr::info('Sales Good!!!', 'Sales Good!!!', ["positionClass" => "toast-top-right"]);
            return redirect()->route('sales.record');

        } else {
            Toastr::error('Cart Is Empty!!!', 'Sales Not Good!!!', ["positionClass" => "toast-top-right"]);
            return view('cart');
        }

    }

    public function salesAll()
    {
        $sales = Sales::orderBy('created_at', 'desc')->get();
        $products = Products::all();
        $total = Sales::all()->sum('totalSales');
        $SalesCountedYesterday = Sales::where('created_at', '<=', Carbon::now()
                ->subHours(24)
                ->toDateTimeString())->sum('totalSales');

        $SalesCountedToday = Sales::where('created_at', '>=', Carbon::now()
                ->subHours(24)
                ->toDateTimeString())->sum('totalSales');

        $key = 1;

        // dd($SalesCountedYesterday);

        return view('sales.record', compact('sales', 'products', 'total','SalesCountedToday','SalesCountedYesterday', 'key'));
    }

    public function salesByDate()
    {
        // at the >= is less than %amount% of hours.
        //change to <= to get the more then %amount% of hours.
        //CHANGE TO 24 THIS 12AM!!
        $total = Sales::where('created_at', '<=', Carbon::now()
                ->subHours(15)
                ->toDateTimeString())->sum('totalSales');

        $SalesCountedYesterday = Sales::where('created_at', '<=', Carbon::now()
                ->subHours(15)
                ->toDateTimeString())->get();
        $key = 1;
        // dd($times);

        return view('sales.byDate', compact('SalesCountedYesterday', 'total', 'key'));
    }

}
