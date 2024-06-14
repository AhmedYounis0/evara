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
                    <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="post_name" class="form-label">Brand Name</label>
                            <input type="text" name="name" placeholder="Type here" class="form-control" id="post_name" value="{{ old('title') }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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
