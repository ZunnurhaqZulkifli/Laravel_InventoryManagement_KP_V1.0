<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBrands;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Products;
use App\Models\Variation;

class BrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->only(['show', 'create', 'update', 'allBrands']);
    }


    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $variations = Variation::all();
        return view('brands.create', compact('categories', 'brands', 'variations'));
    }

    public function allBrands()
    {

        $brands = Brand::all();
        $products = Products::with('category','brand', 'variation')->get();
        $category = Category::all();

        return view('brands.all' , [
            'products'=> $products , 
            'categories' => Category::with('products')->get(),
            'brands' => $brands,
        ]);
    }

    public function store(StoreBrands $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:1|max:200',
            'category_id' => 'required|exists:categories,id',
            'variation_id' => 'required|exists:variations,id',
        ]);

        $brand = new Brand();
        $brand->name = $validatedData['name'];
        $brand->category_id = $validatedData['category_id'];
        $brand->variation_id = $validatedData['variation_id'];
        $brand->save();

        $request->session()->flash('status', 'Added a new Brand!');

        return redirect()->route('brands.create');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('brands.edit', compact('brand'));
    }

    public function show($id)
    {
        $brands = Brand::with('products')->findOrFail($id);
        $products = Products::with('variation')->get();
        $variations = Variation::all();
        // dd($variations);
        
        return view('brands.show', [
            'brands' => $brands,
            'products' => $products,
            'variations' => $variations,
        ]);
    }

    public function update(StoreBrands $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $validatedData = $request->validated();
        $brand->fill($validatedData);
        $brand->save();

        $request->session()->flash('status', 'Brands Was Changed!');
        return redirect()->route('brands.create');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        session()->flash('status', 'The Brand is Deleted!');

        return redirect()->route('brands.create');
    }
}
