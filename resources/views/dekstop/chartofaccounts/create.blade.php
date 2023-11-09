@extends('dekstop.layouts.master')

@section('title', 'Add Chart Of Account | InterCipta ERP Management')

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
                  <a href="{{ route('chartofaccounts.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                </li>
              </ol>
            </nav>
            <h1 class="page-title"> Add Chart Of Account </h1>
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="page-section">
            <div class="d-xl-none">
              <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
            </div><!-- .card -->
            <div id="base-style" class="card">
              <!-- .card-body -->
              <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- .form -->
                <form action="{{ route('chartofaccounts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <!-- .fieldset -->
                  <div class="row">
                    @can('status')
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <label for="customername">Data Status</label>
                          <select id="status" class="custom-select custom-select-lg d-block w-100" name="status" required="">
                          <option value="0"> Pending </option>
                          <option value="1"> Approve </option>
                          <option value="2"> Reject </option>
                          </select>
                      </div>
                    </div>
                    @endcan
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="customer_id">Customer</label>
                            <select id="customer_id" class="custom-select custom-select-lg d-block w-100" name="customer_id" required="">
                            <option value=""> Choose Customer </option>
                                @foreach ($customers as $customer)
                                @if ( $customer->status == '1' )
                                    <option value="{{ $customer->id }}"> {{ $customer->customername }} </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="accounttype_id">Account Type</label>
                            <select id="accounttype_id" class="custom-select custom-select-lg d-block w-100" name="accounttype_id" required="">
                            <option value=""> Choose Account Type </option>
                                @foreach ($accounttypes as $accounttype)
                                    <option value="{{ $accounttype->id }}"> {{ $accounttype->accounttype }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="accountname">Account Name</label>
                            <input type="text" name="accountname" class="form-control" placeholder="Tulis Disini">
                           @error('accountname')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form><!-- /.form -->
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