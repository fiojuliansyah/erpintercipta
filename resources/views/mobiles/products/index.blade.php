@extends('mobiles.layouts.master')

@section('title','Product List| Intercipta Mobile')

@section('content')
<div class="page-content">
        
    <div class="page-title page-title-small">
        <h2><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>Produk</h2>
        <a href="{{ route('scan') }}"><i class="fa fa-qrcode" style="color: white; font-size: 30px"></i></a>
    </div>
    <div class="card header-card shape-rounded" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
    </div>

    <br>
    @livewire('productstable')
</div>
@endsection