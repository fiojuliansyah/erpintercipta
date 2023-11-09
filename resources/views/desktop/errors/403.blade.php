@extends('desktop.layouts.master')

@section('title', 'Can Not Access | InterCipta ERP Management')

@section('content')
<main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
      <!-- .empty-state -->
      <div class="empty-state">
        <!-- .empty-state-container -->
        <div class="empty-state-container">
          <div class="state-figure">
            <img class="img-fluid" src="{{ asset('') }}admin/images/illustration/img-2.svg" alt="" style="max-width: 320px">
          </div>
          <h3 class="state-header"> Tidak Bisa Diakses! </h3>
          <p class="state-description lead text-muted"> Maaf, Fitur ini tidak dapat digunakan karena <strong>{{ Auth::user()->name }}</strong> tidak diberikan akses. </p>
          <div class="state-action">
            <a href="{{ url('dashboard') }}" class="btn btn-lg btn-light"><i class="fa fa-angle-right"></i> Go To Dashboard</a>
          </div>
        </div><!-- /.empty-state-container -->
      </div><!-- /.empty-state -->
    </div><!-- /.wrapper -->
</main>
@endsection