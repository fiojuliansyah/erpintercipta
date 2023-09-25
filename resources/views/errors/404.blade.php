<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
        <!-- Begin SEO tag -->
        <title> @yield('title') </title>
        {{-- <meta property="og:title" content="@yield('title')">
        <meta name="author" content="Beni Arisandi">
        <meta property="og:locale" content="en_US">
        <meta name="description" content="Responsive admin theme build on top of Bootstrap 4">
        <meta property="og:description" content="Responsive admin theme build on top of Bootstrap 4">
        <link rel="canonical" href="index-2.html">
        <meta property="og:url" content="index-2.html">
        <meta property="og:site_name" content="Looper - Bootstrap 4 Admin Theme">
        <script type="application/ld+json">
          {
            "name": "@yield('title')",
            "description": "Responsive admin theme build on top of Bootstrap 4",
            "author":
            {
              "@type": "Person",
              "name": "Beni Arisandi"
            },
            "@type": "WebSite",
            "url": "",
            "headline": "Dashboard",
            "@context": "http://schema.org"
          }
        </script><!-- End SEO tag --> --}}
        <!-- FAVICONS -->
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('') }}admin/apple-touch-icon.png">
        <link rel="shortcut icon" href="{{ asset('') }}admin/favicon.ico">
        <meta name="theme-color" content="#3063A0"><!-- End FAVICONS -->
        <!-- GOOGLE FONT -->
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End GOOGLE FONT -->
        <!-- BEGIN PLUGINS STYLES -->
        <link rel="stylesheet" href="{{ asset('') }}admin/vendor/open-iconic/font/css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('') }}admin/vendor/%40fortawesome/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('') }}admin/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="{{ asset('') }}admin/vendor/flatpickr/flatpickr.min.css">
        @yield('plugin')
      <!-- END PLUGINS STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link rel="stylesheet" href="{{ asset('') }}admin/stylesheets/theme.min.css" data-skin="default">
        <link rel="stylesheet" href="{{ asset('') }}admin/stylesheets/theme-dark.min.css" data-skin="dark">
        <link rel="stylesheet" href="{{ asset('') }}admin/stylesheets/custom.css">
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    
        @yield('css')
        <script>
          var skin = localStorage.getItem('skin') || 'default';
          var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
          // Disable unused skin immediately
          disabledSkinStylesheet.setAttribute('rel', '');
          disabledSkinStylesheet.setAttribute('disabled', true);
          // add loading class to html immediately
          document.querySelector('html').classList.add('loading');
        </script><!-- END THEME STYLES -->
        @livewireStyles
    </head>
    <body>
        <!--[if lt IE 10]>
        <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
        <![endif]-->
        <!-- .empty-state -->
        <main class="empty-state empty-state-fullpage bg-black">
        <!-- .empty-state-container -->
        <div class="empty-state-container">
            <div class="card">
            <div class="card-header bg-light text-left">
                <i class="fa fa-fw fa-circle text-red"></i> <i class="fa fa-fw fa-circle text-yellow"></i> <i class="fa fa-fw fa-circle text-teal"></i>
            </div>
            <div class="card-body">
                <div class="state-figure">
                <img class="img-fluid" src="{{ asset('') }}admin/images/illustration/img-2.svg" alt="" style="max-width: 320px">
                </div>
                <h3 class="state-header"> Page not found! </h3>
                <p class="state-description lead"> Sorry, we've misplaced that URL or it's pointing to something that doesn't exist. </p>
                <div class="state-action">
                    <a href="{{ url('dashboard') }}" class="btn btn-lg btn-light"><i class="fa fa-angle-right"></i> Go Home</a>
                </div>
            </div>
            </div>
        </div><!-- /.empty-state-container -->
        </main><!-- /.empty-state -->
        <!-- BEGIN BASE JS -->
        <script src="{{ asset('') }}admin/vendor/jquery/jquery.min.js"></script>
        <script src="{{ asset('') }}admin/vendor/popper.js/umd/popper.min.js"></script>
        <script src="{{ asset('') }}admin/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- END BASE JS -->
        <!-- BEGIN THEME JS -->
        <script src="{{ asset('') }}admin/javascript/theme.min.js"></script> <!-- END THEME JS -->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116692175-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];

        function gtag()
        {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-116692175-1');
        </script>
    </body>
</html>