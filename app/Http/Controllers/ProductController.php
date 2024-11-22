<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;



class ProductController extends Controller
{
    //this method will display product
    public function index(): view
    {
        $product = product::orderby('created_at', 'asc')->get();
        return view('product.list', ['products' => $product]);
    }
    public function create()
    {
        return view('product.index');
    }

    public function store(ProductStoreRequest $request): RedirectResponse
    {




        $validator = Validator::make($request->all());

        if ($validator->fails()) {
            return redirect()->route('students.create')->withInput()->withErrors($validator);
        }
        #here we will store the data in the DB
        $products = new Product();
        $products->name = $request->name;
        $products->sku = $request->sku;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->save();

        //store file to database
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $path = $request->image->storeAs('images', $imageName, 'public');
        $products->image = $path;
        $products->save();



        #here we should store the product images
        // if ($request->image != "") {
        //     //here we will store image to db
        //     $image = $request->image;
        //     $ext = $image->getClientOriginalExtension();
        //     $imageName = time() . '.' . $ext;

        //     $image->move(public_path('uploads/images'), $imageName);

        //     $products->image = $imageName;
        //     $products->save();
        // }

        return redirect()->route('product.index')->with('success', 'products added successfully');
    }
    public function show($id) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}
