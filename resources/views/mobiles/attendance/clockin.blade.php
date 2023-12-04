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
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/face-landmarks-detection"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/face-landmarks-detection"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/face-expression-recognition"></script>
    <script src="https://cdn.jsdelivr.net/npm/face-api.js"></script>

    <script type="text/javascript">
        // Seleksi elemen video
        var video = document.querySelector("#video-webcam");

        // Mintalah izin pengguna
        navigator.getUserMedia = (navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia);

        // Jika pengguna memberikan izin
        if (navigator.getUserMedia) {
            navigator.getUserMedia({ video: true }, handleVideo, videoError);
        }

        // Fungsi ini akan dieksekusi jika izin telah diberikan
        function handleVideo(stream) {
            video.srcObject = stream;
            // Gunakan faceapi.js untuk mendeteksi wajah
            // Pastikan gambar pengguna tersedia dalam format yang dapat digunakan oleh faceapi.js
            // Ganti 'BASE64_USER_IMAGE' dengan data gambar profil pengguna dalam format yang sesuai
            var userImage = '{{ $imageBase64 }}'; // Ganti dengan data gambar profil pengguna
            var image = new Image();
            image.src = userImage;
            image.onload = function () {
                Promise.all([
                    faceapi.nets.tinyFaceDetector.loadFromUri('https://cdn.jsdelivr.net/npm/face-api.js/models'),
                    faceapi.nets.faceLandmark68Net.loadFromUri('https://cdn.jsdelivr.net/npm/face-api.js/models'),
                    faceapi.nets.faceRecognitionNet.loadFromUri('https://cdn.jsdelivr.net/npm/face-api.js/models'),
                    faceapi.nets.faceExpressionNet.loadFromUri('https://cdn.jsdelivr.net/npm/face-api.js/models')
                ]).then(startRecognition);
            };

            function startRecognition() {
                video.addEventListener('play', async () => {
                    const canvas = faceapi.createCanvasFromMedia(video);
                    document.body.append(canvas);
                    const displaySize = { width: video.width, height: video.height };
                    faceapi.matchDimensions(canvas, displaySize);

                    setInterval(async () => {
                        const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceDescriptors().withFaceExpressions();
                        const resizedDetections = faceapi.resizeResults(detections, displaySize);
                        const faceMatcher = new faceapi.FaceMatcher(resizedDetections);

                        const results = resizedDetections.map(detection => faceMatcher.findBestMatch(detection.descriptor));
                        console.log(results);
                        // Lakukan sesuatu dengan hasil pengenalan wajah di sini
                        // Contoh: bandingkan dengan gambar profil pengguna atau lakukan tindakan lain
                    }, 1000);
                });
            }
        }

        // Fungsi ini akan dieksekusi jika pengguna menolak izin
        function videoError(e) {
            alert("Izinkan menggunakan webcam untuk demo!");
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