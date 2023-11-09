<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>@yield('title')</title>
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
    @include('mobiles.layouts.partials.header')
    
    @include('mobiles.layouts.partials.footer')
    
    
    @yield('content')

    <!-- end of page content-->
    
    
    <div id="menu-share" 
         class="menu menu-box-bottom menu-box-detached rounded-m" 
         data-menu-load="menu-share.html"
         data-menu-height="420" 
         data-menu-effect="menu-over">
    </div>    
    
    <div id="menu-highlights" 
         class="menu menu-box-bottom menu-box-detached rounded-m" 
         data-menu-height="510" 
         data-menu-effect="menu-over">
         @include('mobiles.layouts.partials.color')         
    </div>
    
    <div id="menu-main"
         class="menu menu-box-right menu-box-detached rounded-m"
         data-menu-width="260"
         data-menu-active="nav-welcome"
         data-menu-effect="menu-over">
         @include('mobiles.layouts.partials.main')  
    </div>
    
    <!-- Be sure this is on your main visiting page, for example, the index.html page-->
    <!-- Install Prompt for Android -->
    @include('mobiles.layouts.partials.pwa-android')  

    <!-- Install instructions for iOS -->
    @include('mobiles.layouts.partials.pwa-ios')

    
</div>    


<script type="text/javascript" src="{{ asset('') }}mobile/scripts/jquery.js"></script>
<script type="text/javascript" src="{{ asset('') }}mobile/scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('') }}mobile/scripts/custom.js"></script>
</body>
