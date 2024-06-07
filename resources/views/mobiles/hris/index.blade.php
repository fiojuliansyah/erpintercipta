@extends('mobiles.layouts.master')

@section('title','HRIS | Intercipta Mobile')

@section('content')
<div class="page-content">
        
    <div class="page-title page-title-small">
        <h2></a>HRIS</h2>
    </div>
    <div class="card header-card shape-rounded" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
    </div>
    
    <div class="card card-style">
        <div class="content">
            <p>
                Management Recruitment
            </p>
        </div>
    </div>
    
    <div class="card card-style">
        <div class="content mt-0 mb-0">           
            <div class="list-group list-custom-small list-icon-0">
                <a href="{{ route('applicants.index') }}"><i class="fa fa-users color-green1-dark"></i><span>Pelamar</span><i class="fa fa-angle-right"></i></a>
                <a href="{{ route('candidates.index') }}"><i class="fa fa-users color-blue2-dark"></i><span>kandidat</span><i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </div>
</div>    
@endsection