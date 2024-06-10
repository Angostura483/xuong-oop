@extends('layouts.master')

@section('title')
    Chi tiết danh mục
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Chi tiết danh mục: {{ $category['name'] }}</h3>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" id="id" value="{{ $category['id'] }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" value="{{ $category['name'] }}" disabled>
                    </div>
                    <a href="{{ url('admin/categories') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
