@extends('layouts.master')

@section('title')
    Chỉnh sửa sản phẩm
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Chỉnh sửa sản phẩm: {{ $product['name'] }}</h3>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <form action="{{ url("admin/products/{$product['id']}/update") }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}"
                                        {{ $product['category_id'] == $category['id'] ? 'selected' : '' }}>
                                        {{ $category['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $product['name'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="img">Image</label>
                            <input type="file" class="form-control" id="img" name="img">
                            <img src="{{ asset($product['img']) }}" alt="" width="100px">
                        </div>
                        <div class="form-group">
                            <label for="price_regular">Price Regular</label>
                            <input type="number" class="form-control" id="price_regular" name="price_regular"
                                value="{{ $product['price_regular'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="price_sale">Price Sale</label>
                            <input type="number" class="form-control" id="price_sale" name="price_sale"
                                value="{{ $product['price_sale'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="overview">Ovewview</label>
                            <textarea class="form-control" id="overview" name="overview" rows="3" required>{{ $product['overview'] }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $product['content'] }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="views">Views</label>
                            <input type="number" class="form-control" id="views" name="views"
                                value="{{ $product['views'] }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('admin/products') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
