<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBrands;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Products;
use App\Models\Variation;
use Brian2694\Toastr\Facades\Toastr;

class BrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->only(['show', 'create', 'update', 'allBrands']);
    }

    public function index()
    {

        $brands = Brand::all();
        $products = Products::with('category','brand', 'variation')->get();
        $category = Category::all();

        return view('brands.index' , [
            'products'=> $products , 
            'categories' => Category::with('products')->get(),
            'brands' => $brands,
        ]);
    }

    public function all()
    {
        $brands = Brand::all();
        return view('brands.all', compact('brands'));
    }
    
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $variations = Variation::all();
        return view('brands.create', compact('categories', 'brands', 'variations'));
    }

    public function store(StoreBrands $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:1|max:200',
            'category_id' => 'required|exists:categories,id',
        ]);

        $brand = new Brand();
        $brand->name = $validatedData['name'];
        $brand->category_id = $validatedData['category_id'];
        $brand->save();

        Toastr::success('Brand Created Successfully', 'Brand Created', ["positionClass" => "toast-top-right"]);
        return redirect()->route('home');
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

        Toastr::info('Brand Updated Successfully', 'Brand Updated', ["positionClass" => "toast-top-right"]);
        return redirect()->route('brands.create');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        Toastr::error('Brand Deleted Successfully', 'Brand Deleted!', ["positionClass" => "toast-top-right"]);
        return redirect()->route('brands.create');
    }
}
