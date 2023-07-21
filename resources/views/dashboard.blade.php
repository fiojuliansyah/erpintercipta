@extends('layouts.master')

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
                  @if($user->profile?->phone != null)
                  Here’s what’s happening with your business today.     
                  @else
                  <span class="badge badge-warning">Update Your Profile First if you can view a Job</span>  
                @endif</span>
              </p>
            </div>
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="row">
            <div class="masonry-item col-lg-6">
              <!-- .card -->
              <div class="card card-fluid">
                  @if($user->profile?->cover != null)
                  <img src="{{ Storage::url($user ? $user->profile?->cover : '') }}" alt="" class="card-img-top img-fluid">    
                  @else
                  <img src="{{asset('/storage/cover/cover.png')}}" class="card-img-top img-fluid" alt="">      
                  @endif
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
                        <img src="{{asset('/storage/avatars/default.png')}}"  alt="">      
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
                        <a href="{{ url('profiles') }}" class="btn btn-primary circle">View Profile <i class="fa fa-arrow-right ml-2"></i></a>
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
            <div class="masonry-item col-lg-3">
              <div class="card card-fluid">
                <!-- .card-body -->
                <div class="card-body">
                  <div class="text-center pt-3">
                    <h3 class="card-title"> QR Code </h3><!-- easy-pie-chart -->
                    <i class="fas fa-qrcode" style="font-size: 300px;"></i>
                    <div style="padding-top: 20px">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">My QR Code</button>
                    </div>
                  </div><!-- /easy-pie-chart -->
                </div><!-- /.card-body -->
              </div>
            </div>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
              <!-- .modal-dialog -->
              <div class="modal-dialog modal-dialog-centered" role="document">
                <!-- .modal-content -->
                <div class="modal-content">
                  <!-- .modal-header -->
                  <div class="modal-header">
                    <h5 id="exampleModalCenterLabel" class="modal-title"> My QR Code </h5>
                  </div><!-- /.modal-header -->
                  <!-- .modal-body -->
                  <div class="modal-body">
                    <div style="text-align: center">
                      <p style="text-align: center; padding-top: 25px; font-size: 25px">{{ Auth::user()->name }}</p>
                      <img src="https://img.freepik.com/premium-vector/qr-code-sample-smartphone-scanning-qr-code-icon-flat-design-stock-vector-illustration_550395-108.jpg?w=2000" width="350px" alt="">
                      <p style="text-align: center; padding-top: 20px; font-size: 20px">APPLICANT - {{ str_pad(Auth::user()->id, 5, '0', STR_PAD_LEFT) }}</p>
                      <p>*Gunakan QR Code ini pada saat panggilan Interview dan Test</p>
                    </div>
                  </div><!-- /.modal-body -->
                  <!-- .modal-footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div><!-- /.modal-footer -->
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
            <div class="masonry-item col-lg-3">
              <div class="card card-fluid">
                <!-- .card-body -->
                <div class="card-body">
                  <div class="text-center pt-3">
                    <h3 class="card-title"> My Resume </h3><!-- easy-pie-chart -->
                    <br>
                    <i class="far fa-file-alt" style="font-size: 270px;"></i>
                    <div style="padding-top: 30px">
                      <span class="btn btn-primary"> Download Resume </span>
                    </div>
                  </div><!-- /easy-pie-chart -->
                </div><!-- /.card-body -->
              </div>
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