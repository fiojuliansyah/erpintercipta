@extends('mobiles.layouts.master')

@section('title','Item Edit | Intercipta Mobile')
@section('content')
<div id="page">
    <div class="page-content" style="min-height:60vh!important">
        <div class="page-title page-title-small">
            <h2><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>Item Out</h2>
        </div>
        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
        </div>
        
        <div class="card card-style">
            <p class="card-body">
                Input fileds for text, email, password, website, text area, range sliders and much more.
            </p>
        </div>

        <div id="printable-content" class="card card-style">
            <div class="table-responsive">
                <table id="roletable" class="table">
                  <!-- thead -->
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>QTY</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                  </thead>
                  <!-- /thead -->
                  <!-- tbody -->
                  <tbody>
                    @foreach ($carts as $cart)
                      <tr>
                          <td>{{ $cart->product['accurate_id'] }}</td>
                          <td>
                            {{ $cart->product['name'] }}
                            <small>
                                {{ $cart->product['unit'] }}
                            </small>
                          </td>
                          <td>{{ $cart->quantity }}</td>
                          <td>
                              @if ($cart->status == 'waiting')
                              <span class="badge badge-warning">{{ $cart->status }}</span>
                              @elseif ($cart->status == 'force')
                              <span class="badge badge-success">{{ $cart->status }}</span>
                              @elseif ($cart->status == 'pending')
                              <span class="badge badge-info">{{ $cart->status }}</span>
                              @endif
                          </td>
                          <td>
                            <div class="row">
                              <div class="col-3">
                                <a class="btn btn-primary btn-sm mt-2" data-toggle="modal" data-target="#exampleModalAlertWarning{{ $cart->id }}">Force</a>
                              </div>
                            </div>
                          </td>
                      </tr><!-- /tr -->
                      @endforeach
                  </tbody><!-- /tbody -->
                </div>
              </table>
            </div>
        </div>
        <a href="#" class="btn btn-full btn-margins bg-primary rounded-sm shadow-xl btn-m text-uppercase font-900">PRINT STRUK</a>
    </div> 
</div>
@foreach ($carts as $cart)
<div class="modal modal-alert fade" id="exampleModalAlertWarning{{ $cart->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalAlertWarningLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- .modal-header -->
        <div class="modal-header">
        <h5 id="exampleModalAlertWarningLabel" class="modal-title">
            <i class="fa fa-bullhorn text-danger mr-1"></i> Apakah anda yakin?</h5>
        </div><!-- /.modal-header -->
        <!-- .modal-body -->
        <form action="{{ route('update-cart', $cart->id) }}" method="POST">
        @csrf
        @method('PUT')
            <div class="card-body">
                <h5 class="card-title">QR Scanner</h5>
                <div style="display: flex; justify-content: overflow: hidden; -webkit-transform: scaleX(-1); transform: scaleX(-1);">
                    <video id="preview" style="width: 100%; border-radius: 6px;"></video>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>
@endforeach
@endsection

@push('js')
<script>
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

    scanner.addListener('scan', function (content) {
        // Mengubah URL halaman saat ini ke URL yang dipindai
        window.location.href = content;
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
