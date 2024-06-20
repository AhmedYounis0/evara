<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Stock</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        @if(count($products) > 0)
            @foreach($products as $product)
                <tr>
                    <td>{{ 1 + $loop->index }}</td>
                    <td><img src="/storage/products/{{ $product->image }}" alt="" style="height: 75px; width: 75px;"></td>
                    <td><b>{{ $product->name }}</b></td>
                    <td><b>{{ $product->price }}</b></td>
                    <td><b>{{ $product->stock }}</b></td>
                    <td class="text-end">
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-dark rounded font-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger rounded font-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="alert alert-danger text-center" colspan="6">No products to view</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
