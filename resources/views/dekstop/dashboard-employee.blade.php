@extends('dekstop.layouts.master')

@section('title', 'Dashboard | InterCipta ERP Management')

@section('content')
<main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
      <!-- .page -->
      <div class="page">
        <!-- .page-inner -->
        <div class="page-inner">
          <!-- .page-title-bar -->
          <header class="page-title-bar">
            <div class="d-flex flex-column flex-md-row">
              <p class="lead">
                <span class="font-weight-bold">Hi, {{ Auth::user()->name }}</span> <span class="d-block text-muted">
                  Here’s what’s happening with your business today. </span>
              </p>
            </div>
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="row">
            <div class="masonry-item col-lg-6">
              <!-- .card -->
              <div class="card card-fluid">
                  <img src="{{asset('/admin/images/dummy/cover.png')}}" class="card-img-top img-fluid" alt="">      
                 <!-- .card-body -->
                <div class="card-body pt-2">
                  <!-- grid row -->
                  <div class="row align-items-center mb-3">
                    <!-- grid column -->
                    <div class="col-auto">
                      <!-- .user-avatar -->
                      <a href="user-profile.html" class="user-avatar user-avatar-xl">
                        @if($user->profile?->avatar != null)
                        <img src="{{ Storage::url($user ? $user->profile?->avatar : '') }}" alt="">     
                        @else
                        <img src="{{asset('/admin/images/avatars/team4.jpg')}}"  alt="">      
                        @endif
                      </a> <!-- /.user-avatar -->
                    </div><!-- /grid column -->
                    <!-- grid column -->
                    <!-- .col -->
                    <div class="col">
                      <h3 class="card-title">
                        <a href="user-profile.html">{{ Auth::user()->name }}</a>
                      </h3>
                      <h6 class="card-subtitle text-muted"> <p>
                      </p> {{ Auth::user()->email }}</h6>
                    </div><!-- /.col -->
                    <!-- /grid column -->
                    <!-- grid column -->
                    <div class="col-auto">
                      <p>
                        <a href="{{ url('/register-profile') }}" class="btn btn-primary circle">View Profile <i class="fa fa-arrow-right ml-2"></i></a>
                      </p>
                    </div><!-- /grid column -->
                  </div><!-- /grid row -->
                  <!-- grid row -->
                  <div class="row text-center">
                    <!-- grid column -->
                    <div class="col">
                      <!-- .metric -->
                      <div class="metric">
                        <h6 class="metric-value"> 54 </h6>
                        <p class="metric-label"> Projects </p>
                      </div><!-- /.metric -->
                    </div><!-- /grid column -->
                    <!-- grid column -->
                    <div class="col">
                      <!-- .metric -->
                      <div class="metric">
                        <h6 class="metric-value"> 53 </h6>
                        <p class="metric-label"> Completed </p>
                      </div><!-- /.metric -->
                    </div><!-- /grid column -->
                    <!-- grid column -->
                    <div class="col">
                      <!-- .metric -->
                      <div class="metric">
                        <h6 class="metric-value"> 2 </h6>
                        <p class="metric-label"> On Going </p>
                      </div><!-- /.metric -->
                    </div><!-- /grid column -->
                  </div><!-- /grid row -->
                </div><!-- /.card-body -->
              </div><!-- /.card -->
            </div>
          </div>
        </div><!-- /.page-inner -->
      </div><!-- /.page -->
    </div><!-- .app-footer -->
    <footer class="app-footer">
      <ul class="list-inline">
        <li class="list-inline-item">
          <a class="text-muted" href="#">Support</a>
        </li>
        <li class="list-inline-item">
          <a class="text-muted" href="#">Help Center</a>
        </li>
        <li class="list-inline-item">
          <a class="text-muted" href="#">Privacy</a>
        </li>
        <li class="list-inline-item">
          <a class="text-muted" href="#">Terms of Service</a>
        </li>
      </ul>
      <div class="copyright"> Copyright © 2023. InterCipta Corporation All right reserved. </div>
    </footer><!-- /.app-footer -->
    <!-- /.wrapper -->
  </main>
@endsection