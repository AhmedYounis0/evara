@extends('back.master')

@section('content')
    <section class="content-main">
        <form action="{{ route('products.update',$product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="content-header">
                        <h2 class="content-title">Update Product</h2>
                        <div>
                            <button class="btn btn-md rounded font-sm hover-up">Update</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="product_title" class="form-label">Product title</label>
                                <input type="text" name="name" value="{{ $product->name }}" placeholder="Type here" class="form-control" id="product_title">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Price</label>
                                <input type="text" name="price" value="{{ $product->price }}" placeholder="Type here" class="form-control">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row gx-3">
                                <div class="col-md-4  mb-3">
                                    <label for="product_offer" class="form-label">Offer</label>
                                    <input type="text" name="offer" value="{{ $product->offer }}" placeholder="Type here" class="form-control" id="product_offer">
                                    @error('offer')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4  mb-3">
                                    <label for="product_sku" class="form-label">SKU</label>
                                    <input type="text" name="sku" placeholder="Type here" value="{{ $product->sku }}" class="form-control" id="product_sku">
                                    @error('sku')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4  mb-3">
                                    <label for="product_stock" class="form-label">Stock</label>
                                    <input type="text" name="stock" value="{{ $product->stock }}" placeholder="Type here" class="form-control" id="product_stock">
                                    @error('stock')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label class="form-label">Brand</label>
                                    <select name="brand_id" class="form-control">
                                        <option selected disabled>Select brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" @if($brand->id == $product->brand->id) selected @endif>{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label class="form-label">Tags</label>
                                        @foreach($tags->chunk(6) as $chunk)
                                        <div class="row">
                                            @foreach($chunk as $tag)
                                                <div class="form-check col-md-2">
                                                    <input class="form-check-input" name="tags[]" value="{{ $tag->id }}" @if($product->tags->contains('id',$tag->id)) checked @endif type="checkbox" id="product-cat-{{ $tag->id }}">
                                                    <label class="form-check-label" for="product-cat-{{ $tag->id }}">{{ $tag->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @endforeach
                                    @error('tags')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row gx-2">
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-select" id="category-select">
                                        <option selected disabled>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if($category->id == $product->category->category_id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="subcategory-select" class="form-label">Sub-category</label>
                                    <select class="form-select" name="category_id" id="subcategory-select">
                                    </select>
                                    @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> <!-- row.// -->
                        </div>
                    </div> <!-- card end// -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div>
                                <label class="form-label">Short Description</label>
                                <textarea placeholder="Type here" name="short_description" class="form-control" rows="4">{{ $product->short_description }}</textarea>
                                @error('short_description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div> <!-- card end// -->
                    <div class="card">
                        <div class="card-body">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" id="body" placeholder="Enter the Description" name="description">{{ $product->description }}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div>
                                <label class="form-label">Images</label>
                                <input class="form-control" name="image" type="file">
                                <img src="/storage/products/{{ $product->image }}" style="width: 150px; height: 150px;">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div> <!-- card end// -->
                </div>
            </div>
        </form>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#category-select').change(function() {
                var category_id = $(this).val();

                $('#subcategory-select').empty().append('<option value="">Select a sub-category</option>');

                if (category_id) {
                    $.ajax({
                        url: '/dashboard/get-subcategories/' + category_id,
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (data) {
                                $('#subcategory-select').empty();
                                $('#subcategory-select').append('<option value="">Select a sub-category</option>');
                                $.each(data.subcategories, function(key, value) {
                                    $('#subcategory-select').append('<option value="' + value.id + '">' + value.name + '</option>');
                                });
                            } else {
                                $('#subcategory-select').append('<option value="">No sub categories available</option>');
                            }
                        },
                        error: function() {
                            $('#subcategory-select').append('<option value="">Error fetching subcategories</option>');
                        }
                    });
                }
            });
        });
    </script>
@endsection
