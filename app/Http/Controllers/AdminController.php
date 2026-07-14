<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use App\Models\Table;
use Illuminate\Support\Str;

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
            $category->image_url = '';
        }

        $category->save();
        return redirect()->back()->with('success', 'Kategori başarıyla eklendi!');
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;

        if ($request->hasFile('image')) {
            if ($category->image_url && File::exists(public_path($category->image_url))) {
                File::delete(public_path($category->image_url));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $category->image_url = 'images/' . $imageName;
        }

        $category->save();
        return redirect()->back()->with('success', 'Kategori başarıyla güncellendi!');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        if ($category->image_url && File::exists(public_path($category->image_url))) {
            File::delete(public_path($category->image_url));
        }
        $category->delete();
        return redirect()->back()->with('success', 'Kategori silindi!');
    }

    public function tables()
    {
        $tables = Table::orderBy('id', 'desc')->get();
        return view('admin.tables', compact('tables'));
    }

    public function storeTable(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        Table::create([
            'name' => $request->name,
            'token' => Str::random(8)
        ]);

        return redirect()->back()->with('success', 'Masa başarıyla oluşturuldu.');
    }

    public function deleteTable($id)
    {
        Table::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Masa silindi.');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->calories = $request->calories ?? 0;
        $product->is_gluten_free = $request->has('is_gluten_free') ? 1 : 0;

        if ($request->hasFile('image')) {
            $imageName = time() . '_prod.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image_url = 'images/' . $imageName;
        } else {
            $product->image_url = '';
        }

        $product->save();
        return redirect()->back()->with('success', 'Ürün başarıyla eklendi!');
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'calories' => 'nullable|integer'
        ]);

        $product = Product::findOrFail($id);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->calories = $request->calories ?? 0;
        $product->is_gluten_free = $request->has('is_gluten_free') ? 1 : 0;

        if ($request->hasFile('image')) {
            if ($product->image_url && File::exists(public_path($product->image_url))) {
                File::delete(public_path($product->image_url));
            }
            $imageName = time() . '_prod.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image_url = 'images/' . $imageName;
        }

        $product->save();
        return redirect()->back()->with('success', 'Ürün başarıyla güncellendi!');
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
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $textSettings = $request->except(['_token', 'logo', 'cover_image']);

        foreach ($textSettings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        if ($request->hasFile('logo')) {
            $oldLogo = Setting::where('key', 'logo')->value('value');
            if ($oldLogo && File::exists(public_path($oldLogo))) {
                File::delete(public_path($oldLogo));
            }

            $logoName = 'logo_' . time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('images/settings'), $logoName);
            Setting::updateOrCreate(['key' => 'logo'], ['value' => 'images/settings/' . $logoName]);
        }

        if ($request->hasFile('cover_image')) {
            $oldCover = Setting::where('key', 'cover_image')->value('value');
            if ($oldCover && File::exists(public_path($oldCover))) {
                File::delete(public_path($oldCover));
            }

            $coverName = 'cover_' . time() . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('images/settings'), $coverName);
            Setting::updateOrCreate(['key' => 'cover_image'], ['value' => 'images/settings/' . $coverName]);
        }

        return redirect()->back()->with('success', 'Restoran bilgileri başarıyla güncellendi.');
    }
}