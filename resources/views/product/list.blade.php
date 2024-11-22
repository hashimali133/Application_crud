@extends('product.layout')

@section('content')

<div class="indexPage">
    <div class="container-fluid bg-dark text-white text-center py-3">
        <h2>Product CRUD</h2>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('product.create') }}" class="btn btn-dark">Create</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if (Session::has('success'))
            <div class="col-md-10">
                <p class="alert alert-success">{{ Session::get('success') }}</p>
            </div>
            @endif
            <div class="col-md-10 shadow-lg my-5 bg-light p-0">
                <table class="table table-primary m-0 p-3">
                    <caption title="Products-Table" class="text-center text-white bg-success" align="top">
                        <h2>Product List</h2>
                    </caption>
                    <thead>

                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name:</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">sku</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->isNotEmpty())
                        @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>
                                @if ($product->image != '')
                                <img src="{{ asset('/storage/' . $product->image) }}" width="80"
                                    alt="Image">
                                <!-- dd({{ $product->image }}) -->
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->sku }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>
@endsection