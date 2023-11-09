@extends('desktop.layouts.master')

@section('title', 'User List | InterCipta ERP Management')

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
                  <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>User List</a>
                </li>
              </ol>
            </nav><!-- /.breadcrumb -->
            <!-- floating action -->
            <a href="{{ route('users.create') }}">
              <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> <!-- /floating action -->
            </a>            <!-- title and toolbar -->
            <div class="d-md-flex align-items-md-start">
              <h1 class="page-title mr-sm-auto"> User List </h1><!-- .btn-toolbar -->
              <div class="btn-toolbar">
                <div class="dropdown">
                  <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalScrollable"><i class="oi oi-data-transfer-upload"></i> <span>Upload</span></button>
                </div>
                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
                  <!-- .modal-dialog -->
                  <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <!-- .modal-content -->
                    <div class="modal-content">
                      <!-- .modal-header -->
                        <div class="modal-header">
                          <h5 id="exampleModalScrollableLabel" class="modal-title"> Upload Data New PKWT </h5>
                        </div><!-- /.modal-header -->
                        <!-- .modal-body -->
                        <div class="modal-body">
                          <form action="{{ route('import-user') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="custom-file">
                              <input type="file" name="file" class="custom-file-input" id="customFile"><label class="custom-file-label">Hanya Format xlsx atau csv</label>
                              @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="modal-footer">
                              <a href="{{asset('/admin/format_import/format_import_user.xlsx')}}" class="dropdown-item"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png" width="20" alt="">&nbsp;&nbsp;Download Format Excel</a>
                              <button type="submit" class="btn btn-success">Import Data</button>
                            </div>
                          </form>
                        </div><!-- /.modal-body -->
                      <!-- .modal-footer -->
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>
                <div class="dropdown">
                  <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="oi oi-data-transfer-download"></i> <span>Export</span> <span class="fa fa-caret-down"></span></button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-arrow"></div><button wire:click="exportSelected" class="dropdown-item"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png" width="20" alt="">&nbsp;&nbsp;Export Excel</button>
                  </div>
                </div>
              </div>
            </div><!-- /title and toolbar -->
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="page-section">
            <!-- .card -->
            <div class="card card-fluid">
              <div class="card-body">
            
                <!-- .table-responsive -->
                @livewire('userstable')
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