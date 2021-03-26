@extends('front-end.master')
@section('content')
    <form action="{{ route('cart.update') }}" method="post">
        @csrf
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">totalQty</th>
                <th scope="col">totalPrice</th>
                <th>

                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($cart->items as $key => $item)
                <tr>
                    <th scope="row">{{ $key }}</th>
                    <td>{{ $item['product']->desc }}</td>
                    <td>{{ $item['product']->price }}</td>
                    <td><input name="quantity_product[{{$key}}]" type="number" value="{{ $item['totalQty'] }}"></td>
                    <td>{{ $item['totalPrice'] }}</td>
                    <td><a href="{{ route('cart.removeProduct', $key) }}">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            <h4>TotalMoney Cart: {{ number_format($cart->totalPrice, 0, '.','.') }}</h4>
            <button class="btn btn-primary" type="submit">Update Cart</button>
            <a href="{{ route('cart.delete') }}" class="btn btn-danger">Delete Cart</a>
        </div>
    </form>
@endsection
