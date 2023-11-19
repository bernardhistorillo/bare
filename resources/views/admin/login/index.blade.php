@extends('layouts.app')

@section('title', 'Log In')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-sm-10 col-md-7 col-lg-6 col-xl-5 py-5">
            <div class="card border-radius-0 mb-4" style="border:1px solid #000000">
                <div class="card-body p-4 p-sm-5">
                    <p class="text-center code-pro-lc font-size-130 mb-3">Log In</p>
                    <form id="login-form" action="{{ route('admin.login.submit') }}">
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-1 px-5 py-2" name="email" type="text" placeholder="Email Address">
                            <div class="position-absolute" style="right:20px; top:9px">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-1 px-5 py-2" name="password" type="password" placeholder="Password">
                            <div class="position-absolute" style="right:20px; top:9px">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>

                        <div class="text-center mt-2">
                            <button type="submit" class="btn btn-custom-1 px-5 w-100 py-2" id="login">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
