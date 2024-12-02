@extends('product.layout');

@section('content')
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Student Record CRUD</h3>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="row justify-content-center mt-4">
                <div class="col-md-10 d-flex justify-content-end">
                    <a href="{{ route('product.index') }}" class="btn btn-dark">Back</a>
                </div>
                <form action="{{ route('product.update', $product->id) }}" method="POST" class="form p-3" id="form-crud"
                    name="myForm" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ $product->name }}" placeholder="Enter Your Name" id="name" name="name"
                                aria-describedby="full-name">
                            @error('name')
                                <p class="invalid-feedback" role="alert">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sku" class="form-label fw-semibold">SKU:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="SKU"
                                value="{{ $product->sku }}" id="sku" aria-describedby="sku" name="sku">
                            @error('sku')
                                <p class="invalid-feedback" role="alert">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label fw-semibold">Quantity:</label>
                            <input type="number" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Quantity" id="quantity" aria-describedby="qty" name="quantity"
                                value="{{ $product->quantity }}">
                            @error('quantity')
                                <p class="invalid-feedback " role="alert">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label fw-semibold">Price:</label>
                            <input type="number" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Price" id="price" aria-describedby="price" name="price"
                                value="{{ $product->price }}">
                            @error('price')
                                <p class="invalid-feedback " role="alert">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold">Description:</label>
                            <textarea type="password" class="form-control " placeholder="Leave Your Message" id="description" cols="39"
                                rows="3">{{ $product->description }}</textarea>

                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold" for="file">Image:</label><br>
                            <input type="file" accept="image/*" class="form-control @error('name') is-invalid @enderror"
                                id="file" placeholder="Attach Photo" name="image"
                                onchange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])">
                            <div class="py-3">
                                <img id="output" class="img-fluid" width="150"
                                    src="{{ asset('/storage/' . $product->image) }}" alt="image">
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn-lg btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection;
