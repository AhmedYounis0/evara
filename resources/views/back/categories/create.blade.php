@extends('back.master')

@section('content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title">Create Category</h2>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="row">
                        <div class="mb-4 col-lg-6">
                            <label for="post_name" class="form-label">Category</label>
                            <input type="text" name="name" placeholder="Type here" class="form-control" id="post_name" value="{{ old('title') }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                            <div class="col-lg-6">
                                <label class="form-label">Category Parent</label>
                                <select name="category_id" class="form-select">
                                    <option selected disabled>Select Category</option>
                                    @if(count($categories) > 0)
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12">
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
