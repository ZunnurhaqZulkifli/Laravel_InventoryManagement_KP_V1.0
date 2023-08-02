<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProducts;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Products;
use App\Models\Sales;
use App\Models\Variation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')
            ->only(['show', 'create', 'store', 'edit', 'update', 'destroy', 'all', 'categories', 'productCart', 'stats', 'index']);
    }

    public function index(Request $request)
    {
        $products = Products::where([
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $brands = Brand::where('name', 'like', "%{$term}%")->get();
                    $categories = Category::where('name', 'like', "%{$term}%")->get();
                    $variations = Variation::where('name', 'like', "%{$term}%")->get();

                    $query
                        ->orWhere('name', 'LIKE', '%' . $term . '%')
                        ->orWhereIn('brand_id', $brands->pluck('id'))
                        ->orWhereIn('category_id', $categories->pluck('id'))
                        ->orWhereIn('variation_id', $variations->pluck('id'))
                        ->get();
                }
            }],
        ])
            ->orderBy("id", "asc")
            ->paginate(1000);

        $totalQuantity = $products->count('quantity');
        // dd($totalQuantity);

        return view('products.index',
            [
                'products' => $products,
                'totalQuantity' => $totalQuantity,
                'key' => $key = 1,
                ]) ->with('i', (request()->input('page', 1)) * 5
            );
    }

    public function all(Request $request)
    {    
        $categories = Category::where([
            [function ($query) use ($request) {
                if (($term = $request->term)) {

                    $query
                        ->orWhere('name' , 'LIKE', '%' . $term . '%')
                        ->get();
                }
            }],
        ])
            ->orderBy("id", "asc")
            ->paginate(1000);

        return view('products.all', 
        [
            'categories' => $categories,
            'items' => $items = 100,
            ])->with('i', (request()->input('page', 1)) * 5
        );
    }

    public function show($id)
    {
        $products = Products::with('variation')->findOrFail($id);

        // dd($products);

        return view('products.show', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $variations = Variation::all();

        return view('products.create', [
            'categories' => $categories,
            'brands' => $brands,
            'variations' => $variations,
        ]);
    }

    public function store(StoreProducts $request)
    {

        $validatedData = $request->validated();
        $validatedData['products_id'] = $request->id;
        $product = Products::create($validatedData);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('Products_Images');
            $product->image()->save(
                Image::create(['path' => $path])
            );
        }

        Toastr::success('Products Created Successfully', 'Product Created', ["positionClass" => "toast-top-right"]);
        return redirect()->route('products.show', [$product->id]);
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        $variations = Variation::all();

        return view('products.edit', compact('categories', 'product', 'brands', 'variations'));
    }

    public function update(StoreProducts $request, $id)
    {
        $product = Products::findOrFail($id);

        $validatedData = $request->validated();
        $product->fill($validatedData);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('Products_Images');

            if ($product->image) {
                Storage::delete($product->image->path);
                $product->image->path = $path;
                $product->image->save();
            } else {
                $product->image()->save(
                    Image::create(['path' => $path])
                );
            }
        }

        $product->save();
        Toastr::info('Products Successfully Updated', 'Products Updated', ["positionClass" => "toast-top-right"]);
        return redirect()->route('products.show', [$product->id]);
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        Toastr::error('Products Successfully Deleted', 'Products Deleted!', ["positionClass" => "toast-top-right"]);
        return redirect()->route('products.index');
    }

    public function cart(Request $request)
    {
        $totalPrice = 0;
        $sale = Sales::all();

        return view('cart', compact('totalPrice', 'sale'));
    }

    public function addProductstoCart(Request $request, $id)
    {

        $discount = 0;
        $product = Products::findOrFail($id);
        $cart = session()->get('cart', []);

        if ($product->quantity > 0) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $product->increment('on_pressed');
                $cart[$id] = [
                    "name" => $product->name,
                    "brand" => $product->brand->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "id" => $product->id,
                ];
            }
            $product->decrement('quantity');
            Toastr::success('Items added sucessfully', 'Success', ["positionClass" => "toast-top-right"]);

        } else {
            Toastr::error('Item is not found', 'Error', ["positionClass" => "toast-top-right"]);
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function stats()
    {
        $products = Products::all();
        
        $hotitems = Products::with('brand')
            ->where('on_pressed', '>=', '5')
            ->orderBy('on_pressed', 'desc')
            ->take(3)
            ->get();

        return view('products.stats', [
            'products' => $products,
            'hotitems' => $hotitems,
            'key' => $key = 1,
        ]);
    }


    public function hotItem()
    {
        $hotitems = Products::with('brand', 'variation')->orderBy('price', 'desc')->take(1)->get();

        return view('best.seller', [
            'hotitems' => $hotitems,
        ]);
    }

    //Cart Functions

    public function subtractProductstoCart($id)
    {
        $product = Products::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']--;
            $product->increment('quantity');
            
            if($product->on_pressed > 0) {
                $product->decrement('on_pressed');
            }

            if ($cart[$id]['quantity'] == 0) {
                unset($cart[$id]);
            }
        }
        Toastr::warning('Items removed sucessfully', 'Items removed sucessfully', ["positionClass" => "toast-top-right"]);
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }
    }

    public function deleteProduct(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('warning', 'Productremoved.');
        }
    }

    public function calculatePayableAmount(Request $request)
    {
        $cash = $request->input('cash') * 100;
        $tp = $request->input('tp') * 100;
        $tpa = max($cash - $tp, 0);
        $totalPayableAmount = number_format($tpa / 100, 2);

        return response()->json([
            'totalPayableAmount' => $totalPayableAmount,
            
        ]);
    }
}
