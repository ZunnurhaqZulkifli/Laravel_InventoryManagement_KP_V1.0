<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategories;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Products;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

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
        $products = Products::with('category','brand', 'variation')->get();

        return view('categories.index', compact('categories', 'products'));
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

        Toastr::success('Added a new category!', 'Category Created', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.products.create');
    }


    public function all()
    {
        $categories = Category::all();
        return view('categories.all', compact('categories'));
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(StoreCategories $request, $id)
    {
        $category = Category::findOrFail($id);
        $validatedData = $request->validated();
        $category->fill($validatedData);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('Category_Images');

            if ($category->image) {
                Storage::delete($category->image->path);
                $category->image->path = $path;
                $category->image->save();
            } else {
                $category->image()->save(
                    Image::create(['path' => $path])
                );
            }
        }

        $category->save();

        Toastr::info('Category Updated Successfully', 'Category Updated', ["positionClass" => "toast-top-right"]);
        return redirect()->route('categories.show', [$category->id]);
    }

    public function destroy($id)
    {
        $category = Category::findOrfail($id);
        $category->delete();

        Toastr::error('Category Successfully Removed!', 'Category Deleted!', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.products.create');
    }
}
