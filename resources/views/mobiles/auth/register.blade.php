<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Daftar | Intercipta Mobile</title>
<link rel="stylesheet" type="text/css" href="{{ asset('') }}mobile/styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="{{ asset('') }}mobile/styles/style.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('') }}mobile/fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('') }}mobile/app/icons/icon-192x192.png">
</head>
    
<body class="theme-light" data-highlight="yellow2">
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    
    <!-- header and footer bar go here-->
    <div class="page-content">
        
        <div class="page-title page-title-small">
            <h2><a href="#" data-back-button></a>Daftar Akun</h2>
        </div>
        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
        </div>
        
        <div class="card card-style">
            <div class="content mt-2 mb-0">
                <form class="auth-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-style has-icon input-style-1 input-required pb-1">
                        <i class="input-icon fa fa-user color-theme"></i>
                        <span>No NIK</span>
                        <em>(sesuai KTP)</em>
                        <input type="text" name="nik_number" placeholder="Nomor NIK"  :value="old('nik_number')" required autofocus autocomplete="nik_number" >
                        <x-input-error :messages="$errors->get('nik_number')" class="mt-2" />
                    </div>
                    <div class="input-style has-icon input-style-1 input-required pb-1">
                        <i class="input-icon fa fa-user color-theme"></i>
                        <span>Nama</span>
                        <em>(Sesuai KTP/Ijazah)</em>
                        <input type="name" name="name" placeholder="nama lengkap"  :value="old('name')" required autofocus autocomplete="name" >
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div> 
                    <div class="input-style has-icon input-style-1 input-required pb-1">
                        <i class="input-icon fa fa-user color-theme"></i>
                        <span>Email</span>
                        <em>(required)</em>
                        <input type="email" name="email" placeholder="email" :value="old('email')" required autocomplete="email" >
                        <x-input-error :messages="$errors->get('email')" class="mt-2" /> 
                    </div> 
                    <div class="input-style has-icon input-style-1 input-required pb-1">
                        <i class="input-icon fa fa-lock color-theme"></i>
                        <span>Password</span>
                        <em>(required)</em>
                        <input type="password" name="password" placeholder="Password" required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="input-style has-icon input-style-1 input-required pb-1">
                        <i class="input-icon fa fa-lock color-theme"></i>
                        <span>Confirm Password</span>
                        <em>(required)</em>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>  
                    <div class="input-style has-icon input-style-1 input-required pb-1">
                        <i class="input-icon fa fa-phone color-theme"></i>
                        <span>No Handphone</span>
                        <em>(Whatsapp Aktif)</em>
                        <input type="tlp" name="phone" placeholder="No Handphone">
                    </div> 
                    <p class="text-center text-muted mb-0" style="font-size: 10px">Perusahaan memerlukan informasi ini untuk menghubungimu jika cocok.</p>
                    <button type="submit" class="btn btn-m mt-2 mb-4 btn-full bg-green1-dark rounded-sm text-uppercase font-900">Daftar</button>
                </form>
                {{-- <div class="divider"></div>

                <a href="#" class="btn btn-icon btn-m btn-full shadow-l bg-facebook text-uppercase font-900 text-left"><i class="fab fa-facebook-f text-center"></i>Login with Facebook</a>
                <a href="#" class="btn btn-icon btn-m mt-2 btn-full shadow-l bg-twitter text-uppercase font-900 text-left"><i class="fab fa-twitter text-center"></i>Login with Twitter</a>

                <div class="divider mt-4 mb-3"></div> --}}

                <div class="d-flex">
                    <div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-left"><a href="{{ route('login') }}" class="color-theme">Sudah Punya Akun ?</a></div>
                    <div class="w-50 font-11 pb-2 color-highlight opacity-60 pb-3 text-right"><a href="{{ route('login') }}" class="color-highlight">Masuk</a></div>
                </div>
            </div>
            
        </div>
        <div style="padding: 100px; text-align:center; padding-top: 350px">
            <h3>INTERMO</h3>
            <h6>Intercipta Corporation</h6>
        </div>
</div>    


<script type="text/javascript" src="{{ asset('') }}mobile/scripts/jquery.js"></script>
<script type="text/javascript" src="{{ asset('') }}mobile/scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('') }}mobile/scripts/custom.js"></script>
</body>
