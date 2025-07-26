<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'taille' => 'required',
        'color' => 'required',
        'photo' => 'nullable|image|max:2048',
        'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:10240',
    ]);

    if ($request->hasFile('photo')) {
        $validated['photo'] = $request->file('photo')->store('images', 'public');
    }

    if ($request->hasFile('video')) {
        $validated['video'] = $request->file('video')->store('videos', 'public');
    }

    Product::create($validated);
    return redirect()->route('products.index')->with('success', 'Product created.');
}

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'taille' => 'required',
        'color' => 'required',
        'photo' => 'nullable|image|max:2048',
        'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:10240',
    ]);

    if ($request->hasFile('photo')) {
        if ($product->photo && Storage::disk('public')->exists($product->photo)) {
            Storage::disk('public')->delete($product->photo);
        }
        $validated['photo'] = $request->file('photo')->store('images', 'public');
    }

    if ($request->hasFile('video')) {
        if ($product->video && Storage::disk('public')->exists($product->video)) {
            Storage::disk('public')->delete($product->video);
        }
        $validated['video'] = $request->file('video')->store('videos', 'public');
    }

    $product->update($validated);
    return redirect()->route('products.index')->with('success', 'Product updated.');
}

public function destroy(Product $product)
{
    if ($product->photo && Storage::disk('public')->exists($product->photo)) {
        Storage::disk('public')->delete($product->photo);
    }

    if ($product->video && Storage::disk('public')->exists($product->video)) {
        Storage::disk('public')->delete($product->video);
    }

    $product->delete();
    return redirect()->route('products.index')->with('success', 'Product deleted.');
}
}
