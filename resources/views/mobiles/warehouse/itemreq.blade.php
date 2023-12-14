@extends('mobiles.layouts.master')

@section('title','Request Item | Intercipta Mobile')
@section('content')
<div id="page">
    <div class="page-content" style="min-height:60vh!important">
        <div class="page-title page-title-small">
            <h2><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>Inputs</h2>
        </div>
        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
        </div>
        
        <div class="card card-style">
            <p class="content">
                Input fileds for text, email, password, website, text area, range sliders and much more.
            </p>
        </div>

        <div class="card card-style">
            <div class="content mb-0">        
                <div class="row">
                    <div class="col-9">
                        <div class="input-style input-style-1 input-required">
                            <select class="form-control">
                                <option value="default" disabled selected>Pilih Barang</option>
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} ({{ $product->accurate_id }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-style input-style-1 input-required">
                            <input class="form-control" type="name" placeholder="qty">
                        </div>         
                    </div>
                </div>
            </div>
        </div>
</div> 
@endsection 