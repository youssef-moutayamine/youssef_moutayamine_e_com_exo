<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.index', compact('users'));
    }

    public function updateUserRole(Request $request, User $user)
    {
        $role = $request->input('role');
        if (!in_array($role, ['admin', 'seller', 'customer'])) {
            return back();
        }
        $user->syncRoles([$role]);
        return back();
    }

    public function updateRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|in:admin,seller,customer',
        ]);
        $user = User::where('id', $request->user_id)->first();
        if (!$user) {
            return back();
        }
        $user->syncRoles([$request->role]);
        return back();
    }

    public function customerDashboard()
    {
        $products = \App\Models\Product::with('user')->get();
        return view('customer.index', compact('products'));
    }

    public function sellerDashboard()
    {
        return view('seller.index');
    }
} 