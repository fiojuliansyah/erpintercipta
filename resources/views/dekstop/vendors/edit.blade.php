@extends('dekstop.layouts.master')

@section('title', 'Edit Vendor | InterCipta ERP Management')

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
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="page-section">
            <div class="d-xl-none">
              <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
            </div><!-- .card -->
            <div id="base-style" class="card">
              <!-- .card-body -->
              <div class="card-body">
                <form action="{{ route('vendors.update',$vendor->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="vendorname">Company</label>
                                <select id="company_id" class="custom-select custom-select-lg d-block w-100" name="company_id">
                                <option value=""> Choose Company </option>
                                @foreach ($companies as $company)
                                <option value="{{ $company->id }}" {{ old('company_id', $vendor->company_id ) == $company->id ? 'selected' : null }}> {{ $company->company }} </option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>vendor Name</label>
                                <input class="form-control" id="tfDisabled" value="{{ $vendor->vendorname }}" name="vendorname">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" style="height:150px" name="address">{{ $vendor->address }}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" id="tfDisabled" value="{{ $vendor->email }}" name="email">
                            </div>
                        </div>
                        <!-- grid column -->
                        <div class="col-md-6">
                        <!-- .form-group -->
                            <div class="form-group">
                                <label>Contact</label>
                                <input class="form-control" id="tfDisabled" value="{{ $vendor->contact }}" name="contact">
                            </div>
                        </div><!-- /grid column -->
                        <!-- grid column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" id="tfDisabled" value="{{ $vendor->phone }}" name="phone">
                            </div>
                        </div><!-- /grid column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="term_id">Term</label>
                                <select id="term_id" class="custom-select custom-select-lg d-block w-100" name="term_id">
                                    <option value=""> Choose Term </option>
                                    @foreach ($terms as $term)
                                    <option value="{{ $term->id }}" {{ old('term_id', $vendor->term_id ) == $term->id ? 'selected' : null }}> {{ $term->term }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tax Number</label>
                                <input class="form-control" id="tfDisabled" value="{{ $vendor->taxnumber }}" name="taxnumber">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="taxcategorya_id">Tax Category 1</label>
                                <select id="taxcategorya_id" class="custom-select custom-select-lg d-block w-100" name="taxcategorya_id">
                                    <option value=""> Choose Tax Category 1 </option>
                                    @foreach ($taxcategories as $taxcategory)
                                    <option value="{{ $taxcategory->id }}" {{ old('taxcategorya_id', $vendor->taxcategorya_id ) == $taxcategory->id ? 'selected' : null }}> {{ $taxcategory->taxcategory }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="taxcategoryb_id">Tax Category 2</label>
                                <select id="taxcategoryb_id" class="custom-select custom-select-lg d-block w-100" name="taxcategoryb_id">
                                    <option value=""> Choose Tax Category 2 </option>
                                    @foreach ($taxcategories as $taxcategory)
                                    <option value="{{ $taxcategory->id }}" {{ old('taxcategoryb_id', $vendor->taxcategoryb_id ) == $taxcategory->id ? 'selected' : null }}> {{ $taxcategory->taxcategory }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="taxaddress">Tax Address</label>
                                <textarea class="form-control" style="height:150px" name="taxaddress">{{ $vendor->taxaddress }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @can('status')
                                <div class="form-group">
                                    <label for="vendorname">Data Status</label>
                                    <select id="status" class="custom-select custom-select-lg d-block w-100" name="status" required="">
                                    <option value="0" {{ $vendor->status == '0' ? 'selected' : '' }}> Pending </option>
                                    <option value="1" {{ $vendor->status == '1' ? 'selected' : '' }}> Approve </option>
                                    <option value="2" {{ $vendor->status == '2' ? 'selected' : '' }}> Reject </option>
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