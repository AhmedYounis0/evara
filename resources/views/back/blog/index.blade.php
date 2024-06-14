@extends('back.master')

@section('content')
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Posts List</h2>
        </div>
        <div>
            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm rounded">Create new</a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div id="posts-table">
                @include('back.blog.partials.posts')
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetchPosts(page);
        });
        function fetchPosts(page) {
            $.ajax({
                url: "{{ route('posts.index') }}?page=" + page,
                success: function (data) {
                    $('#posts-table').html(data);
                },
                error: function () {
                    alert('Posts could not be loaded.');
                }
            });
        }
    });
</script>
@endsection
