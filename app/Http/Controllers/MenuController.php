<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getProducts()
    {
        return response()->json([
            'status' => 'success',
            'data' => Product::all()
        ]);
    }

    public function getCategories()
    {
        return response()->json([
            'status' => 'success',
            'data' => Category::all()
        ]);
    }

    public function getUser()
    {
        return response()->json([
            'status' => 'success',
            'data' => User::first()
        ]);
    }
}