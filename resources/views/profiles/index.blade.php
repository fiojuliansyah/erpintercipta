@extends('layouts.master')

@section('title', 'User Profile | InterCipta ERP Management')

@section('content')
<main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
      <!-- .page -->
      <div class="page">
        <!-- .page-cover -->
        <header class="page-cover">
          <div class="text-center">
            <a href="user-profile.html" class="user-avatar user-avatar-xl">
              @if($user->profile?->avatar != null)
              <img src="{{ Storage::url($user ? $user->profile?->avatar : '') }}" alt="">     
              @else
              <img src="{{asset('/storage/avatars/default.png')}}"  alt="">      
              @endif
            </a>
            <h2 class="h4 mt-2 mb-0"> {{ Auth::user()->name }} </h2>
            <div class="my-1">
            </div>
            <p class="text-muted">{{ Auth::user()->email }}</p>
            <p>  </p>
          </div>
        </header>
        <div class="page-inner">
          <!-- .page-title-bar -->
          <header class="page-title-bar">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                  <a href="{{ url('dashboard') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Dashboard</a>
                </li>
              </ol>
            </nav>
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="page-section">
            <!-- grid row -->
            <div class="row">
              <!-- grid column -->
              <div class="col-lg-4">
                <!-- .card -->
                <div class="card card-fluid">
                  <h6 class="card-header"> Your Details </h6><!-- .nav -->
                  <nav class="nav nav-tabs flex-column border-0">
                    <a href="user-profile-settings.html" class="nav-link active">Profile</a>
                    <a href="user-notification-settings.html" class="nav-link">Activity</a>
                  </nav><!-- /.nav -->
                </div><!-- /.card -->
              </div><!-- /grid column -->
              <!-- grid column -->
              <div class="col-lg-8">
                <!-- .card -->
                <div class="card card-fluid">
                  <h6 class="card-header"> Public Profile </h6><!-- .card-body -->
                  <div class="card-body">
                    <!-- form -->
                    <form action="{{ url('profiles') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="form-row">
                        <!-- form column -->
                        <label for="input01" class="col-md-3">Profile image</label> <!-- /form column -->
                        <!-- form column -->
                        <div class="col-md-9 mb-3">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="input01" name="avatar" multiple> <label class="custom-file-label" for="input01">Choose Avatar</label>
                          </div><small class="text-muted">Upload a new cover image, JPG 300x300</small>
                        </div><!-- /form column -->
                      </div><!-- /form row -->
                      <!-- form row -->
                      {{-- <div class="form-row">
                        <!-- form column -->
                        <label for="input01" class="col-md-3">Cover image</label> <!-- /form column -->
                        
                      </div><!-- /form row --> --}}
                      <!-- form row -->
                      <div class="form-row">
                        <!-- form column -->
                        <label for="input02" class="col-md-3">Name</label> <!-- /form column -->
                        <!-- form column -->
                        <div class="col-md-9 mb-3">
                          <input type="text" class="form-control" id="input02" value="{{ Auth::user()->name }}" disabled>
                        </div><!-- /form column -->
                      </div><!-- /form row -->
                      <div class="form-row">
                        <!-- form column -->
                        <label for="input02" class="col-md-3">Email</label> <!-- /form column -->
                        <!-- form column -->
                        <div class="col-md-9 mb-3">
                          <input type="text" class="form-control" id="input02" value="{{ Auth::user()->email }}" disabled>
                        </div><!-- /form column -->
                      </div><!-- /form row -->
                      <!-- form row -->
                      <div class="form-row">
                        <!-- form column -->
                        <label for="input03" class="col-md-3">Profile Heading</label> <!-- /form column -->
                        <!-- form column -->
                        <div class="col-md-9 mb-3">
                          <textarea class="form-control" name="bio" id="input03">{{ $user ? $user->profile?->bio : '' }}</textarea> <small class="text-muted">Appears on your profile page, 300 chars max.</small>
                        </div><!-- /form column -->
                      </div><!-- /form row -->
                      <!-- form row -->
                      <div class="form-row">
                        <!-- form column -->
                        <label for="input03" class="col-md-3">Address</label> <!-- /form column -->
                        <!-- form column -->
                        <div class="col-md-9 mb-3">
                          <textarea class="form-control" name="address" id="input03">{{ $user ? $user->profile?->address : '' }}</textarea> <small class="text-muted">Appears on your profile page, 300 chars max.</small>
                        </div><!-- /form column -->
                      </div><!-- /form row -->
                      <div class="form-row">
                        <!-- form column -->
                        <label for="input02" class="col-md-3">Phone</label> <!-- /form column -->
                        <!-- form column -->
                        <div class="col-md-9 mb-3">
                          <input type="text" class="form-control" id="input02" name="phone" value="{{ $user ? $user->profile?->phone : '' }}">
                        </div><!-- /form column -->
                      </div>
                      <!-- form row -->
                      <div class="form-row">
                        <!-- form column -->
                        <label for="input01" class="col-md-3">E-Sign</label> <!-- /form column -->
                        <!-- form column -->
                        <div class="col-md-9 mb-3">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="input01" name="esign" multiple> <label class="custom-file-label" for="input01">Choose E-Sign</label>
                          </div><small class="text-muted">Upload a new cover image, JPG 1200x300</small>
                        </div><!-- /form column -->
                      </div><!-- /form row -->
                      <hr>
                      <!-- .form-actions -->
                      <div class="form-actions">
                        <button type="submit" class="btn btn-primary ml-auto">Update Profile</button>
                      </div><!-- /.form-actions -->
                    </form><!-- /form -->
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
              </div><!-- /grid column -->
            </div><!-- /grid row -->
          </div><!-- /.page-section -->
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
  </main
@endsection