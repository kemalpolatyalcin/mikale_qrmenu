<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index()
    {
        $categoryCount = Category::count();
        $productCount = Product::count();
        return view('admin.dashboard', compact('categoryCount', 'productCount'));
    }

    public function categories()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $category = new Category();
        $category->name = $request->name;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $category->image_url = 'images/' . $imageName;
        } else {
            $category->image_url = 'images/placeholder.jpg';
        }

        $category->save();
        return redirect()->back()->with('success', 'Kategori başarıyla eklendi!');
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;

        if ($request->hasFile('image')) {

            if ($category->image_url && !str_contains($category->image_url, 'placeholder')) {
                if (File::exists(public_path($category->image_url))) {
                    File::delete(public_path($category->image_url));
                }
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $category->image_url = 'images/' . $imageName;
        }

        $category->save();
        return redirect()->back()->with('success', 'Kategori güncellendi!');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->back()->with('success', 'Kategori silindi!');
    }

    public function products()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $categories = Category::all();
        return view('admin.products', compact('products', 'categories'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'calories' => 'nullable|integer',
            'prep_time' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->calories = $request->calories;
        $product->prep_time = $request->prep_time;
        $product->is_gluten_free = $request->has('is_gluten_free') ? 1 : 0;

        if ($request->hasFile('image')) {
            $imageName = time() . '_prod.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image_url = 'images/' . $imageName;
        }

        $product->save();
        return redirect()->back()->with('success', 'Ürün başarıyla eklendi!');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image_url && File::exists(public_path($product->image_url))) {
            File::delete(public_path($product->image_url));
        }

        $product->delete();
        return redirect()->back()->with('success', 'Ürün silindi!');
    }
    public function orders()
    {
        return view('admin.orders');
    }
    public function settings()
    {
        return view('admin.settings');
    }
}