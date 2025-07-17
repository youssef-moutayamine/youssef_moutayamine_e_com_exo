<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:seller');
    }

    public function create()
    {
        return view('seller.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $data = $request->only(['name', 'description', 'price']);
        $data['user_id'] = auth()->id();

        \App\Models\Product::create($data);

        return back();
    }
}
