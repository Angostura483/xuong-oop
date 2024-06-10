@extends('layouts.master')

@section('title')
    Chi tiết sản phẩm
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Chi tiết sản phẩm: {{ $product['name'] }}</h3>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" id="id" value="{{ $product['id'] }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Danh mục</label>
                        <input type="text" class="form-control" id="category_id"
                            @foreach ($categories as $category)
                                @if ($category['id'] == $product['category_id'])
                                    value="{{ $category['name'] }}"
                                @endif
                            @endforeach disabled>
                    </div>
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="name" value="{{ $product['name'] }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="img">Hình ảnh</label>
                        <div>
                            <img src="{{ url($product['img']) }}" alt="" width="100">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price_regular">Giá gốc</label>
                        <input type="text" class="form-control" id="price_regular"
                            value="{{ $product['price_regular'] }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="price_sale">Giá khuyến mãi</label>
                        <input type="text" class="form-control" id="price_sale" value="{{ $product['price_sale'] }}"
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="overview">Tổng quan</label>
                        <textarea class="form-control" id="overview" rows="3" disabled>{{ $product['overview'] }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung</label>
                        <textarea class="form-control" id="content" rows="5" disabled>{{ $product['content'] }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="views">Lượt xem</label>
                        <input type="text" class="form-control" id="views" value="{{ $product['views'] }}" disabled>
                    </div>
                    <a href="{{ url('admin/products') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
