<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //this method will display product
    public function index()
    {
        return view('product.list');
    }
    public function create()
    {
        return view('product.index');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'sku' => 'required|numeric',
            'quantity' => 'required|numeric|min:0',
            'price' => 'required|numeric',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('/product/index')->withErrors($validator)->withInput();
        }
    }
    public function show($id) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}
