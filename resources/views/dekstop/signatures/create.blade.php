@extends('dekstop.layouts.main')

@section('title', 'PKWT & SKK Detail | InterCipta ERP Management')

@section('content')
<main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
        <!-- .page -->
        <div class="page has-sidebar has-sidebar-expand-xl">
            <!-- .page-inner -->
            <div class="page-inner">
                <!-- .page-title-bar -->
                <header class="page-title-bar">
                    <h1 class="page-title"> Tambah Tanda Tangan </h1>
                </header><!-- /.page-title-bar -->
                <!-- .page-section -->
                <div class="page-section">
                    <div id="base-style" class="card">
                        <!-- .card-body -->
                        <div class="card-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- .form -->
                            <form action="{{ route('signatures.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <canvas id="signatureCanvas" width="500" height="200"></canvas>
                                    <button id="saveButton" class="btn btn-primary">Simpan</button>
                                </div><!-- /.modal-body -->
                            </form>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.page-section -->
                <!-- .app-footer -->
                <footer class="app-footer">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-muted" href="#">Support</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted" href="#">Help Center</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted" href="#">Privacy</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted" href="#">Terms of Service</a>
                        </li>
                    </ul>
                    <div class "copyright"> Copyright © 2023. InterCipta Corporation All right reserved. </div>
                </footer><!-- /.app-footer -->
            </div><!-- /.page-inner -->
        </div><!-- /.page -->
    </div><!-- /.wrapper -->
</main>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@3.0.0/signature_pad.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var canvas = document.getElementById('signatureCanvas');
            var signaturePad = new SignaturePad(canvas);
            var saveButton = document.getElementById('saveButton');
    
            saveButton.addEventListener('click', function() {
                if (signaturePad.isEmpty()) {
                    alert('Tanda tangan kosong, silakan tanda tangan');
                } else {
                    if (!saveButton.disabled) {
                        saveButton.disabled = false; // Menonaktifkan tombol
                        var signatureDataUrl = signaturePad.toDataURL();
                        saveSignature(signatureDataUrl);
                    }
                }
            });
    
            function saveSignature(signatureDataUrl) {
                fetch('{{ url('signatures') }}', {
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
                    // Mengarahkan ke dasbor jika tanda tangan berhasil disimpan
                    if (data.success) {
                        window.location.href = '{{ url('/dashboard') }}';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    </script>
@endpush
