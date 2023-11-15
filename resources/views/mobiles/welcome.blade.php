<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Welcome InterMo</title>
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
    
    <div class="page-content pb-0">
        
        <div class="card preload-img" data-src="{{ asset('') }}mobile/images/pictures/9.jpg" data-card-height="cover">
        
            <div class="card-center text-center">
                <h1 class="fa-4x color-theme font-900">INTERMO</h1>
                <h4 class="font-300 color-highlight">Intercipta Mobile Apps</h4>
                
                <p class="boxed-text-xl pt-4">
                    Welcome to InterMo. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate repellat mollitia doloremque quaerat iusto placeat fugit enim corporis dolorum hic dignissimos unde nisi animi ad, aspernatur dicta sequi, quis delectus..
                </p>
            </div>
        
            <div class="card-bottom mb-5">
                <a href="{{ route('login') }}" class="btn btn-center-m btn-m bg-highlight rounded-sm font-900 text-uppercase scale-box">Mulai</a>
            </div>
            
            <div class="card-overlay bg-theme opacity-95"></div>
        </div>
        
    </div>    
    <!-- end of page content-->


    
</div>    


<script type="text/javascript" src="{{ asset('') }}mobile/scripts/jquery.js"></script>
<script type="text/javascript" src="{{ asset('') }}mobile/scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('') }}mobile/scripts/custom.js"></script>
</body>
