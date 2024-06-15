@extends('back.master')

@section('content')
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Slider</h2>
            </div>
            <div>
                <a href="{{ route('sliders.create') }}" class="btn btn-primary btn-sm rounded">Create new</a>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card mb-4">
            <div class="card-body">
                <div id="posts-table">
                    @include('back.slider.partials.sliders')
                </div>
            </div>
        </div>
    </section>
@endsection
