@extends('mobiles.layouts.master')

@section('title','Detail Lowongan | Intercipta Mobile')

@section('content')
<div class="page-content">
        
    <div class="page-title page-title-small">
        <h2><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>{{ $career->jobname }}</h2>
    </div>
    <div class="card header-card shape-rounded" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-overlay dark-mode-tint"></div>
        <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
    </div>
    
    <div class="single-slider-boxed text-center owl-no-dots owl-carousel">
        <div class="card rounded-l shadow-l" data-card-height="320">
            <div class="card-bottom">
                <h1 class="font-24 font-700">{{ $career->company['company'] }}</h1>
                <p class="boxed-text-xl">
                    {{-- Azures brings beauty and colors to your Mobile device with a stunning user interface to match.
                </p> --}}
            </div>
            <div class="card-overlay bg-gradient-fade"></div>
            <div class="card-bg owl-lazy" data-src="https://karir-production.nos.jkt-1.neo.id/logos/72/3341172/download.png"></div>
        </div>
    </div>
    
    <div class="card card-style">
        <div class="content">
            <div class="d-flex">
                <div>
                    <p class="mb-n1 font-600 color-highlight">{{ $career->location }}</p>
                    <h1 class="font-700">{{ $career->jobname }}</h1>
                </div>
                <div class="ml-auto">
                    <h1>{{ $career->candidate }}<sup class="font-100 opacity-300"> Orang</sup></h1>
                    <span class="badge bg-highlight color-white px-3 py-1 mt-n1 text-uppercase d-block">Kandidat</span>
                </div>
            </div>
            <p class="pt-2">
                {!! $career->description !!}
            </p>
            
            <div class="d-flex pr-2">
                <div>
                    <p class="font-10 mb-n2">Gaji</p>
                    <h5 class="font-13 font-600" style="color: green">{{ $career->salary }}</h5>
                </div>
                <div class="ml-auto">
                    <p class="font-10 mb-n2">Pendidikan</p>
                    <h5 class="font-13 font-600">{{ $career->graduate }}</h5>
                </div>
                <div class="ml-auto">
                    <p class="font-10 mb-n2">Dibutuhkan</p>
                    <h5 class="font-13 font-600">{{ $career->candidate }} Orang</h5>
                </div>
            </div>
            <div class="divider mt-3"></div>   
            <a href="#" data-menu="menu-confirm" class="btn btn-full bg-highlight btn-l rounded-sm text-uppercase font-800">lamar Sekarang</a>        </div>
    </div>

    <div class="card mt-4 preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg">
        <div class="card-body">
            <h2 class="color-white font-700 pt-3">Lowongan Lainnya</h2>
            <p class="color-white opacity-70 mb-4">
                Beberapa lowongan lainnya, yuk apply ke pekerjaan yang menurut kamu cocok !!
            </p>
            <div class="double-slider owl-carousel owl-no-dots">
                @foreach ($careers as $item) 
                <a href="{{ route('jobportal-show', $item->id) }}"">
                    <div data-card-height="200" class="card rounded-sm shadow-l bg-14">
                        <div class="card-bottom pb-4">
                            <h4 class="color-white font-100 line-height-l mb-3 ml-3">{{ $item->jobname }}</h4>
                        </div>
                        <div class="card-overlay bg-black opacity-80"></div>
                    </div>
                    <span href="#" class="under-slider-btn btn btn-xs btn-center-xs text-uppercase font-700 bg-white rounded-s">Lamar</span>
                </a>
                @endforeach
            </div>
        </div>
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-overlay dark-mode-tint"></div>
    </div>
</div>
<div id="menu-confirm" class="menu menu-box-modal rounded-m" 
        data-menu-height="200" 
        data-menu-width="330">
    <h1 class="text-center font-700 mt-3 pb-1">Kamu yakin ?</h1>
    <p class="boxed-text-l">
        Pilih IYA kalau kamu setuju, dan pilih TIDAK kalau kamu tidak setuju!
    </p>
    <div class="row mr-3 ml-3 mb-0">
        <form id="input-applicant" action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data" style="display: none;">
            @csrf
            <input type="hidden" name="status" value="0">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="career_id" value="{{ $career->id }}">
        </form>  
        <div class="col-6">
            <a href="#" onclick="event.preventDefault(); document.getElementById('input-applicant').submit();" class="close-menu btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-green1-dark">IYA</a>
        </div>
        <div class="col-6">
            <a href="#" class="close-menu btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-red1-dark">TIDAK</a>
        </div>
    </div>
</div>    
@endsection