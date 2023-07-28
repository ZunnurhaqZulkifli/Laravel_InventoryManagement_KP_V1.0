<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use App\Http\Requests\StoreVariation;
use App\Models\Brand;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class VariationsController extends Controller
{
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

    public function destroy($id)
    {
        $variation = Category::findOrfail($id);
        $variation->delete();

        Toastr::error('Variation Successfully Removed!', 'Variation Deleted!', ["positionClass" => "toast-top-right"]);
        return view('home');
    }
}
