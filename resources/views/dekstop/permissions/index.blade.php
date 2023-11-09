@extends('dekstop.layouts.master')

@section('title', 'Permission List| InterCipta ERP Management')

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
            <!-- .breadcrumb -->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                  <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Permission List</a>
                </li>
              </ol>
            </nav><!-- /.breadcrumb -->
            <!-- floating action -->
            <!-- title and toolbar -->
            <div class="d-md-flex align-items-md-start">
              <h1 class="page-title mr-sm-auto"> Permission List </h1><!-- .btn-toolbar -->
            </div><!-- /title and toolbar -->
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="page-section">
            <!-- .card -->
            <div class="card card-fluid">
                <div class="card-header">
                    <a href="{{ route('permissions.create') }}" type="button" class="btn btn-success">+ Add Permission</a>
                </div>
              <!-- .card-body -->
              <div class="card-body">
            
                <!-- .table-responsive -->
                @livewire('permissionstable')
              </div><!-- /.card-body -->
            </div><!-- /.card -->
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
</main>
@endsection