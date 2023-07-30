<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Sales;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')
            ->only(['show', 'destroy', 'salesAll', 'salesYesterday', 'salesToday', 'index']);
    }

    public function salesAll()
    {
        

        return view('sales.all', compact('users'));
    }

    public function index()
    {
        $allSales = Sales::orderBy('created_at', 'desc')->get();
        $products = Products::all();
        $allSalesTotal = Sales::all()->sum('totalSales');

        $totalSalesYesterday = Sales::whereDate('created_at', Carbon::yesterday()
                ->toDateTimeString())->sum('totalSales');

        $totalSalesToday = Sales::whereDate('created_at', Carbon::today()
                ->toDateTimeString())->sum('totalSales');

        $key = 1;

        // dd($salesCountedToday);

        return view('sales.index', compact('allSales', 'products', 'allSalesTotal', 'totalSalesToday', 'totalSalesYesterday', 'key', 'totalSalesToday'));
    }


    public function show($id)
    {
        // $products = Products::all();
        $sale = Sales::findOrFail($id);
        $items = explode('|', $sale->items);
        $quantities = explode(',', $sale->quantity);
        $productItems = explode(',', $sale->products_id);
        $userId = ($sale->user_id);

        return view('sales.show', [
            'sale' => $sale,
            'items' => $items,
            'userId' => $userId,
            'quantities' => $quantities,
            'productItems' => $productItems,
        ]);
    }

    public function destroy($id)
    {
        $sales = Sales::findOrFail($id);
        $sales->delete();

        Toastr::warning('Sales Is Deleted!!!', 'Sales Deleted!!!', ["positionClass" => "toast-top-right"]);
        return view('sales.index');
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

            $q3 = Auth::user()->id;


            $sale = Sales::create([
                'totalSales' => $request->input('totalPrice'),
                'items' => $q0,
                'quantity' => $q1,
                'products_id' => $q2,
                'user_id' => $q3,
            ]);

            foreach ($cart as $key => $value) {
                unset($cart[$key]);
                session()->put('cart', $cart);
            }

            Toastr::info('Sales Good!!!', 'Sales Good!!!', ["positionClass" => "toast-top-right"]);
            return redirect()->route('sales.index');

        } else {
            Toastr::error('Cart Is Empty!!!', 'Sales Not Good!!!', ["positionClass" => "toast-top-right"]);
            return view('cart');
        }

    }

    public function salesYesterday()
    {
        $totalSalesYesterday = Sales::whereDate('created_at', Carbon::yesterday()
                ->toDateTimeString())->sum('totalSales');

        $salesYesterday = Sales::whereDate('created_at', Carbon::yesterday()
                ->toDateTimeString())->get();
        $key = 1;

        return view('sales.yesterday', compact('salesYesterday', 'totalSalesYesterday', 'key'));
    }

    public function salesToday()
    {
        $totalSalesToday = Sales::whereDate('created_at', Carbon::today()
                ->toDateTimeString())->sum('totalSales');

        $salesToday = Sales::whereDate('created_at',  Carbon::today()
                ->toDateTimeString())->get();
        $key = 1;

        return view('sales.today', compact('salesToday', 'totalSalesToday', 'key'));
    }

    public function salesByUser($id)
    {
        $mySales = Sales::all()->where('user_id', $id);
        $myTotalSales = $mySales->sum('totalSales');
        $key = 1;

        return view('sales.user', compact('mySales', 'myTotalSales', 'key'));
    }

}
