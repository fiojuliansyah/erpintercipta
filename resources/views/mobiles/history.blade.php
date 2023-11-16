@extends('mobiles.layouts.master')

@section('title', 'History | InterCipta ERP Management')

@section('content')
<div class="page-content">
        
    <div class="page-title page-title-small">
        <h2>Histori</h2>
    </div>
    <div class="card header-card shape-rounded" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-overlay dark-mode-tint"></div>
        <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
    </div>

    @foreach ($candidates as $candidate)
    <div class="card card-style">
        <div class="content">
            <h4>{{ $candidate->career['jobname'] }}</h4>
            <p class="mb-n1 font-600 color-highlight">{{ $candidate->career['location'] }}</p>
            <br>
            <a href="#" class="d-flex">
                <div class="align-self-center mr-2">
                    <h4 class="btn-warning color-white rounded-sm shadow-l font-12 font-400 p-1 px-2 mt-0 mb-3">Cek Berkas</h4>
                </div>
                <div>
                    <h6 class="align-self-center mb-n2 mt-0">{{ Carbon\Carbon::parse($candidate->created_at)->format('d F Y') }}</h6>
                    <span class="color-theme opacity-30 d-block mb-0 font-11">Pelamar : {{ $candidate->user['name'] }}</span>
                </div>
                <div class="align-self-center ml-auto">
                    <h6 class="text-right mb-n1 mt-n2">{{ $candidate->career['graduate'] }}</h6>
                    <span class="color-green1-dark d-block mt-n2 font-10 text-right">{{ $candidate->career['experience'] }}</span>
                </div>
            </a>   
            
        </div>
    </div>    
    @endforeach
</div> 
@endsection