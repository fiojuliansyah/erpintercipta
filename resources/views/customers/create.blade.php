@extends('layouts.master')

@section('title', 'Add Customer | InterCipta ERP Management')

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
                  <a href="{{ route('customers.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                </li>
              </ol>
            </nav>
            <h1 class="page-title"> Add Customer </h1>
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
                <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="customername">Company</label>
                            <select id="company_id" class="custom-select custom-select-lg d-block w-100" name="company_id" required="">
                            <option value=""> Choose Company </option>
                            @foreach ($companies as $company)
                            <option value="{{ $company->id }}"> {{ $company->company }} </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="customername">Customer Name</label>
                            <input type="text" name="customername" class="form-control" placeholder="Tulis Disini">
                           @error('customername')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" style="height:150px" name="address" placeholder="Tulis Disini"></textarea>
                            @error('address')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Tulis Disini">
                           @error('email')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="contact">Contact</label>
                            <input type="text" name="contact" class="form-control" placeholder="Tulis Disini">
                           @error('contact')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Tulis Disini">
                           @error('phone')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="term_id">Term</label>
                            <select id="term_id" class="custom-select custom-select-lg d-block w-100" name="term_id">
                                <option value=""> Choose Term </option>
                                @foreach ($terms as $term)
                                <option value="{{ $term->id }}"> {{ $term->term }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="taxnumber">Tax Number</label>
                            <input type="taxnumber" name="taxnumber" class="form-control" placeholder="Tulis Disini">
                           @error('taxnumber')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="taxcategorya_id">Tax Category 1</label>
                            <select id="taxcategorya_id" class="custom-select custom-select-lg d-block w-100" name="taxcategorya_id">
                                <option value=""> Choose Tax Category 1 </option>
                                @foreach ($taxcategories as $taxcategory)
                                <option value="{{ $taxcategory->id }}"> {{ $taxcategory->taxcategory }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="taxcategoryb_id">Tax Category 2</label>
                            <select id="taxcategoryb_id" class="custom-select custom-select-lg d-block w-100" name="taxcategoryb_id">
                                <option value=""> Choose Tax Category 2 </option>
                                @foreach ($taxcategories as $taxcategory)
                                <option value="{{ $taxcategory->id }}"> {{ $taxcategory->taxcategory }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="taxaddress">Tax Address</label>
                            <textarea class="form-control" style="height:150px" name="taxaddress" placeholder="Tulis Disini"></textarea>
                            @error('taxaddress')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="tax_image">Tax Image</label>
                             <input type="file" name="tax_image" class="form-control" placeholder="Post Title">
                            @error('tax_image')
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