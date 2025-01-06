@extends('layouts.app')

@section('content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home-page') }}">Home</a></li>
                    <li class="active">Register</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->

    <!-- Begin Login Content Area -->
    <div class="page-section mt-60 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                    <form action="{{ route('post-register') }}" method="POST">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">Register</h4>
                            <div class="row">
                                <div class="col-md-12  mb-20">
                                    <label>Fullname</label>
                                    <input class="mb-0" type="text" name="name" placeholder="First Name">
                                </div>
                                {{-- <div class="col-md-6 col-12 mb-20">
                                    <label>Last Name</label>
                                    <input class="mb-0" type="text" placeholder="Last Name">
                                </div> --}}
                                <div class="col-md-12 mb-20">
                                    <label>Email Address*</label>
                                    <input class="mb-0" type="email" name ="email" placeholder="Email Address">
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label>Password</label>
                                    <input class="mb-0" type="password" name ="password" placeholder="Password">
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label>Confirm Password</label>
                                    <input class="mb-0" type="password" name="confirm_password"
                                        placeholder="Confirm Password">
                                </div>
                                <div class="col-12">
                                    <button class="register-button mt-0">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content Area End Here -->

    <!-- Display login error message if exists -->
    @if (session('no'))
        <div class="alert alert-danger mt-3">
            {{ session('no') }}
        </div>
    @elseif (session('ok'))
        <div class="alert alert-danger mt-3">
            {{ session('ok') }}
        </div>
    @endif
@endsection
