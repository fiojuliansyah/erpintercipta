@extends('layouts.master')

@section('title', 'Job Portal | InterCipta ERP Management')

@section('content')
<main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
      <!-- .page -->
      <div class="page has-sidebar has-sidebar-expand-xl">
        <!-- .page-inner -->
        <div class="page-inner">
          <!-- .page-title-bar -->
          <header class="page-title-bar">
            <!-- .d-flex -->
            <div class="d-flex justify-content-between align-items-center">
              <!-- .breadcrumb -->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active">
                    <a href="{{ url('/dashboard') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Dashboard</a>
                  </li>
                </ol>
              </nav><!-- /.breadcrumb -->
              <button type="button" class="btn btn-light btn-icon d-xl-none" data-toggle="sidebar"><i class="fa fa-angle-double-left"></i></button>
            </div><!-- /.d-flex -->
            <!-- grid row -->
            <div class="row text-center text-sm-left">
              <!-- grid column -->
              <div class="col-sm-auto col-12 mb-2">
                <!-- .has-badge -->
                <div class="has-badge has-badge-bottom">
                  <a href="#" class="user-avatar user-avatar-xl">
                    @if($user->profile?->avatar != null)
                    <img src="{{ Storage::url($user ? $user->profile?->avatar : '') }}" alt="">     
                    @else
                    <img src="{{asset('/storage/avatars/default.png')}}"  alt="">      
                    @endif
                  </a>
                  <span class="tile tile-circle tile-xs" data-toggle="tooltip" title="Public">
                    <i class="fas fa-globe"></i>
                  </span>
                </div><!-- /.has-badge -->
              </div><!-- /grid column -->
              <!-- grid column -->
              <div class="col">
                <h1 class="page-title"> {{ Auth::user()->name }} </h1>
                <p class="text-muted"> {{ Auth::user()->email }} </p>
              </div><!-- /grid column -->
            </div><!-- /grid row -->
            <!-- .nav-scroller -->
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          @livewire('jobstable')
          <!-- /.page-section -->
        </div><!-- /.page-inner -->
        <!-- .page-sidebar -->
        <div class="page-sidebar">
          <!-- .sidebar-header -->
          <header class="sidebar-header d-sm-none">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                  <a href="#" onclick="Looper.toggleSidebar()"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                </li>
              </ol>
            </nav>
          </header><!-- /.sidebar-header -->
          <!-- .sidebar-section-fill -->
          <div class="sidebar-section-fill">
            <!-- .card -->
            <div class="card card-reflow">
              <!-- .card-body -->
              <div class="card-body">
                <button type="button" class="close mt-n1 d-none d-xl-none d-sm-block" onclick="Looper.toggleSidebar()" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="card-title"> Summary </h4><!-- grid row -->
                <div class="row">
                  <!-- grid column -->
                  <div class="col-6">
                    <!-- .metric -->
                    <div class="metric">
                      <h6 class="metric-value"> {{ $allcareer }} </h6>
                      <p class="metric-label mt-1"> All Job</p>
                    </div><!-- /.metric -->
                  </div><!-- /grid column -->
                  <!-- grid column -->
                  <div class="col-6">
                    <!-- .metric -->
                    <div class="metric">
                      <h6 class="metric-value"> {{ $alluser }} </h6>
                      <p class="metric-label mt-1"> Aplicant </p>
                    </div><!-- /.metric -->
                  </div><!-- /grid column -->
                  <!-- grid column -->
                  <div class="col-6">
                    <!-- .metric -->
                    <div class="metric">
                      <h6 class="metric-value"> 2,630 </h6>
                      <p class="metric-label mt-1"> Leads </p>
                    </div><!-- /.metric -->
                  </div><!-- /grid column -->
                  <!-- grid column -->
                  <div class="col-6">
                    <!-- .metric -->
                    <div class="metric">
                      <h6 class="metric-value"> > 7,000 </h6>
                      <p class="metric-label mt-1"> Clients </p>
                    </div><!-- /.metric -->
                  </div><!-- /grid column -->
                </div><!-- /grid row -->
              </div><!-- /.card-body -->
              <!-- .card-body -->
              <div class="card-body border-top pb-1">
                <h4 class="card-title"> InterCipta Corporation Jobs</h4><!-- .progress -->
                <div class="progress mb-2">
                  @foreach ($companies as $item)
                  <div class="progress-bar @if( $item->id == '1' )
                    bg-teal
                    @elseif( $item->id == '2' )
                    bg-indigo
                    @elseif( $item->id == '3' )
                    bg-pink
                    @elseif( $item->id == '3' )
                    bg-purple
                    @endif" role="progressbar" aria-valuenow="{{ $item->careers->count() }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $item->careers->count() }}%">
                  </div>   
                  @endforeach
                </div><!-- /.progress -->
              </div><!-- /.card -->
              <!-- .list-group -->
              <div class="list-group list-group-bordered list-group-reflow">
                <!-- .list-group-item -->
                @foreach ($companies as $company)   
                <div class="list-group-item justify-content-between align-items-center">
                  <span><i class="fas fa-square 
                    @if( $company->id == '1' )
                    text-teal
                    @elseif( $company->id == '2' )
                    text-indigo
                    @elseif( $company->id == '3' )
                    text-pink
                    @elseif( $company->id == '3' )
                    text-purple
                    @endif
                    mr-2"></i> {{ $company->company }}</span> <span class="text-muted">{{ $company->careers->count() }}</span>
                </div><!-- /.list-group-item -->
                @endforeach
              </div><!-- /.list-group -->
              <!-- .card-body -->
              {{-- <div class="card-body border-top">
                <div class="d-flex justify-content-between my-3">
                  <h4 class="card-title"> Recent activity </h4><a href="#">View all</a>
                </div><!-- .timeline -->
                <ul class="timeline timeline-fluid">
                  <!-- .timeline-item -->
                  <li class="timeline-item">
                    <!-- .timeline-figure -->
                    <div class="timeline-figure">
                      <span class="tile tile-circle tile-sm"><i class="far fa-calendar-alt fa-lg"></i></span>
                    </div><!-- /.timeline-figure -->
                    <!-- .timeline-body -->
                    <div class="timeline-body">
                      <!-- .media -->
                      <div class="media">
                        <!-- .media-body -->
                        <div class="media-body">
                          <p class="mb-0">
                            <a href="#">Jeffrey Wells</a> created a <a href="#">schedule</a>
                          </p><span class="timeline-date">About a minute ago</span>
                        </div><!-- /.media-body -->
                      </div><!-- /.media -->
                    </div><!-- /.timeline-body -->
                  </li><!-- /.timeline-item -->
                  <!-- .timeline-item -->
                  <li class="timeline-item">
                    <!-- .timeline-figure -->
                    <div class="timeline-figure">
                      <span class="tile tile-circle tile-sm"><i class="oi oi-chat fa-lg"></i></span>
                    </div><!-- /.timeline-figure -->
                    <!-- .timeline-body -->
                    <div class="timeline-body">
                      <!-- .media -->
                      <div class="media">
                        <!-- .media-body -->
                        <div class="media-body">
                          <p class="mb-0">
                            <a href="#">Anna Vargas</a> logged a <a href="#">chat</a> with team </p><span class="timeline-date">3 hours ago</span>
                        </div><!-- /.media-body -->
                      </div><!-- /.media -->
                    </div><!-- /.timeline-body -->
                  </li><!-- /.timeline-item -->
                  <!-- .timeline-item -->
                  <li class="timeline-item">
                    <!-- .timeline-figure -->
                    <div class="timeline-figure">
                      <span class="tile tile-circle tile-sm"><i class="fa fa-tasks fa-lg"></i></span>
                    </div><!-- /.timeline-figure -->
                    <!-- .timeline-body -->
                    <div class="timeline-body">
                      <!-- .media -->
                      <div class="media">
                        <!-- .media-body -->
                        <div class="media-body">
                          <p class="mb-0">
                            <a href="#">Arthur Carroll</a> created a <a href="#">task</a>
                          </p><span class="timeline-date">8:14pm</span>
                        </div><!-- /.media-body -->
                      </div><!-- /.media -->
                    </div><!-- /.timeline-body -->
                  </li><!-- /.timeline-item -->
                  <!-- .timeline-item -->
                  <li class="timeline-item">
                    <!-- .timeline-figure -->
                    <div class="timeline-figure">
                      <span class="tile tile-circle tile-sm"><i class="fas fa-user-plus fa-lg"></i></span>
                    </div><!-- /.timeline-figure -->
                    <!-- .timeline-body -->
                    <div class="timeline-body">
                      <!-- .media -->
                      <div class="media">
                        <!-- .media-body -->
                        <div class="media-body">
                          <p class="mb-0">
                            <a href="#">Sara Carr</a> invited to <a href="#">Stilearn Admin</a> project </p><span class="timeline-date">7:21pm</span>
                        </div><!-- /.media-body -->
                      </div><!-- /.media -->
                    </div><!-- /.timeline-body -->
                  </li><!-- /.timeline-item -->
                  <!-- .timeline-item -->
                  <li class="timeline-item">
                    <!-- .timeline-figure -->
                    <div class="timeline-figure">
                      <span class="tile tile-circle tile-sm"><i class="fa fa-folder fa-lg"></i></span>
                    </div><!-- /.timeline-figure -->
                    <!-- .timeline-body -->
                    <div class="timeline-body">
                      <!-- .media -->
                      <div class="media">
                        <!-- .media-body -->
                        <div class="media-body">
                          <p class="mb-0">
                            <a href="#">Angela Peterson</a> added <a href="#">Looper Admin</a> to collection </p><span class="timeline-date">5:21pm</span>
                        </div><!-- /.media-body -->
                      </div><!-- /.media -->
                    </div><!-- /.timeline-body -->
                  </li><!-- /.timeline-item -->
                  <!-- .timeline-item -->
                  <li class="timeline-item">
                    <!-- .timeline-figure -->
                    <div class="timeline-figure">
                      <span class="tile tile-circle tile-sm"><i class="oi oi-person fa-lg"></i></span>
                    </div><!-- /.timeline-figure -->
                    <!-- .timeline-body -->
                    <div class="timeline-body">
                      <!-- .media -->
                      <div class="media">
                        <!-- .media-body -->
                        <div class="media-body">
                          <div class="avatar-group mb-2">
                            <a href="#" class="user-avatar user-avatar-sm"><img src="assets/images/avatars/uifaces4.jpg" alt=""></a> <a href="#" class="user-avatar user-avatar-sm"><img src="assets/images/avatars/uifaces5.jpg" alt=""></a> <a href="#" class="user-avatar user-avatar-sm"><img src="assets/images/avatars/uifaces6.jpg" alt=""></a> <a href="#" class="user-avatar user-avatar-sm"><img src="assets/images/avatars/uifaces7.jpg" alt=""></a>
                          </div>
                          <p class="mb-0">
                            <a href="#">Willie Dixon</a> and 3 others followed you </p><span class="timeline-date">4:32pm</span>
                        </div><!-- /.media-body -->
                      </div><!-- /.media -->
                    </div><!-- /.timeline-body -->
                  </li><!-- /.timeline-item -->
                </ul><!-- /.timeline -->
              </div><!-- /.card-body --> --}}
            </div><!-- /.card -->
          </div><!-- /.sidebar-section-fill -->
        </div><!-- /.page-sidebar -->
      </div><!-- /.page -->
    </div><!-- /.wrapper -->
</main>
@endsection