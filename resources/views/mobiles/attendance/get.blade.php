@extends('mobiles.layouts.master')

@section('title','Attendance | Intercipta Mobile')

@section('content')
<div class="page-content">
        
    <div class="page-title page-title-small" style="margin-top: 50px">
        <h2><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a><span>Live Attendance</span></h2>
        <center class="pt-4">
            <h1 id="clock" style="color: white"></h1>
        </center>
        <center>
            <h6 id="date" style="color: white"></h6>
        </center>
    </div>

    <div class="card header-card" data-card-height="450">
        <div class="card-overlay bg-highlight opacity-90"></div>
        <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
    </div>

    <div class="card card-style" style="margin-top: 50px">
        <div class="content">
            <center>
            <h6>Schedule :</h6>
            </center>
            <center>
                <h2>08:30 - 17:30</h2>
            </center>
            <center>
                <h4>Shift : Pagi</h4>
            </center>
            <div class="row mb-0 pt-4">
                <div class="col-6">
                    @if ($clockInStatus)
                        <a href="#" class="btn btn-full btn-m rounded-s text-uppercase font-900 shadow-xl btn-secondary">
                            <i class="fas fa-camera">&nbsp;</i>Clock IN
                        </a>
                    @else
                        <a href="{{ route('index.clock-in') }}" class="btn btn-full btn-m rounded-s text-uppercase font-900 shadow-xl btn-primary">
                            <i class="fas fa-camera">&nbsp;</i>Clock IN
                        </a>
                    @endif
                </div>
                
                <div class="col-6">
                    @if ($clockOutStatus)
                        <a href="#" class="btn btn-full btn-m rounded-s text-uppercase font-900 shadow-xl btn-secondary">
                            <i class="fas fa-camera">&nbsp;</i>Clock OUT
                        </a>
                    @else
                        <a href="{{ route('index.clock-out') }}" class="btn btn-full btn-m rounded-s text-uppercase font-900 shadow-xl btn-primary">
                            <i class="fas fa-camera">&nbsp;</i>Clock OUT
                        </a>
                    @endif
                </div>
            </div>
            
        </div>  
    </div>
    <div class="content mb-2 pt-5">
        <h4 class="pb-4">Attendance Log</h4>
        <div class="clearfix"></div>
        <table class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
            <thead>
                <tr class="bg-blue1-dark">
                    <th scope="col" class="color-theme">Tanggal</th>
                    <th scope="col" class="color-theme">Clock In</th>
                    <th scope="col" class="color-theme">Clock Out</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                <tr>
                    <th scope="row">{{ $log->date }}</th>
                    <td><a href="#" data-menu="menu-maps-in" class="color-green1-dark">{{ $log->clock_in }}</a></td>
                    <td><a href="#" data-menu="menu-maps-out" class="color-red1-dark">{{ $log->clock_out }}</a></td>
                </tr>
                <div id="menu-maps-in" class="menu menu-box-modal rounded-m" 
                    data-menu-height="700" 
                    data-menu-width="330">
                    <h3 class="text-center font-700 mt-3 pt-3">Clock In Image</h3>
                    <img class="pb-3" style="width: 100%; border-radius: 6px; transform: scaleX(-1);" src="{{ Storage::url($log->image_in) }}" width="400px" alt="">
                    <h3 class="text-center font-700 mt-3">Clock In Map</h3>
                    <div class='responsive-iframe max-iframe pt-4'><iframe src='https://maps.google.com/?ie=UTF8&ll=47.595131,-122.330414&spn=0.006186,0.016512&t=h&z=17&output=embed' frameborder='0' allowfullscreen></iframe></div>
                    <br>
                    <br>
                    <a href="#" class="close-menu btn btn-center-m btn-sm shadow-l rounded-s text-uppercase font-900 bg-green1-dark">Close</a>
                </div>  
                <div id="menu-maps-out" class="menu menu-box-modal rounded-m" 
                    data-menu-height="700" 
                    data-menu-width="330">
                    <h3 class="text-center font-700 mt-3 pt-3">Clock Out Image</h3>
                    <img class="pb-3" style="width: 100%; border-radius: 6px; transform: scaleX(-1);" src="{{ Storage::url($log->image_out) }}" width="400px" alt="">
                    <h3 class="text-center font-700 mt-3">Clock Out Map</h3>
                    <div class='responsive-iframe max-iframe pt-4'><iframe src='https://maps.google.com/?ie=UTF8&ll=47.595131,-122.330414&spn=0.006186,0.016512&t=h&z=17&output=embed' frameborder='0' allowfullscreen></iframe></div>
                    <br>
                    <br>
                    <a href="#" class="close-menu btn btn-center-m btn-sm shadow-l rounded-s text-uppercase font-900 bg-green1-dark">Close</a>
                </div>  
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('js')
    <script type="text/javascript">
        // seleksi elemen video
        var video = document.querySelector("#video-webcam");

        // minta izin user
        navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

        // jika user memberikan izin
        if (navigator.getUserMedia) {
            // jalankan fungsi handleVideo, dan videoError jika izin ditolak
            navigator.getUserMedia({ video: true }, handleVideo, videoError);
        }

        // fungsi ini akan dieksekusi jika  izin telah diberikan
        function handleVideo(stream) {
            video.srcObject = stream;
        }

        // fungsi ini akan dieksekusi kalau user menolak izin
        function videoError(e) {
            // do something
            alert("Izinkan menggunakan webcam untuk demo!")
        }
    </script>
    <script>
        // Fungsi untuk mendapatkan waktu dari server
        function getServerTime() {
            return $.ajax({ async: false }).getResponseHeader('Date');
        }

        // Fungsi untuk menampilkan jam, hari, dan tanggal secara real-time
        function realtimeClock() {
            var rtClock = new Date();

            var hours = rtClock.getHours();
            var minutes = rtClock.getMinutes();
            var seconds = rtClock.getSeconds();
            var day = rtClock.toLocaleDateString('id-ID', { weekday: 'long' }); // Mendapatkan nama hari dalam format panjang
            var date = rtClock.toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' }); // Mendapatkan tanggal dalam format panjang

            hours = ("0" + hours).slice(-2);
            minutes = ("0" + minutes).slice(-2);
            seconds = ("0" + seconds).slice(-2);

            document.getElementById("clock").innerHTML =
                hours + " : " + minutes + " : " + seconds;
            document.getElementById("date").innerHTML =
                day + ", " + date;

            var jamnya = setTimeout(realtimeClock, 500);
        }

        // Panggil fungsi realtimeClock() saat halaman dimuat
        window.onload = function() {
            realtimeClock(); // Memanggil fungsi realtimeClock
        };
    </script>
    <script>
        function takeSnapshotAndSubmit() {
            var video = document.querySelector("#video-webcam");
            var canvas = document.createElement('canvas');
            var context = canvas.getContext('2d');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            var imageDataURL = canvas.toDataURL('image/png');

            // Mengisi nilai input dengan data URL gambar
            document.getElementById('imgData').value = imageDataURL;

            // Submit form
            document.getElementById('input-attendance').submit();
        }
    </script>
@endpush
