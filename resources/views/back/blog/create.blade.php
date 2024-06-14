@extends('back.master')

@section('content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title">Add New Post</h2>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="post_name" class="form-label">Post title</label>
                            <input type="text" name="title" placeholder="Type here" class="form-control" id="post_name" value="{{ old('title') }}">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label> Body </label>
                                <textarea class="form-control" style="height: 100px !important;" id="body" placeholder="Enter the Description" name="description">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label">Image</label>
                                    <input class="form-control" name="image" type="file">
                                    @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> <!-- col.// -->
                            <div class="col-lg-6">
                                <label class="form-label">Categories</label>
                                <select name="blog_category_id" class="form-select">
                                    <option selected disabled>Select Category</option>
                                    @if(count($categories) > 0)
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('blog_category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm rounded">Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- card end// -->
        </div>
    </div>
</section>
@endsection
