<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;


class ProductController extends Controller
{
    //this method will display product
    public function index(): view
    {
        $products = product::orderby('created_at', 'asc')->get();
        return view('product.list', ['product' => $products]);
    }
    public function create()
    {
        return view('product.index');
    }

    public function store(ProductStoreRequest $request): RedirectResponse
    {
        if ($request->image != "") {
            $rules['image'] = 'image';
            // $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            // $request->image->move(public_path('images'), $imageName);
        }
        $validator = Validator::make($request);
        if ($validator->fails()) {
            return redirect('/product/index')->withErrors($validator)->withInput();
        }

        #here we will store the data in the DB
        $products = new product();
        $products->name = $request->name;
        $products->sku = $request->sku;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->save();

        #here we should store the product images
        $image = $request->image;
        $text = $image->getClientOriginalExtension();
        $imageName = time() . "-" . $text;
        $image->move(public_path('public/assets/images'));
        $products->image = $imageName;
        $products->save();

        return redirect()->route('product.index')->with('success', 'products added successfully');
    }
    public function show($id) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}
