@extends('mobiles.layouts.master')

@section('title','Product List| Intercipta Mobile')

@section('content')
<div class="page-content">
        
    <div class="page-title page-title-small">
        <h2><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>Produk</h2>
        <a href="#" data-menu="scanner-cam"><i class="fa fa-qrcode" style="color: white; font-size: 30px"></i></a>
    </div>
    <div class="card header-card shape-rounded" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
    </div>

    <br>
    @livewire('productstable')
</div>
<div id="scanner-cam" 
         class="menu menu-box-modal menu-box-detached rounded-m" 
         data-menu-height="570" 
         data-menu-width="320">
        <h1 class="text-center font-700 mt-3 pt-2">Scan Qrcode Produk</h1>
        <div class="divider divider-margins"></div>
        
        <div style="display: flex; justify-content: overflow: hidden; -webkit-transform: scaleX(-1); transform: scaleX(-1);">
            <video id="preview" style="width: 100%; border-radius: 6px;"></video>
        </div>

        <div class="divider divider-margins mt-n1 mb-3"></div>
        <p class="text-center font-10 mb-0">Copyright <span class="copyright-year"></span> - Enabled. All rights reserved.</p>
    </div>
@endsection
@push('js')
<script>
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

    scanner.addListener('scan', function (content) {
        window.open(content, '_blank');
    });

    Instascan.Camera.getCameras().then(function (cameras) {
        let selectedCamera = cameras.filter(camera => camera.name.toLowerCase().includes('back'))[0]; // Memilih kamera belakang

        if (selectedCamera) {
            scanner.start(selectedCamera);
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