<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('') }}admin/apple-touch-icon.png">
    <link rel="shortcut icon" href="{{ asset('') }}admin/favicon.ico">
    <meta name="theme-color" content="#3063A0"><!-- End FAVICONS -->
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End GOOGLE FONT -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="{{ asset('') }}admin/vendor/open-iconic/font/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('') }}admin/vendor/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet"
        href="{{ asset('') }}admin/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('') }}admin/vendor/flatpickr/flatpickr.min.css">
    @yield('plugin')
    <!-- END PLUGINS STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="{{ asset('') }}admin/stylesheets/theme.min.css" data-skin="default">
    <link rel="stylesheet" href="{{ asset('') }}admin/stylesheets/theme-dark.min.css" data-skin="dark">
    <link rel="stylesheet" href="{{ asset('') }}admin/stylesheets/custom.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
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
    <!-- .app -->
    <div class="app">
        <main class="app-main">
            <!-- .wrapper -->
            <div class="wrapper">
            <!-- .page -->
            <div class="page has-sidebar has-sidebar-expand-xl">
                <!-- .page-inner -->
                <div class="page-inner">
                <!-- .page-section -->
                <div class="card">
                    <!-- .card-body -->
                    <div class="card-body" style="background-color: white; color: black">
                        <span id="addendum">
                        {!! $pkwt->addendum['addendum'] !!}
                        </span>
                        <br>
                        <div class="row">
                            <div class="col-md-6 mb-4 text-center">
                                <p>PIHAK PERTAMA</p>
                                <br>
                                @if ($pkwt->user?->signature == null) 
                                <br>   
                                @else                         
                                <img src="{{ Storage::url($pkwt->signature_hrd) }}" width="300" alt="">
                                @endif
                                <br>
                                <p>( <u>{{ $pkwt->addendum['responsible'] }}</u> )</p>
                                <p>Human Resource Development</p>
                            </div>
                            <div class="col-md-6 mb-4 text-center">
                                <p>PIHAK KEDUA</p>
                                <br>
                                @if ($pkwt->user?->signature == null) 
                                <br>   
                                @else                         
                                <img src="{{ Storage::url($pkwt->user?->signature['signatureDataUrl']) }}" width="300" alt="">
                                @endif
                                <br>
                                {{-- <p>( <u>{{ $pkwt->user['name'] }}</u> )</p> --}}
                                <p>Karyawan</p>
                            </div>
                            <br>
                        </div>
                    </div><!-- /.card-body -->
                </div>
                <div class="card">
                    <div class="card-body" style="background-color: white; color: black">
                        {!! ($pkwt->addendum['attachment']) !!}
                        <br>
                        <div class="row">
                            <div class="col-md-6 mb-4 text-center">
                                <p>PIHAK PERTAMA</p>
                                <strong>{{ $pkwt->addendum?->company['company'] }}</strong>
                                <br>
                                @if ($pkwt->user?->signature == null) 
                                <br>   
                                @else                         
                                <img src="{{ Storage::url($pkwt->signature_hrd) }}" width="300" alt="">
                                @endif
                                <br>
                                <p>( <u>{{ $pkwt->addendum['responsible'] }}</u> )</p>
                                <p>Human Resource Development</p>
                            </div>
                            <div class="col-md-6 mb-4 text-center">
                            <p>PIHAK KEDUA</p>
                            <br>
                            @if ($pkwt->user?->signature == null) 
                                <br>   
                                @else                         
                                <img src="{{ Storage::url($pkwt->user?->signature['signatureDataUrl']) }}" width="300" alt="">
                            @endif
                            <br>
                            {{-- <p>( <u>{{ $pkwt->user['name'] }}</u> )</p> --}}
                            <p>Karyawan</p>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div><!-- /.page -->
            </div><!-- /.wrapper -->
        </main>
    </div><!-- /.app -->
    <!-- BEGIN BASE JS -->
    <script src="{{ asset('') }}admin/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('') }}admin/vendor/popper.js/umd/popper.min.js"></script>
    <script src="{{ asset('') }}admin/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- END BASE JS -->
    <!-- BEGIN PLUGINS JS -->
    <script src="{{ asset('') }}admin/vendor/pace-progress/pace.min.js"></script>
    <script src="{{ asset('') }}admin/vendor/stacked-menu/js/stacked-menu.min.js"></script>
    <script src="{{ asset('') }}admin/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('') }}admin/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="{{ asset('') }}admin/vendor/easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="{{ asset('') }}admin/vendor/chart.js/Chart.min.js"></script>
    <!-- END PLUGINS JS -->

    <!-- BEGIN THEME JS -->
    <script src="{{ asset('') }}admin/javascript/theme.min.js"></script> <!-- END THEME JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script>
        // Ambil elemen yang mengandung teks yang akan diganti
        var element = document.getElementById('addendum');
        
        // Ganti teks dalam elemen tersebut
        if (element) {
            element.innerHTML = element.innerHTML
        }
    </script>
      
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var canvas = document.getElementById('signatureCanvas');
        var signaturePad = new SignaturePad(canvas);
        var saveButton = document.getElementById('saveButton');
    
        saveButton.addEventListener('click', function() {
            if (signaturePad.isEmpty()) {
                alert('Tanda tangan kosong, silahkan tanda tangan');
            } else {
                var signatureDataUrl = signaturePad.toDataURL();
                saveSignature(signatureDataUrl);
            }
        });
    
        function saveSignature(signatureDataUrl) {
            fetch('{{ url('esigns') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    signatureDataUrl: signatureDataUrl
                })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                signaturePad.clear();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });
    </script>
    <script src="{{ asset('') }}admin/javascript/pages/dashboard-demo.js"></script>
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

</html>