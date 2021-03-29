@extends('front-end.master')
@section('content')
    <div class="row">
        <div class="col-12 col-md-5">
            <form method="post" action="{{ route('cart.submit_checkout') }}">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control" id="" >
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control" id="" >
                </div>
                <button type="submit" class="btn btn-primary">Checkout</button>
            </form>
        </div>
        <div class="col-12 col-md-7">
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
                        <div>
                            <h4>TotalMoney Cart: {{ number_format($cart->totalPrice, 0, '.','.') }}</h4>
                            <button class="btn btn-primary" type="submit">Update Cart</button>
                            <a href="{{ route('cart.delete') }}" class="btn btn-danger">Delete Cart</a>
                        </div>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
