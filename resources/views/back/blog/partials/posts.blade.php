<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Views</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col" class="text-center"> Action </th>
        </tr>
        </thead>
        <tbody>
        @if(count($posts) > 0)
            @foreach($posts as $post)
                <tr>
                    <td>{{ $posts->firstItem() + $loop->index }}</td>
                    <td><b>{{ $post->title }}</b></td>
                    <td><img src="/storage/blogs/{{ $post->image }}" style="height: 150px; width: 150px;" alt=""></td>
                    <td>{{ $post->views }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->blogcategory->name }}</td>
                    <td class="text-end">
                        <a href="{{ route('posts.show',$post) }}" class="btn btn-md rounded font-sm">Details</a>
                        <a href="{{ route('posts.edit',$post) }}" class="btn btn-dark rounded font-sm">Edit</a>
                        <form action="{{ route('posts.destroy',$post) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger rounded font-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
        <tr>
            <td class="alert alert-danger text-center" colspan="7">No posts to view</td>
        </tr>
        @endif
        </tbody>
    </table>
</div>
{{ $posts->render('pagination::bootstrap-5') }}
