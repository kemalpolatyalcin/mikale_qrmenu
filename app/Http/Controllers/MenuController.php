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

    public function getTable($token)
    {
        $table = \App\Models\Table::where('token', $token)->first();
        if ($table) {
            return response()->json(['status' => 'success', 'data' => ['name' => $table->name]]);
        }
        return response()->json(['status' => 'error', 'message' => 'Table not found'], 404);
    }
}