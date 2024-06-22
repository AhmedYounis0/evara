<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th scope="col">Name</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @if(count($tags) > 0)
            @foreach($tags as $tag)
                <tr>
                    <td>{{ 1 + $loop->index }}</td>
                    <td><b>{{ $tag->name }}</b></td>
                    <td class="text-end">
                        <a href="{{ route('tags.edit', $tag) }}" class="btn btn-dark rounded font-sm">Edit</a>
                        <form action="{{ route('tags.destroy', $tag) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger rounded font-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="alert alert-danger text-center" colspan="3">No Features to view</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
