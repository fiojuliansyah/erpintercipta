<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Karir | Intercipta Corporation</title>
<link rel="stylesheet" type="text/css" href="{{ asset('') }}mobile/styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="{{ asset('') }}mobile/styles/style.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('') }}mobile/fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="{{ asset('') }}_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('') }}mobile/app/icons/icon-192x192.png">
@stack('head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
@livewireStyles
</head>
    
<body class="theme-light" data-highlight="yellow2">
    
{{-- <div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div> --}}
    
<div id="page">
    <div class="page-content">
        
        <div class="page-title page-title-small">
            <h2><a href="#" data-back-button></a>Lowongan</h2>
        </div>
        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
        </div>
    
        <br>
        @livewire('jobsportaltable')
    
    </div>
</div>    


<script type="text/javascript" src="{{ asset('') }}mobile/scripts/jquery.js"></script>
<script type="text/javascript" src="{{ asset('') }}mobile/scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('') }}mobile/scripts/custom.js"></script>
@stack('js')
@livewireScripts
</body>
