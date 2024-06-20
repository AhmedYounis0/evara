<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @if(count($features) > 0)
            @foreach($features as $feature)
                <tr>
                    <td>{{ 1 + $loop->index }}</td>
                    <td><b>{{ $feature->name }}</b></td>
                    <td><img src="/storage/features/{{ $feature->image }}" style="height: 75px; width: 75px;"></td>
                    <td class="text-end">
                        <a href="{{ route('features.edit', $feature) }}" class="btn btn-dark rounded font-sm">Edit</a>
                        <form action="{{ route('features.destroy', $feature) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger rounded font-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="alert alert-danger text-center" colspan="4">No Features to view</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
