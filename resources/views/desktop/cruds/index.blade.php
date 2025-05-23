@extends('desktop.layouts.master')

@section('title', 'Crud Table Example | InterCipta ERP Management')

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
            <!-- floating action -->
            <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> <!-- /floating action -->
            <!-- title and toolbar -->
            <div class="d-md-flex align-items-md-start">
              <h1 class="page-title mr-sm-auto"> Crud Table </h1><!-- .btn-toolbar -->
              <div class="btn-toolbar">
                <div class="dropdown">
                  <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="oi oi-data-transfer-upload"></i> <span>Import</span> <span class="fa fa-caret-down"></span></button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-arrow"></div><a href="#" class="dropdown-item">Add tasks</a>
                  </div>
                  <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="oi oi-data-transfer-download"></i> <span>Export</span> <span class="fa fa-caret-down"></span></button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-arrow"></div><a href="#" class="dropdown-item">Add tasks</a>
                  </div>
                </div>
              </div><!-- /.btn-toolbar -->
            </div><!-- /title and toolbar -->
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="page-section">
            <!-- .card -->
            <div class="card card-fluid">
                <div class="card-header">
                    <a href="{{ route('cruds.create') }}" type="button" class="btn btn-success">+ Add Data</a>
                </div><!-- /.card-header -->
              <!-- .card-body -->
              <div class="card-body">
            
                <!-- .table-responsive -->
                @livewire('crudstable')
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