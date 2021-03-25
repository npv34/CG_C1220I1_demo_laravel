@extends('front-end.master')
@section('content')
    <div class="row">
        @foreach($products as $product)
        <div class="col-12 col-md-3">
            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->desc }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="{{ route('cart.addToCart', $product->id) }}" class="btn btn-primary">Add to cart</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>

@endsection
