@extends('back.master')

@section('content')
    <section class="content-main">
        <div class="row">
            <div class="col-12">
                <div class="content-header">
                    <h2 class="content-title">Update Category</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('categories.update',$category) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-4 col-lg-6">
                                    <label for="post_name" class="form-label">Category</label>
                                    <input type="text" name="name" placeholder="Type here" class="form-control" id="post_name" value="{{ $category->name }}">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label for="post_image" class="form-label">Image</label>
                                    <input type="file" name="image"  class="form-control" id="post_image">
                                    @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @if(!$category->category_id == null)
                                    <div class="col-lg-6 mb-5">
                                        <label class="form-label">Category Parent</label>
                                        <select name="category_id" class="form-select">
                                            <option selected disabled>Select Category</option>
                                            @if(count($categories) > 0)
                                                @foreach($categories as $cat)
                                                    <option value="{{ $cat->id }}" @if($cat->id == $category->category_id) selected @endif>{{ $cat->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm rounded">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- card end// -->
            </div>
        </div>
    </section>
@endsection
