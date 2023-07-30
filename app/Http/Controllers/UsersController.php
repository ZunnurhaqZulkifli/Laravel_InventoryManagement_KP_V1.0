<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\Http\Requests\UserStore;
use App\Models\Image;
use App\Models\Sales;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['show']);
    }

    public function index()
    {
        $users = User::with(['sales' => function($query) {
            $query;
        }])->get();

        $topSales = User::with(['sales' => function($query) {
            $query->orderBy('id', 'desc');
        }])->get();

        return view('users.index', compact('users', 'topSales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $users = User::all();
        $highestSales = User::with(['sales' => function($query) {
            $query;
        }])->get();


        $key = 1;

        $user = User::find($id);
        $mySales = Sales::where('user_id', $id)->orderBy('totalSales', 'desc')->take(3)->get();
        $mySales1 = Sales::where('user_id', $id)->orderBy('totalSales', 'desc')->get();
        $myTotalSales = $mySales1->sum('totalSales');

        return view('users.show', compact('user', 'mySales', 'myTotalSales', 'key'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUser $request, User $user)
    {
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('avatars');
            
            if ($user->image) {
                $user->image->path = $path;
                $user->image->save();
            } else {
                $user->image()->save(
                    Image::make(['path' => $path])
                );
            }
        }

        Toastr::success('Profile Was Updated', 'Proflie Updated', ["positionClass" => "toast-top-right"]);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->destroy();

        Toastr::error('User is removed', 'User Deleted', ["positionClass" => "toast-top-right"]);
        return view('home');
    }
}
