<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use App\Http\Requests\StoreVariation;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class VariationsController extends Controller
{
    public function create()
    {
        $variations = Variation::all();
        // $categories = Category::all();
        return view('variation.create', compact('variations'));
    }

    public function store(StoreVariation $request)
    {
        $variation = Variation::create([
            'name' => $request->name,
        ]);

        $variation->save();
        $request->session()->flash('status', 'Variation Added');
        return redirect()->route('variations.create');
    }

    public function show($id)
    {
        $variation = Variation::findOrFail($id);
        return view('variation.show', compact('variation'));
    }

    public function all()
    {
        $variations = Variation::all();
        return view('variation.all', compact('variations'));
    }
}
