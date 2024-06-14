<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th scope="col">Parent Category</th>
            <th scope="col">Child Category</th>
            <th scope="col" class="text-center"> Action </th>
        </tr>
        </thead>
        <tbody>
        @if(count($categories) > 0)
            @foreach($categories as $category)
                <tr>
                    <td>{{ 1 + $loop->index }}</td>
                    <td><b>{{ $category->name }}</b></td>
                    <td></td>
                    <td class="text-end">
                        <a href="{{ route('categories.edit',$category) }}" class="btn btn-dark rounded font-sm">Edit</a>
                        <form action="{{ route('categories.destroy',$category) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger rounded font-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
        <tr>
            <td class="alert alert-danger text-center" colspan="4">No brands to view</td>
        </tr>
        @endif
        </tbody>
    </table>
</div>
