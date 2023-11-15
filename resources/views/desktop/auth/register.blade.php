@extends('desktop.layouts.guest')

@section('title', 'Register | InterCipta ERP Management')

@section('content')
<main class="auth">
    <header id="auth-header" class="auth-header" style="background-image: url(admin/images/illustration/img-1.png);">
      <h1>
        <img src="{{asset('/admin/images/cipta-karir-white.png')}}" width="300" alt="">
        <span class="sr-only">Daftar Akun</span>
      </h1>
      <p> Sudah punya akun? Silahkan <a href="{{ route('login') }}">Masuk</a>
      </p>
    </header><!-- form -->
    <form class="auth-form" method="POST" action="{{ route('register') }}">
        @csrf
        <!-- .form-group -->
        <div class="form-group">
          <div class="form-label-group">
              <input id="nik_number" class="form-control" type="text" name="nik_number" :value="old('nik_number')" required autofocus autocomplete="nik_number" >
              <label for="name">NIK (sesuai KTP) </label>
              <x-input-error :messages="$errors->get('nik_number')" class="mt-2" />
          </div>
        </div>
      <div class="form-group">
            <div class="form-label-group">
                <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" >
                <label for="name">Nama Lengkap (sesuai KTP/Ijazah) </label>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
      </div><!-- /.form-group -->
      <!-- .form-group -->
      <div class="form-group">
            <div class="form-label-group">
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="email"> <label for="email">Email</label>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />  
            </div>
        </div><!-- /.form-group -->
      <!-- .form-group -->
      <div class="form-group">
            <div class="form-label-group">
                <input id="password" class="form-control"
                type="password"
                name="password"
                required autocomplete="new-password"> <label for="password">Password</label>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
      </div><!-- /.form-group -->
      <div class="form-group">
            <div class="form-label-group">
                <input id="password_confirmation" class="form-control"
                type="password"
                name="password_confirmation" required autocomplete="new-password"> <label for="password_confirmation">Confirm Password</label>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
      </div><!-- /.form-group -->
      <!-- /.form-group -->
      <div class="form-group">
        <div class="input-group input-group-alt">
          <div class="input-group-prepend">
            <span class="input-group-text">+62</span>
          </div><input type="text" name="phone" class="form-control" id="pi3" placeholder="812xxxxxxxx">
        </div><!-- /.input-group -->
        <p class="text-center text-muted mb-0" style="font-size: 10px">Perusahaan memerlukan informasi ini untuk menghubungimu jika cocok.</p>
      </div>
      <!-- .form-group -->
      <div class="form-group">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Daftar</button>
      </div><!-- /.form-group -->
      <!-- recovery links -->
      <p class="text-center text-muted mb-0"> Dengan mendaftar, saya setuju dengan <a href="#">Ketentuan Layanan</a></p><!-- /recovery links -->
    </form><!-- /.auth-form -->
    <!-- copyright -->
    <footer class="auth-footer">  © 2023 All Rights Reserved. InterCipta Group </footer>
  </main>
@endsection