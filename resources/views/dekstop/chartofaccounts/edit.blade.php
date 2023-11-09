@extends('dekstop.layouts.master')

@section('title', 'Edit Chart Of Account | InterCipta ERP Management')

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
            <h1 class="page-title"> {{ $chartofaccount->accountname }} </h1>
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="page-section">
            <div class="d-xl-none">
              <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
            </div><!-- .card -->
            <div id="base-style" class="card">
              <!-- .card-body -->
              <div class="card-body">
                <form action="{{ route('chartofaccounts.update',$chartofaccount->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer_id">Customer Name</label>
                                <select id="customer_id" class="custom-select custom-select-lg d-block w-100" name="customer_id">
                                <option value=""> Choose Customer </option>
                                @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" {{ old('customer_id', $chartofaccount->customer_id ) == $customer->id ? 'selected' : null }}> {{ $customer->customername }} </option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="accounttype_id">Account Type</label>
                                <select id="accounttype_id" class="custom-select custom-select-lg d-block w-100" name="accounttype_id">
                                <option value=""> Choose Account Type </option>
                                @foreach ($accounttypes as $accounttype)
                                <option value="{{ $accounttype->id }}" {{ old('accounttype_id', $chartofaccount->accounttype_id ) == $accounttype->id ? 'selected' : null }}> {{ $accounttype->accounttype }} </option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Account Name</label>
                                <input class="form-control" id="tfDisabled" value="{{ $chartofaccount->accountname }}" name="accountname">
                            </div>
                        </div>
                        <div class="col-md-6">
                            @can('status')
                                <div class="form-group">
                                    <label for="status">Data Status</label>
                                    <select id="status" class="custom-select custom-select-lg d-block w-100" name="status" required="">
                                    <option value="0" {{ $chartofaccount->status == '0' ? 'selected' : '' }}> Pending </option>
                                    <option value="1" {{ $chartofaccount->status == '1' ? 'selected' : '' }}> Approve </option>
                                    <option value="2" {{ $chartofaccount->status == '2' ? 'selected' : '' }}> Reject </option>
                                    </select>
                                </div>
                            @endcan
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
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