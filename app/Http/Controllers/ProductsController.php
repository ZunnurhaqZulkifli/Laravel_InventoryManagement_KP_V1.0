<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProducts;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Products;
use App\Models\Sales;
use App\Models\Variation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')
            ->only(['show', 'create', 'store', 'edit', 'update', 'destroy', 'all', 'categories', 'productCart']);
    }

    public function hotItem()
    {
        $hotitems = Products::with('brand', 'variation')->orderBy('price', 'desc')->take(1)->get();

        return view('best.seller', [
            'hotitems' => $hotitems,
        ]);
    }

    public function index()
    {
        $products = Products::with('category', 'brand', 'variation')->orderBy('price', 'desc')->get();
        // dd($products);
        return view('products.categories', [
            'products' => $products,
            'categories' => Category::with('products')->orderBy('created_at', 'asc')->get(),
        ]);
    }

    public function show($id)
    {
        $products = Products::with('variation')->findOrFail($id);

        // dd($products);

        return view('products.show', [
            'products' => $products,
        ]);
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        $variations = Variation::all();

        return view('products.edit', compact('categories', 'product', 'brands', 'variations'));
    }

    public function home()
    {
        return view('products.home');
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

    public function all(Request $request)
    {

        $brandName = Products::with('brands');
        $products = Products::with('brand', 'category', 'variation')->where([
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
            ->orderBy("id", "desc")
            ->paginate(100);

        $totalQuantity = $products->count('quantity');
        // dd($totalQuantity);

        return view('products.all',
            [
                'products' => $products,
                'brandName' => $brandName,
                'totalQuantity' => $totalQuantity,
                'key' => $key = 1,
                ]) ->with('i', (request()->input('page', 1)) * 5
            );
    }

    public function store(StoreProducts $request)
    {

        //logic behind validation is required
        $validatedData = $request->validated();
        $validatedData['products_id'] = $request->id;
        $product = Products::create($validatedData);

        //this is where your images is saved
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('Products_Images');
            $product->image()->save(
                Image::create(['path' => $path])
            );
        }

        // dd($product);

        //this is the route rerouting
        $request->session()->flash('status', 'Added a New Product!');
        return redirect()->route('products.create');
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
        $request->session()->flash('status', 'Product was Updated!');

        return redirect()->route('products.show', [$product->id]);
    }

    public function categories()
    {
        $brands = Brand::all();
        $category = Category::all();
        $products = Products::with('category', 'brand', 'variation')->get();

        return view('products.categories', [
            'products' => $products,
            'categories' => Category::with('products')->get(),
            'brands' => $brands,
        ]);
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        session()->flash('status', 'The product is removed');
        return redirect()->route('products.index');
    }

    public function stats()
    {
        $products = Products::all();
        $hotitems = Products::orderBy('price', 'desc')->take(2)->get();

        // dd($products);

        return view('products.stats', [
            'products' => $products,
            'hotitems' => $hotitems,
            'key' => $key = 1,
        ]);
    }

    public function productCart(Request $request)
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
                $cart[$id] = [
                    "name" => $product->name,
                    "brand" => $product->brand->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "id" => $product->id,
                ];
            }

            $product->decrement('quantity');
            $request->session()->flash('success', 'Product added to cart');

        } else {
            $request->session()->flash('error', 'Product does not exit');
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function subtractProductstoCart($id)
    {
        $product = Products::findOrFail($id);

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']--;
            $product->increment('quantity');

            if ($cart[$id]['quantity'] == 0) {
                unset($cart[$id]);
            }
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('warning', 'Product has been removed from cart!');
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Product added to cart.');
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

        return response()->json(['totalPayableAmount' => $totalPayableAmount]);
    }

}
