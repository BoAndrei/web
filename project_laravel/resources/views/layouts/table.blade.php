<table style="width: 100%">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Image</th>
        <th>Operation</th>
    </tr>

    @foreach ($products as $product)

        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td><image height="100" width="100" src="/images/{{ $product->image }}" /></td>

            <td>

                @if (!in_array($product->id, Session::get('cart') ? Session::get('cart') : array()))

                    @if (Auth::check() && Auth::user()->role == 1)
                        <a href="{{ route('products.edit', ['id' => $product->id]) }}">Edit product</a>

                        <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE" >
                            <input type="submit" value="delete ">
                        </form>

                    @else
                        <a href="/product/cart/add/{{ $product->id }}">Add To Cart</a>
                    @endif

                @else
                    <a href="/product/cart/remove/{{ $product->id  }}">Remove From Cart</a>
                @endif

            </td>
        </tr>

    @endforeach
</table>