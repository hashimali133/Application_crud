@extends('product.layout')

@section('content')
    <div class="bg-dark py-3">
        <h2 class="text-center text-white">Product CRUD</h2>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-5">
                    <div class="card-header text-center bg-dark">
                        <h2 class="text-white">Add Student</h2>
                    </div>
                    <form action="{{ route('product.store') }}" method="POST" class="form p-3" id="form-crud"
                        name="myForm" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter Your Name" id="name" name="name"
                                    aria-describedby="full-name">
                                @error('name')
                                    <p class="invalid-feedback" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="sku" class="form-label fw-semibold">SKU:</label>
                                <input type="text" class="form-control @error('sku') is-invalid @enderror"
                                    placeholder="SKU" id="sku" aria-describedby="sku" name="sku">
                                @error('sku')
                                    <p class="invalid-feedback" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label fw-semibold">Quantity:</label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                    placeholder="Quantity" id="quantity" autocomplete="cc-number" aria-describedby="qty"
                                    name="quantity">
                                @error('quantity')
                                    <p class="invalid-feedback " role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label fw-semibold">Price:</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    placeholder="Price" id="price" aria-describedby="price" name="price">
                                @error('price')
                                    <p class="invalid-feedback " role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label fw-semibold">Description:</label>
                                <textarea type="password" class="form-control " placeholder="Leave Your Message" id="description" cols="39"
                                    rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold" for="file">Image:</label><br>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="file" placeholder="Attach Photo" name="image">
                                @error('image')
                                    <p class="invalid-feedback " role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn-lg btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
