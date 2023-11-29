@extends('mobiles.layouts.master')

@section('title','Resume | Intercipta Mobile')
@push('css')
<style>
    /* CSS untuk memodifikasi tampilan video */
    #preview {
        transform: scaleX(-1); /* Secara default membalik tampilan video */
        width: 100%;
        border-radius: 6px;
    }
</style>
@endpush

@section('content')
<div class="page-content">
        
    <div class="page-title page-title-small">
        <h2></h2>
    </div>
    <div class="card header-card shape-rounded" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-overlay dark-mode-tint"></div>
        <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
    </div>
    <div class="card card-style">
        <div class="card-body">
            <h5 class="card-title">QR Scanner</h5>
            <div style="display: flex; justify-content: overflow: hidden;">
                <video id="preview"></video>
            </div>
        </div>
    </div>
    <a href="#" class="btn btn-full btn-margins bg-highlight rounded-sm shadow-xl btn-m text-uppercase font-900">Download CV</a>
</div>    
@endsection

@push('js')
<script>
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

    scanner.addListener('scan', function (content) {
        window.open(content, '_blank');
    });

    Instascan.Camera.getCameras().then(function (cameras) {
        let selectedCamera = cameras.find(camera => camera.name.toLowerCase().includes('back'));

        if (selectedCamera) {
            scanner.start(selectedCamera).then(() => {
                // Balik atau putar tampilan video jika kamera belakang terdeteksi
                document.getElementById('preview').style.transform = 'scaleX(-1)';
            }).catch(err => console.error(err));
        } else if (cameras.length > 0) {
            scanner.start(cameras[0]); // Gunakan kamera pertama jika kamera belakang tidak ditemukan
        } else {
            console.error('Tidak ada kamera yang ditemukan.');
        }
    }).catch(function (e) {
        console.error(e);
    });
</script>
@endpush