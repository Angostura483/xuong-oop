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
                <form action="{{ url('admin/users/store') }}" enctype="multipart/form-data" method="POST">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label m-2">Name:</label>
                        <input type="text" class="form-control p-2" id="name" placeholder="Enter name" name="name">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label m-2">Email:</label>
                        <input type="email" class="form-control p-2" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="avatar" class="form-label m-2">Avatar:</label>
                        <input type="file" class="form-control p-2" id="avatar" placeholder="Enter avatar" name="avatar">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="password" class="form-label m-2">Password:</label>
                        <input type="text" class="form-control p-2" id="password" placeholder="Enter password"
                            name="password">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="password" class="form-label m-2">Confirm Password:</label>
                        <input type="text" class="form-control p-2" id="confirm_password"
                            placeholder="Enter confirm_password" name="confirm_password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('admin/users') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
