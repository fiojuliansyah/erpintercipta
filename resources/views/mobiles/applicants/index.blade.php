@extends('mobiles.layouts.master')

@section('title', 'Applicant | Intercipta Mobile')

@section('content')
<div class="page-content">
        
    <div class="page-title page-title-small">
        <h2><a href="#" data-back-button></a>Pelamar</h2>
    </div>
    <div class="card header-card shape-rounded" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
    </div>

    <br>
    @livewire('applicantstable')

</div>
@endsection