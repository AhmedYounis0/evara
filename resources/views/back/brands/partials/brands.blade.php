<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col" class="text-center"> Action </th>
        </tr>
        </thead>
        <tbody>
        @if(count($brands) > 0)
            @foreach($brands as $brand)
                <tr>
                    <td>{{ 1 + $loop->index }}</td>
                    <td><b>{{ $brand->name }}</b></td>
                    <td><img src="/storage/brands/{{ $brand->image }}" style="height: 250px; width: 250px;" alt=""></td>
                    <td class="text-end">
                        <a href="{{ route('brands.edit',$brand) }}" class="btn btn-dark rounded font-sm">Edit</a>
                        <form action="{{ route('brands.destroy',$brand) }}" class="d-inline" method="POST">
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
