<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getCategories()
    {
        $categories = Category::all();
        return response()->json(['status' => 'success', 'data' => $categories]);
    }

    public function getProducts()
    {
        $products = Product::all();
        return response()->json(['status' => 'success', 'data' => $products]);
    }

    public function getUser()
    {
        return response()->json(['status' => 'success', 'data' => ['name' => 'Kemal Polat']]);
    }
}