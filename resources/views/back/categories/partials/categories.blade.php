<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th scope="col">Category</th>
            <th scope="col">Sub Category</th>
            <th scope="col">Image</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        @if(count($categories) > 0)
            @foreach($categories as $category)
                <tr>
                    <td>{{ 1 + $loop->index }}</td>
                    <td><b>{{ $category->name }}</b></td>
                    <td></td>
                    <td></td>
                    <td class="text-end">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-dark rounded font-sm">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger rounded font-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @foreach($category->children as $child)
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{ $child->name }}</td>
                        <td><img src="/storage/categories/{{$child->image}}" style="width: 100px; height: 100px;"></td>
                        <td class="text-end">
                            <a href="{{ route('categories.edit', $child) }}" class="btn btn-dark rounded font-sm">Edit</a>
                            <form action="{{ route('categories.destroy', $child) }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger rounded font-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        @else
            <tr>
                <td class="alert alert-danger text-center" colspan="5">No categories to view</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
