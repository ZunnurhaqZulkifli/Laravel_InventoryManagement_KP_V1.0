<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategories;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use Brian2694\Toastr\Facades\Toastr;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->only(['index', 'show', 'store', 'update']);
    }

    public function index()
    {
        $categories = Category::all();

        return view('products.categories', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::with('brands')->findOrFail($id);
        $categories = Category::all();
        $tests = Category::with('brands')->get();
        $brands = Brand::with('category');

        return view('categories.show', [
            'category' => $category,
            'brands' => $brands,
            'categories' => $categories,
            'test' => $tests,
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('categories.create', [
            'categories' => $categories,
        ]);
    }

    public function store(StoreCategories $request)
    {
        $validatedData = $request->validated();
        $validatedData['category_id'] = $request->id;
        $category = Category::create($validatedData);

        if($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('Category_Images');
            $category->image()->save(
                Image::create(['path' => $path])
            );
        }

        // dd($category);

        Toastr::success('Added a new category!', 'Category Created', ["positionClass" => "toast-top-right"]);
        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $category = Category::findOrfail($id);
        $category->delete();

        Toastr::error('Category Successfully Removed!', 'Category Deleted!', ["positionClass" => "toast-top-right"]);
        return view('home');
    }
}
