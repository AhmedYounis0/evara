<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th scope="col">Header</th>
            <th scope="col">Title</th>
            <th scope="col">Sub Title</th>
            <th scope="col">Content</th>
            <th scope="col">Image</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        @if(count($sliders) > 0)
            @foreach($sliders as $slider)
                <tr>
                    <td>{{ 1 + $loop->index }}</td>
                    <td>{{ $slider->header }}</td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->subtitle }}</td>
                    <td>{{ $slider->content }}</td>
                    <td><img src="/storage/sliders/{{ $slider->image }}" style="height: 100px; width: 100px;"></td>
                    <td class="text-end">
                        <a href="{{ route('sliders.edit', $slider) }}" class="btn btn-dark rounded font-sm">Edit</a>
                        <form action="{{ route('sliders.destroy', $slider) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger rounded font-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="alert alert-danger text-center" colspan="7">No Slider to view</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
