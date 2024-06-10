@extends('layouts.master')

@section('title')
    Thêm mới người dùng
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
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <h1 class="m-2">Cập nhật người dùng: {{ $user['name'] }}</h1>

                <form action="{{ url("admin/users/{$user['id']}/update") }}" enctype="multipart/form-data" method="POST">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label m-2">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name"
                            value="{{ $user['name'] }}" name="name">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label m-2">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email"
                            value="{{ $user['email'] }}" name="email">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="avatar" class="form-label m-2">Avatar:</label>
                        <input type="file" class="form-control" id="avatar" placeholder="Enter avatar" name="avatar">
                        <img src="{{ asset($user['avatar']) }}" alt="" width="100px">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="password" class="form-label m-2">Password:</label>
                        <input type="text" class="form-control" id="password" placeholder="Enter password"
                            name="password">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('admin/users') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
