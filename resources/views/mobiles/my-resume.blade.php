@extends('mobiles.layouts.master')

@section('title','Resume | Intercipta Mobile')

@section('content')
<div class="page-content">
        
    <div class="page-title page-title-small">
        <h2>My Resume</h2>
    </div>
    <div class="card header-card shape-rounded" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-overlay dark-mode-tint"></div>
        <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
    </div>
    
    <div class="card card-style">
        <div class="content">
            <div class="d-flex">
                <div>
                    <img src="{{ Storage::url(Auth::user() ? Auth::user()->profile?->avatar : '') }}" width="50" class="mr-3 bg-highlight rounded-xl">
                </div>
                <div>
                    <h1 class="mb-0 pt-1">{{ Auth::user()->name }}</h1>
                    <p class="color-highlight font-11 mt-n2 mb-3">{{ Auth::user()->nik_number }}</p>
                </div>
            </div>
            <p>
                {{ Auth::user()->profile['address'] }}
            </p>
        </div>
    </div>
    
    <div class="card card-style">
        <div class="content mb-0">
            <h3 class="font-600">Informasi Diri</h3>
            <br>
            <div style="display: flex;">
                <div style="margin-right: 30px;">
                    <h6>Nama</h6>
                    <p>{{ Auth::user()->name }}</p>
                </div>
                <div style="margin-right: 30px;">
                    <h6>Panggilan</h6>
                    <p>{{ Auth::user()->profile['nickname'] }}</p>
                </div>
                <div>
                    <h6>handphone</h6>
                    <p>{{ Auth::user()->phone }}</p>
                </div>
            </div>
            <br>
            <div style="display: flex;">
                <div style="margin-right: 30px;">
                    <h6>Alamat</h6>
                    <p>{{ Auth::user()->profile['address'] }}</p>
                </div>
            </div>
            <br>
            <div style="display: flex;">
                <div style="margin-right: 30px;">
                    <h6>Jenis Kelamin</h6>
                    <p>{{ Auth::user()->profile['gender'] }}</p>
                </div>
                <div style="margin-right: 30px;">
                    <h6>Tinggi</h6>
                    <p>{{ Auth::user()->profile['height'] }} Cm</p>
                </div>
                <div>
                    <h6>Berat</h6>
                    <p>{{ Auth::user()->profile['weight'] }} Kg</p>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="btn btn-full btn-margins bg-highlight rounded-sm shadow-xl btn-m text-uppercase font-900">Download CV</a>
    

    

   
    <!-- footer and footer card-->
    <div class="footer" data-menu-load="menu-footer.html"></div>  
</div>    
@endsection