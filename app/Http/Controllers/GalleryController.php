<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGallery;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\Products;
use Brian2694\Toastr\Facades\Toastr;

class GalleryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')
            ->only(['all']);
    }

    public function all()
    {
        $homeImages = Gallery::all();
        $categoryImages = Category::all();
        $productImages = Products::with('image')->get()->all();
        
        // dd($images);
        return view('gallery.all', compact('productImages', 'homeImages', 'categoryImages'));
    }
    
    public function store(StoreGallery $request)
    {
        $validatedData = $request->validated();
        $validatedData['gallery_id'] = $request->id;
        $gallery = Gallery::create($validatedData);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('Home_Images');
            $gallery->image()->save(
                Image::create(['path' => $path])
            );
        }

        Toastr::success('Image Added Successfully', 'Image Added', ["positionClass" => "toast-top-right"]);
        return redirect()->route('gallery.all');
    }

    public function create()
    {
        $gallery = Gallery::all();
        return view('gallery.create', compact('gallery'));
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        Toastr::error('Image Deleted Successfully', 'Image Deleted!', ["positionClass" => "toast-top-right"]);
        return redirect()->route('gallery.all', compact('gallery'));
    }

    public function show($id)
    {
        //
    }

}