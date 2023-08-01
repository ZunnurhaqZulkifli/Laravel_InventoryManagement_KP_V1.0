<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use App\Http\Requests\StoreVariation;
use App\Models\Category;
use App\Models\Image;
use App\Models\Products;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class VariationsController extends Controller
{
    public function index()
    {
        $variations = Variation::all();
        $products = Products::with('variation')->get();
        return view('variation.index', compact('products', 'variations'));
    }

    public function all()
    {
        $variations = Variation::all();
        return view('variation.all', compact('variations'));
    }

    public function create()
    {
        $variations = Variation::all();
        return view('variation.create', compact('variations'));
    }

    public function store(StoreVariation $request)
    {
        $variation = Variation::create([
            'name' => $request->name,
        ]);

        $variation->save();

        Toastr::success('Variation Successfully Created!', 'Variation Created!', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.products.create');
    }

    public function show($id)
    {
        $variation = Variation::findOrFail($id);
        return view('variation.show', compact('variation'));
    }

    public function destroy($id)
    {
        $variation = Variation::findOrfail($id);
        $variation->delete();

        Toastr::error('Variation Successfully Removed!', 'Variation Deleted!', ["positionClass" => "toast-top-right"]);
        return view('admin.products.create');
    }

    public function edit($id)
    {
        $variation = Variation::findOrFail($id);
        return view('variation.edit', compact('variation'));
    }

    public function update(StoreVariation $request,$id)
    {
        $variation = Variation::findOrFail($id);
        $validatedData = $request->validated();
        $variation->fill($validatedData);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('Variation_Images');

            if ($variation->image) {
                Storage::delete($variation->image->path);
                $variation->image->path = $path;
                $variation->image->save();
            } else {
                $variation->image()->save(
                    Image::create(['path' => $path])
                );
            }
        }

        $variation->save();

        Toastr::info('Variation Updated Successfully', 'Variation Updated', ["positionClass" => "toast-top-right"]);
        return redirect()->route('home');
    }
}
