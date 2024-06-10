@extends('layouts.master')

@section('title')
    Thêm sản phẩm mới
@endsection

@section('content')
    @if (!empty($_SESSION['errors']))
        <div class="alert alert-warning">
            <ul>
                @foreach ($_SESSION['errors'] as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            @php
                unset($_SESSION['errors']);
            @endphp
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Thêm sản phẩm mới</h3>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <form action="{{ url('admin/products/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="img">Image</label>
                            <input type="file" class="form-control" id="img" name="img" required>
                        </div>
                        <div class="form-group">
                            <label for="price_regular">Price Regular</label>
                            <input type="number" class="form-control" id="price_regular" name="price_regular" required>
                        </div>
                        <div class="form-group">
                            <label for="price_sale">Price Sale</label>
                            <input type="number" class="form-control" id="price_sale" name="price_sale" required>
                        </div>
                        <div class="form-group">
                            <label for="overview">Ovewview</label>
                            <textarea class="form-control" id="overview" name="overview" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('admin/products') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
