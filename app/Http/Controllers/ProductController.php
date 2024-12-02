<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class ProductController extends Controller
{
    //this method will display product
    public function index(): view
    {
        $product = Product::orderby('created_at', 'asc')->get();
        return view('product.list', ['products' => $product]);
    }
    public function create()
    {
        return view('product.index');
    }

    public function store(ProductStoreRequest $request): RedirectResponse
    {

        $product = Product::create($request->validated());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $request->image->store('images', 'public');
            $product->image = $path;
            $product->save(); // Update the product record with the image path
        }
        return redirect()->route('product.index')->with('success', 'Product added successfully!');
    }

    // public function show($id) {}
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', [
            'product' => $product
        ]);
    }
    //Public function for Update Product Record
    public function update(ProductUpdateRequest $request, $id): RedirectResponse
    {

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {

            $img_path = public_path('storage/') . $product->image;
            // Delete old image if it exists
            if (file_exists($img_path)) {
                @unlink($img_path);
            }
            $product->update($request->validated());
            // Store new image
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $product->image = $path;

            $product->save();
            // Save product with new image path
        }

        return redirect()->route('product.index')->with('success', 'Product Updated successfully!');
    }



    #Public function for Delelted product record

    public function destroy(Product $product) // Route Model Binding
    {
        try {
            // Delete the associated image if it exists
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            // Delete the student record from the database
            $product->delete();

            return redirect()->route('product.index')->with('success', 'Student record deleted successfully!');
        } catch (\Exception $e) {
            // Handle errors gracefully
            return redirect()->route('product.index')->with('error', 'Failed to delete student record. Please try again.');
        }
    }
}
