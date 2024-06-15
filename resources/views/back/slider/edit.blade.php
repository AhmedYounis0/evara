@extends('back.master')

@section('content')
    <section class="content-main">
        <div class="row">
            <div class="col-12">
                <div class="content-header">
                    <h2 class="content-title">Update Slider</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('sliders.update',$slider) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-4 col-lg-6">
                                    <label for="post_name" class="form-label">Header</label>
                                    <input type="text" name="header" placeholder="Type here" class="form-control" id="post_name" value="{{ $slider->header }}">
                                    @error('header')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label for="post_name" class="form-label">Title</label>
                                    <input type="text" name="title" placeholder="Type here" class="form-control" id="post_name" value="{{ $slider->title }}">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label for="post_name" class="form-label">Content</label>
                                    <input type="text" name="content" placeholder="Type here" class="form-control" id="post_name" value="{{ $slider->content }}">
                                    @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label for="post_name" class="form-label">Link</label>
                                    <input type="text" name="url" placeholder="Type here" class="form-control" id="post_name" value="{{ $slider->url }}">
                                    @error('url')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <label for="post_name" class="form-label">Image</label>
                                    <input type="file" name="image" placeholder="Type here" class="form-control" id="post_name">
                                    <img src="/storage/sliders/{{$slider->image}}" style="width: 150px; height: 150px;">
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
