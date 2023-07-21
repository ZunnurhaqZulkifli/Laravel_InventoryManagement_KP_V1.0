<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategories;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Variation;

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
        //1. Every store requires a validation
        $validatedData = $request->validated();
        //2. This is where you get the id for model created
        $validatedData['category_id'] = $request->id;
        //3. Create an item once data is validated
        $category = Category::create($validatedData);

        if($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('Category_Images');
            $category->image()->save(
                Image::create(['path' => $path])
            );
        }

        // dd($category);

        $request->session()->flash('status', 'Added a new Categories!');

        return redirect()->route('categories.create');
    }
}
