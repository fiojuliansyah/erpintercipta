@extends('mobiles.layouts.master')

@section('title','Resume | Intercipta Mobile')

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
                <video id="preview" style="width: 100%; border-radius: 6px;"></video>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/instascan/2.0.0/instascan.min.js"></script>
<script>
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

    scanner.addListener('scan', function (content) {
        window.open(content, '_blank');
    });

    Instascan.Camera.getCameras().then(function (cameras) {
        const selectedCamera = cameras.find(camera => camera && camera.name.toLowerCase().includes('back')); // Memilih kamera belakang

        if (selectedCamera) {
            scanner.start(selectedCamera);
        } else {
            console.error('Kamera belakang tidak ditemukan.');
        }
    }).catch(function (e) {
        console.error('Error: ', e);
    });
</script>
@endpush
