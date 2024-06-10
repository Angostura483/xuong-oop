@extends('layouts.master')

@section('title')
    Cart
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 m-auto">
                <div class="card">
                    <img class="card-img-top" style="max-height: 200px" src="{{ asset($product['img']) }}" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">{{ $product['name'] }}</h4>

                        <form action="{{ url('cart/add') }}" method="get">
                            <input type="hidden" name="productID" value="{{ $product['id'] }}">
                            <input type="number" min="1" name="quantity" value="1">
                            <button type="submit">Thêm vào giỏ hàng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
