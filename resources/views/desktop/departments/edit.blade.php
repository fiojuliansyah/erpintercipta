@extends('desktop.layouts.master')

@section('title', 'Edit Department | InterCipta ERP Management')

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
                  <a href="{{ route('departments.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                </li>
              </ol>
            </nav>
            <h1 class="page-title"> {{ $department->departmentname }} </h1>
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="page-section">
            <div class="d-xl-none">
              <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
            </div><!-- .card -->
            <div id="base-style" class="card">
              <!-- .card-body -->
              <div class="card-body">
                <form action="{{ route('departments.update',$department->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer_id">Customer Name</label>
                                <select id="customer_id" class="custom-select custom-select-lg d-block w-100" name="customer_id">
                                <option value=""> Choose Customer </option>
                                @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" {{ old('customer_id', $department->customer_id ) == $customer->id ? 'selected' : null }}> {{ $customer->customername }} </option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>department Name</label>
                                <input class="form-control" id="tfDisabled" value="{{ $department->departmentname }}" name="departmentname">
                            </div>
                        </div>
                        <div class="col-md-6">
                            @can('status')
                                <div class="form-group">
                                    <label for="status">Data Status</label>
                                    <select id="status" class="custom-select custom-select-lg d-block w-100" name="status" required="">
                                    <option value="0" {{ $department->status == '0' ? 'selected' : '' }}> Pending </option>
                                    <option value="1" {{ $department->status == '1' ? 'selected' : '' }}> Approve </option>
                                    <option value="2" {{ $department->status == '2' ? 'selected' : '' }}> Reject </option>
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