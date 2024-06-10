@extends('layouts.master')

@section('title')
    Login
@endsection

@section('content')
    <div class="container">
        <h1 class="mt-5 mb-3 text-center">Login</h1>

        @if (!empty($_SESSION['error']))
            <div class="alert alert-warning mt-3 mb-3">
                {{ $_SESSION['error'] }}
            </div>

            @php
                unset($_SESSION['error']);
            @endphp
        @endif

        <div>
            <div class="mb-4 pb-4"></div>
            <section class="login-register container">
                <h2 class="d-none">Login </h2>
                <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab"
                            href="#tab-item-login" role="tab" aria-controls="tab-item-login"
                            aria-selected="true">Login</a>
                    </li>
                </ul>
                <div class="tab-content pt-2" id="login_register_tab_content">
                    <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
                        <div class="login-form">
                            <form action="{{ url('handle-login') }}" method="POST" name="login-form">
                                <div class="form-floating mb-3">
                                    <input name="email" type="email" class="form-control form-control_gray"
                                        id="email" placeholder="Email address *">
                                    <label for="customerNameEmailInput1">Email address *</label>
                                </div>

                                <div class="pb-3"></div>

                                <div class="form-floating mb-3">
                                    <input name="password" type="password" class="form-control form-control_gray"
                                        id="pwd" placeholder="Password *">
                                    <label for="customerPasswodInput">Password *</label>
                                </div>

                                <div class="d-flex align-items-center mb-3 pb-2">
                                    <div class="form-check mb-0">
                                        <input name="remember" class="form-check-input form-check-input_fill"
                                            type="checkbox" value="" id="flexCheckDefault1">
                                        <label class="form-check-label text-secondary" for="flexCheckDefault1">Remember
                                            me</label>
                                    </div>
                                    <a href="reset_password.html" class="btn-text ms-auto">Lost password?</a>
                                </div>

                                <button class="btn btn-primary w-100 text-uppercase" type="submit">Log In</button>

                                <div class="customer-option mt-4 text-center">
                                    <span class="text-secondary">No account yet?</span>
                                    <a href="#register-tab" class="btn-text js-show-register">Create Account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
