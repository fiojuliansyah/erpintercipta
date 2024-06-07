@extends('mobiles.layouts.master')

@section('title','Profile | Intercipta Mobile')

@section('content')
<div class="page-content">
        
    <div class="page-title page-title-small">
        <h2></a>Profil</h2>
    </div>
    <div class="card header-card shape-rounded" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
    </div>
    
    <div class="card card-style">
        <div class="content">
            <p>
                Pages styled to feel like Classic Site Pages or App Styled Pages. These are all highly flexible and incredibly easy to use and edit.
            </p>
        </div>
    </div>
    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
        @csrf
    </form>
    <div class="card card-style">
        <div class="content mt-0 mb-0">           
            <div class="list-group list-custom-small list-icon-0">
                <a href="{{ url('/register-profile') }}"><i class="fa fa-user color-blue2-dark"></i><span>Registrasi Ulang</span><i class="fa fa-angle-right"></i></a>
                <a href="{{ route('documents.index') }}"><i class="fas fa-file-alt color-yellow2-dark"></i><span>My Document</span><i class="fa fa-angle-right"></i></a>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off color-red2-dark"></i><span>Logout</span><i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </div>
</div>
    
@endsection