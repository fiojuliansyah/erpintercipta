@extends('layouts.guest')

@section('title', 'Log In | InterCipta ERP Management')

@section('content')
    <main class="auth auth-floated">
        <!-- form -->
        <form class="auth-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <div class="mb-3">
                <img class="rounded" src="{{ asset('') }}admin/apple-touch-icon.png" alt="" height="72">
                </div>
                <h1 class="h3"> Sign In </h1>
            </div>
            <p class="text-left mb-4"> Don't have a account? <a href="{{ route('register') }}">Create One</a>
            </p><!-- .form-group -->
            <div class="form-group mb-4">
                <label class="d-block text-left" for="inputUser">Email</label> <input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div><!-- /.form-group -->
            <!-- .form-group -->
            <div class="form-group mb-4">
                <label class="d-block text-left" for="inputPassword">Password</label> <input id="password" class="form-control form-control-lg" type="password"
                name="password"
                required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div><!-- /.form-group -->
            <!-- .form-group -->
            <div class="form-group mb-4">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
            </div><!-- /.form-group -->
            <!-- .form-group -->
            <div class="form-group text-center">
                <div class="custom-control custom-control-inline custom-checkbox">
                <input id="remember_me" type="checkbox" name="remember" class="custom-control-input"> <label class="custom-control-label" for="remember-me">Keep me sign in</label>
                </div>
            </div><!-- /.form-group -->
            <!-- recovery links -->
            <p class="py-2">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="link">Forgot Password?</a>
                @endif
            </p><!-- /recovery links -->
            <!-- copyright -->
            <p class="mb-0 px-3 text-muted text-center"> © 2023 All Rights Reserved. InterCipta Group <a href="#">Privacy</a> and <a href="#">Terms</a>
            </p>
        </form><!-- /.auth-form -->
        <!-- .auth-announcement -->
        <div id="announcement" class="auth-announcement" style="background-image: url(admin/images/illustration/img-1.png);">
        <div class="announcement-body">
            <h2 class="announcement-title"> Welcome To ERP InterCipta Corporation </h2>
        </div>
        </div><!-- /.auth-announcement -->
    </main>
@endsection
