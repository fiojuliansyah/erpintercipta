<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uselooper.com/component-steps.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 May 2023 06:40:10 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title> Cipta Karir | PT Intercipta Corporation </title>
    {{-- <meta property="og:title" content="Cipta Karir | PT Intercipta Corporation">
    <meta name="author" content="Beni Arisandi">
    <meta property="og:locale" content="en_US">
    <meta name="description" content="Peluang kerja melalui Cipta Karir by Intercipta">
    <meta property="og:description" content="Peluang kerja melalui Cipta Karir by Intercipta">
    <link rel="canonical" href="/">
    <meta property="og:url" content="/">
    <meta property="og:site_name" content="Cipta Karir | PT Intercipta Corporation">
    <script type="application/ld+json">
      {
        "name": "Cipta Karir | PT Intercipta Corporation",
        "description": "Peluang kerja melalui Cipta Karir by Intercipta",
        "author":
        {
          "@type": "Person",
          "name": "Fio Juliansyah"
        },
        "@type": "WebSite",
        "url": "",
        "headline": "Peluang kerja melalui Cipta Karir by Intercipta",
        "@context": "http://karir.interciptacorp.com"
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
    <!-- END PLUGINS STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="{{ asset('') }}admin/stylesheets/theme.min.css" data-skin="default">
    <link rel="stylesheet" href="{{ asset('') }}admin/stylesheets/theme-dark.min.css" data-skin="dark">
    <link rel="stylesheet" href="{{ asset('') }}admin/stylesheets/custom.css">
    <script>
        var skin = localStorage.getItem('skin') || 'default';
        var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
        // Disable unused skin immediately
        disabledSkinStylesheet.setAttribute('rel', '');
        disabledSkinStylesheet.setAttribute('disabled', true);
        // add loading class to html immediately
        document.querySelector('html').classList.add('loading');
    </script><!-- END THEME STYLES -->
</head>

<body>
    <main class="app app-site">
        <!-- .wrapper -->
        <nav class="navbar navbar-expand-lg navbar-light py-4" data-aos="fade-in">
            <!-- .container -->
            <div class="container">
                <!-- .hamburger -->
                <button class="hamburger hamburger-squeeze hamburger-light d-flex d-lg-none" type="button"
                    data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"
                    aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger-box"><span
                            class="hamburger-inner"></span></span></button> <!-- /.hamburger -->
                <!-- .navbar-brand -->
                <a class="navbar-btn btn btn-subtle-primary ml-auto order-lg-2" href="{{ route('jobportal') }}"
                    target="_blank">Cari Lowongan!</a> <!-- .navbar-collapse -->
                <div class="navbar-collapse collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item mr-lg-3">
                            <a class="nav-link py-2" href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item mr-lg-3 active">
                            <a class="nav-link py-2" href="{{ route('karir') }}">Karir</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>
        <div class="wrapper">
            <!-- .page -->
            <div class="page has-sidebar has-sidebar-expand-xl">
                <!-- .page-inner -->
                <div class="page-inner">
                    <!-- .page-section -->
                    <div class="container">
                        <!-- .card -->
                        <div class="card bg-success text-white position-relative overflow-hidden shadow rounded-lg p-4 mb-0"
                            data-aos="fade-up">
                            <!-- .sticker -->
                            <div class="sticker">
                                <div class="sticker-item sticker-middle-left">
                                    <img class="flip-y" src="{{ asset('') }}admin/images/decoration/bubble4.svg"
                                        alt="">
                                </div>
                            </div><!-- /.sticker -->
                            <!-- .card-body -->
                            <div
                                class="card-body d-md-flex justify-content-between align-items-center text-center position-relative">
                                <h3 class="font-weight-normal mb-3 mb-md-0 mr-md-3"> Ada pertanyaan tentang lowongan
                                    pekerjaan? </h3><a class="btn btn-lg btn-primary shadow" href="#">Hubungi Kami
                                    <i class="fa fa-angle-right ml-2"></i></a>
                            </div><!-- /.card-body -->
                        </div><!-- /.card -->
                    </div>
                    @livewire('jobsportaltable')
                    <!-- /.page-section -->
                </div><!-- /.page-inner -->
                <!-- .page-sidebar -->
                <div class="page-sidebar">
                    <!-- .sidebar-header -->
                    <header class="sidebar-header d-sm-none">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    <a href="#" onclick="Looper.toggleSidebar()"><i
                                            class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                                </li>
                            </ol>
                        </nav>
                    </header><!-- /.sidebar-header -->
                    <!-- .sidebar-section-fill -->
                    <div class="sidebar-section-fill">
                        <!-- .card -->
                        <div class="card card-reflow">
                            <!-- .card-body -->
                            <div class="card-body">
                                <button type="button" class="close mt-n1 d-none d-xl-none d-sm-block"
                                    onclick="Looper.toggleSidebar()" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                                <h4 class="card-title"> Summary </h4><!-- grid row -->
                                <div class="row">
                                    <!-- grid column -->
                                    <div class="col-6">
                                        <!-- .metric -->
                                        <div class="metric">
                                            <h6 class="metric-value"> {{ $allcareer }} </h6>
                                            <p class="metric-label mt-1"> All Job</p>
                                        </div><!-- /.metric -->
                                    </div><!-- /grid column -->
                                    <!-- grid column -->
                                    <div class="col-6">
                                        <!-- .metric -->
                                        <div class="metric">
                                            <h6 class="metric-value"> {{ $alluser }} </h6>
                                            <p class="metric-label mt-1"> Aplicant </p>
                                        </div><!-- /.metric -->
                                    </div><!-- /grid column -->
                                    <!-- grid column -->
                                    <div class="col-6">
                                        <!-- .metric -->
                                        <div class="metric">
                                            <h6 class="metric-value"> 2,630 </h6>
                                            <p class="metric-label mt-1"> Leads </p>
                                        </div><!-- /.metric -->
                                    </div><!-- /grid column -->
                                    <!-- grid column -->
                                    <div class="col-6">
                                        <!-- .metric -->
                                        <div class="metric">
                                            <h6 class="metric-value"> > 7,000 </h6>
                                            <p class="metric-label mt-1"> Clients </p>
                                        </div><!-- /.metric -->
                                    </div><!-- /grid column -->
                                </div><!-- /grid row -->
                            </div><!-- /.card-body -->
                            <!-- .card-body -->
                            <div class="card-body border-top pb-1">
                                <h4 class="card-title"> InterCipta Corporation Jobs</h4><!-- .progress -->
                                <div class="progress mb-2">
                                    @foreach ($companies as $item)
                                        <div class="progress-bar @if ($item->id == '1') bg-teal
                        @elseif($item->id == '2')
                        bg-indigo
                        @elseif($item->id == '3')
                        bg-pink
                        @elseif($item->id == '3')
                        bg-purple @endif"
                                            role="progressbar" aria-valuenow="{{ $item->careers->count() }}"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width: {{ $item->careers->count() }}%">
                                        </div>
                                    @endforeach
                                </div><!-- /.progress -->
                            </div><!-- /.card -->
                            <!-- .list-group -->
                            <div class="list-group list-group-bordered list-group-reflow">
                                <!-- .list-group-item -->
                                @foreach ($companies as $company)
                                    <div class="list-group-item justify-content-between align-items-center">
                                        <span><i
                                                class="fas fa-square 
                        @if ($company->id == '1') text-teal
                        @elseif($company->id == '2')
                        text-indigo
                        @elseif($company->id == '3')
                        text-pink
                        @elseif($company->id == '3')
                        text-purple @endif
                        mr-2"></i>
                                            {{ $company->company }}</span> <span
                                            class="text-muted">{{ $company->careers->count() }}</span>
                                    </div><!-- /.list-group-item -->
                                @endforeach
                            </div><!-- /.list-group -->
                            <!-- .card-body -->
                            {{-- <div class="card-body border-top">
                    <div class="d-flex justify-content-between my-3">
                      <h4 class="card-title"> Recent activity </h4><a href="#">View all</a>
                    </div><!-- .timeline -->
                    <ul class="timeline timeline-fluid">
                      <!-- .timeline-item -->
                      <li class="timeline-item">
                        <!-- .timeline-figure -->
                        <div class="timeline-figure">
                          <span class="tile tile-circle tile-sm"><i class="far fa-calendar-alt fa-lg"></i></span>
                        </div><!-- /.timeline-figure -->
                        <!-- .timeline-body -->
                        <div class="timeline-body">
                          <!-- .media -->
                          <div class="media">
                            <!-- .media-body -->
                            <div class="media-body">
                              <p class="mb-0">
                                <a href="#">Jeffrey Wells</a> created a <a href="#">schedule</a>
                              </p><span class="timeline-date">About a minute ago</span>
                            </div><!-- /.media-body -->
                          </div><!-- /.media -->
                        </div><!-- /.timeline-body -->
                      </li><!-- /.timeline-item -->
                      <!-- .timeline-item -->
                      <li class="timeline-item">
                        <!-- .timeline-figure -->
                        <div class="timeline-figure">
                          <span class="tile tile-circle tile-sm"><i class="oi oi-chat fa-lg"></i></span>
                        </div><!-- /.timeline-figure -->
                        <!-- .timeline-body -->
                        <div class="timeline-body">
                          <!-- .media -->
                          <div class="media">
                            <!-- .media-body -->
                            <div class="media-body">
                              <p class="mb-0">
                                <a href="#">Anna Vargas</a> logged a <a href="#">chat</a> with team </p><span class="timeline-date">3 hours ago</span>
                            </div><!-- /.media-body -->
                          </div><!-- /.media -->
                        </div><!-- /.timeline-body -->
                      </li><!-- /.timeline-item -->
                      <!-- .timeline-item -->
                      <li class="timeline-item">
                        <!-- .timeline-figure -->
                        <div class="timeline-figure">
                          <span class="tile tile-circle tile-sm"><i class="fa fa-tasks fa-lg"></i></span>
                        </div><!-- /.timeline-figure -->
                        <!-- .timeline-body -->
                        <div class="timeline-body">
                          <!-- .media -->
                          <div class="media">
                            <!-- .media-body -->
                            <div class="media-body">
                              <p class="mb-0">
                                <a href="#">Arthur Carroll</a> created a <a href="#">task</a>
                              </p><span class="timeline-date">8:14pm</span>
                            </div><!-- /.media-body -->
                          </div><!-- /.media -->
                        </div><!-- /.timeline-body -->
                      </li><!-- /.timeline-item -->
                      <!-- .timeline-item -->
                      <li class="timeline-item">
                        <!-- .timeline-figure -->
                        <div class="timeline-figure">
                          <span class="tile tile-circle tile-sm"><i class="fas fa-user-plus fa-lg"></i></span>
                        </div><!-- /.timeline-figure -->
                        <!-- .timeline-body -->
                        <div class="timeline-body">
                          <!-- .media -->
                          <div class="media">
                            <!-- .media-body -->
                            <div class="media-body">
                              <p class="mb-0">
                                <a href="#">Sara Carr</a> invited to <a href="#">Stilearn Admin</a> project </p><span class="timeline-date">7:21pm</span>
                            </div><!-- /.media-body -->
                          </div><!-- /.media -->
                        </div><!-- /.timeline-body -->
                      </li><!-- /.timeline-item -->
                      <!-- .timeline-item -->
                      <li class="timeline-item">
                        <!-- .timeline-figure -->
                        <div class="timeline-figure">
                          <span class="tile tile-circle tile-sm"><i class="fa fa-folder fa-lg"></i></span>
                        </div><!-- /.timeline-figure -->
                        <!-- .timeline-body -->
                        <div class="timeline-body">
                          <!-- .media -->
                          <div class="media">
                            <!-- .media-body -->
                            <div class="media-body">
                              <p class="mb-0">
                                <a href="#">Angela Peterson</a> added <a href="#">Looper Admin</a> to collection </p><span class="timeline-date">5:21pm</span>
                            </div><!-- /.media-body -->
                          </div><!-- /.media -->
                        </div><!-- /.timeline-body -->
                      </li><!-- /.timeline-item -->
                      <!-- .timeline-item -->
                      <li class="timeline-item">
                        <!-- .timeline-figure -->
                        <div class="timeline-figure">
                          <span class="tile tile-circle tile-sm"><i class="oi oi-person fa-lg"></i></span>
                        </div><!-- /.timeline-figure -->
                        <!-- .timeline-body -->
                        <div class="timeline-body">
                          <!-- .media -->
                          <div class="media">
                            <!-- .media-body -->
                            <div class="media-body">
                              <div class="avatar-group mb-2">
                                <a href="#" class="user-avatar user-avatar-sm"><img src="assets/images/avatars/uifaces4.jpg" alt=""></a> <a href="#" class="user-avatar user-avatar-sm"><img src="assets/images/avatars/uifaces5.jpg" alt=""></a> <a href="#" class="user-avatar user-avatar-sm"><img src="assets/images/avatars/uifaces6.jpg" alt=""></a> <a href="#" class="user-avatar user-avatar-sm"><img src="assets/images/avatars/uifaces7.jpg" alt=""></a>
                              </div>
                              <p class="mb-0">
                                <a href="#">Willie Dixon</a> and 3 others followed you </p><span class="timeline-date">4:32pm</span>
                            </div><!-- /.media-body -->
                          </div><!-- /.media -->
                        </div><!-- /.timeline-body -->
                      </li><!-- /.timeline-item -->
                    </ul><!-- /.timeline -->
                  </div><!-- /.card-body --> --}}
                        </div><!-- /.card -->
                    </div><!-- /.sidebar-section-fill -->
                </div><!-- /.page-sidebar -->
            </div><!-- /.page -->
        </div><!-- /.wrapper -->
    </main>
    <!-- BEGIN BASE JS -->
    <script src="{{ asset('') }}admin/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('') }}admin/vendor/popper.js/umd/popper.min.js"></script>
    <script src="{{ asset('') }}admin/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- END BASE JS -->
    <!-- BEGIN PLUGINS JS -->
    <script src="{{ asset('') }}admin/vendor/pace-progress/pace.min.js"></script>
    <script src="{{ asset('') }}admin/vendor/stacked-menu/js/stacked-menu.min.js"></script>
    <script src="{{ asset('') }}admin/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('') }}admin/vendor/parsleyjs/parsley.min.js"></script>
    <script src="{{ asset('') }}admin/vendor/vanilla-text-mask/vanillaTextMask.js"></script>
    <script src="{{ asset('') }}admin/vendor/text-mask-addons/textMaskAddons.js"></script>
    <script src="{{ asset('') }}admin/vendor/bs-stepper/js/bs-stepper.min.js"></script> <!-- END PLUGINS JS -->
    <!-- BEGIN THEME JS -->
    <script src="{{ asset('') }}admin/javascript/theme.min.js"></script> <!-- END THEME JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{ asset('') }}admin/javascript/pages/steps-demo.js"></script> <!-- END PAGE LEVEL JS -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116692175-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-116692175-1');
    </script>
</body>

<!-- Mirrored from uselooper.com/component-steps.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 May 2023 06:40:11 GMT -->

</html>

{{-- @push('js')
<script src="{{ asset('') }}admin/vendor/parsleyjs/parsley.min.js"></script>
<script src="{{ asset('') }}admin/vendor/vanilla-text-mask/vanillaTextMask.js"></script>
<script src="{{ asset('') }}admin/vendor/text-mask-addons/textMaskAddons.js"></script>
<script src="{{ asset('') }}admin/vendor/bs-stepper/js/bs-stepper.min.js"></script>
<script src="{{ asset('') }}admin/javascript/pages/steps-demo.js"></script>
@endpush --}}
