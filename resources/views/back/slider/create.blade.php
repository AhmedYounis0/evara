@extends('back.master')

@section('content')
    <section class="content-main">
        <div class="row">
            <div class="col-12">
                <div class="content-header">
                    <h2 class="content-title">Create Feature</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-4 col-lg-6">
                                    <label for="post_name" class="form-label">Header</label>
                                    <input type="text" name="header" placeholder="Type here" class="form-control" id="post_name" value="{{ old('header') }}">
                                    @error('header')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label for="post_name" class="form-label">Title</label>
                                    <input type="text" name="title" placeholder="Type here" class="form-control" id="post_name" value="{{ old('title') }}">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label for="post_name" class="form-label">Sub Title</label>
                                    <input type="text" name="subtitle" placeholder="Type here" class="form-control" id="post_name" value="{{ old('title') }}">
                                    @error('subtitle')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label for="post_name" class="form-label">Content</label>
                                    <input type="text" name="content" placeholder="Type here" class="form-control" id="post_name" value="{{ old('content') }}">
                                    @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label for="post_name" class="form-label">Link</label>
                                    <input type="text" name="url" placeholder="Type here" class="form-control" id="post_name" value="{{ old('url') }}">
                                    @error('url')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="post_name" class="form-label">Image</label>
                                    <input type="file" name="image" placeholder="Type here" class="form-control" id="post_name">
                                    @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 mt-4">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm rounded">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- card end// -->
            </div>
        </div>
    </section>
@endsection
