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
                        <form action="{{ route('features.update',$feature) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-4 col-lg-6">
                                    <label for="post_name" class="form-label">Name</label>
                                    <input type="text" name="name" placeholder="Type here" class="form-control" id="post_name" value="{{ $feature->name }}">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <label for="post_name" class="form-label">Image</label>
                                    <input type="file" name="image" placeholder="Type here" class="form-control" id="post_name">
                                    <img src="/storage/features/{{$feature->image}}" style="height: 150px; width: 150px;">
                                    @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
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
