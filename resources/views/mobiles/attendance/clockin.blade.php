@extends('mobiles.layouts.master')

@section('title','Clock-In | Intercipta Mobile')

@section('content')
<div class="page-content">
        
    <div class="page-title page-title-small" style="margin-top: 50px">
        <h2><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a><span>clock In</span></h2>
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

    <div data-card-height="550" class="card card-style">
        <div class="card-body">
            <div style="display: flex; justify-content: overflow: hidden;">
                <video autoplay="true" id="video-webcam"  style="width: 100%; height: 150%; border-radius: 6px; transform: scaleX(-1);">
                    Browsermu tidak mendukung bro, upgrade donk!
                </video>
            </div>
        </div>
        <div class="card-overlay rounded-0"></div>
    </div>
    <div class="content">
    </div> 
    <form  id="input-attendance" action="{{ route('clock-in') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="imgData" name="image_in" />
    <input type="hidden" id="longitudeInput" name="long_in" />
    <input type="hidden" id="latitudeInput" name="lat_in" />   
    </form>   
    <a href="#" data-menu="menu-success-1" onclick="takeSnapshotLocationAndSubmit()" class="btn btn-xl btn-full bg-highlight rounded-3 text-uppercase font-900 mb-0">Clock In</a>
</div>
<div id="menu-success-1" class="menu menu-box-modal rounded-m" data-menu-height="320" data-menu-width="310">
    <h1 class="text-center mt-3 pt-1"><i class="fa fa-3x fa-check-circle color-green1-dark shadow-xl rounded-circle"></i></h1>
    <h1 class="text-center mt-3 font-700">Berhasil Clock In</h1>
    <p class="boxed-text-l">
        Kamu Berhasil Clock In hari ini!<br>Lakukan aktivitas sesuai pekerjaan yang anda kerjakan.
    </p>
    <a href="{{ url('dashboard') }}" class="btn btn-m btn-center-m button-s shadow-l rounded-s text-uppercase font-900 bg-green1-light">BAGUS</a>
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
        function takeSnapshotLocationAndSubmit() {
            var video = document.querySelector("#video-webcam");
            var canvas = document.createElement('canvas');
            var context = canvas.getContext('2d');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            var imageDataURL = canvas.toDataURL('image/png');

            // Mengisi nilai input dengan data URL gambar
            document.getElementById('imgData').value = imageDataURL;

            // Mendapatkan lokasi
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var longitude = position.coords.longitude;
                    var latitude = position.coords.latitude;

                    // Set nilai input dengan longitude dan latitude
                    document.getElementById('longitudeInput').value = longitude;
                    document.getElementById('latitudeInput').value = latitude;

                    // Submit form menggunakan AJAX
                    var formData = new FormData(document.getElementById('input-attendance'));
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '{{ route('clock-in') }}', true);
                    xhr.onload = function() {
                        // Tambahkan kode untuk menangani respon jika diperlukan
                        if (xhr.status === 200) {
                            // Berhasil
                            console.log(xhr.responseText);
                            // Redirect ke halaman dashboard setelah 2 detik
                            setTimeout(function() {
                                window.location.href = '{{ url('dashboard') }}';
                            }, 1000); // Redirect setelah 2 detik (2000 milidetik)
                        } else {
                            // Gagal
                            console.error(xhr.responseText);
                        }
                    };
                    xhr.send(formData);
                }, function(error) {
                    handleLocationError(error);
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function handleLocationError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }
    </script>
@endpush