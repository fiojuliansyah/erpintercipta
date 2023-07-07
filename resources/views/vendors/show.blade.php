@extends('layouts.master')

@section('title', 'Show Vendor | InterCipta ERP Management')

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
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                  <a href="{{ route('vendors.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                </li>
              </ol>
            </nav>
            <h1 class="page-title"> {{ $vendor->vendorname }} </h1>
                <a href="{{ route('vendors.edit',$vendor->id) }}" class="btn btn-success">Edit Vendor</a>
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="page-section">
            <div class="d-xl-none">
              <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
            </div><!-- .card -->
            <div id="base-style" class="card">
              <!-- .card-body -->
              <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Company</label>
                                <input class="form-control" id="tfDisabled" value="{{ $vendor->company['company'] }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>vendor Name</label>
                                <input class="form-control" id="tfDisabled" value="{{ $vendor->vendorname }}" disabled>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" id="tfDisabled" value="{{ $vendor->address }}" disabled>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" id="tfDisabled" value="{{ $vendor->email }}" disabled>
                            </div>
                        </div>
                        <!-- grid column -->
                        <div class="col-md-6">
                        <!-- .form-group -->
                            <div class="form-group">
                                <label>Contact</label>
                                <input class="form-control" id="tfDisabled" value="{{ $vendor->contact }}" disabled>
                            </div>
                        </div><!-- /grid column -->
                        <!-- grid column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" id="tfDisabled" value="{{ $vendor->phone }}" disabled>
                            </div>
                        </div><!-- /grid column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Term</label>
                                <input class="form-control" id="tfDisabled" value="{{ $vendor->term['term'] }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tax Number</label>
                                <input class="form-control" id="tfDisabled" value="{{ $vendor->taxnumber }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tax Category 1 </label>
                                <input class="form-control" id="tfDisabled" value="{{ $vendor->taxcategorya['taxcategory'] }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tax Category 2</label>
                                <input class="form-control" id="tfDisabled" value="{{ $vendor->taxcategoryb['taxcategory'] }}" disabled>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Tax Address</label>
                                <input class="form-control" id="tfDisabled" value="{{ $vendor->taxaddress }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="el-example">
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Show Tax Image</button>
                          </div><!-- Normal modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <!-- .modal-dialog -->
                            <div class="modal-dialog" role="document">
                              <!-- .modal-content -->
                              <div class="modal-content">
                                <!-- .modal-header -->
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title"> Image Tax </h5>
                                </div><!-- /.modal-header -->
                                <!-- .modal-body -->
                                <div class="modal-body">
                                  <div class="row">
                                    <img src="{{ Storage::url($vendor->tax_image) }}" width="400px" alt="">
                                  </div>
                                </div><!-- /.modal-body -->
                              </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <br>
                                @if($vendor->status == '0')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif($vendor->status == '1')
                                    <span class="badge badge-success">Approved</span>
                                @elseif($vendor->status == '2')
                                    <span class="badge badge-warning">Rejected</span>
                                @endif
                            </div>
                        </div>
                    </div>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.page-section -->
          <!-- .app-footer -->
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
        </div><!-- /.page-inner -->
      </div><!-- /.page -->
    </div><!-- /.wrapper -->
  </main>
@endsection