@extends('layouts.master')

@section('title')
    Chỉnh sửa danh mục
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Chỉnh sửa danh mục: {{ $category['name'] }}</h3>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <form action="{{ url("admin/categories/{$category['id']}/update") }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $category['name'] }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('admin/categories') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
