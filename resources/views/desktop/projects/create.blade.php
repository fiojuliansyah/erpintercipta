@extends('desktop.layouts.master')

@section('title', 'Create Project | InterCipta ERP Management')

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
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                  <a href="{{ url('projects') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Projects</a>
                </li>
              </ol>
            </nav>
            <h1 class="page-title"> Stepper </h1>
            <p class="text-muted"> A process/progress indicator component communicates to the user the progress of a particular process. </p>
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="page-section">
            <!-- .section-block -->
            <div class="section-block">
              <!-- Default Steps -->
              <!-- .bs-stepper -->
              <div id="stepper" class="bs-stepper">
                <!-- .card -->
                <div class="card">
                  <!-- .card-header -->
                  <div class="card-header">
                    <!-- .steps -->
                    <div class="steps steps-" role="tablist">
                      <ul>
                        <li class="step" data-target="#test-l-1" data-validate="fieldset01">
                          <a href="#" class="step-trigger" tabindex="-1"><span class="step-indicator step-indicator-icon"><i class="oi oi-person"></i></span> <span class="d-none d-sm-inline">Customer</span></a>
                        </li>
                        <li class="step" data-target="#test-l-2" data-validate="fieldset02">
                          <a href="#" class="step-trigger" tabindex="-1"><span class="step-indicator step-indicator-icon"><i class="oi oi-briefcase"></i></span> <span class="d-none d-sm-inline">Department</span></a>
                        </li>
                        {{-- <li class="step" data-target="#test-l-3" data-validate="fieldset03">
                          <a href="#" class="step-trigger" tabindex="-1"><span class="step-indicator step-indicator-icon"><i class="oi oi-document"></i></span> <span class="d-none d-sm-inline">Chart Of Account</span></a>
                        </li> --}}
                        <li class="step" data-target="#test-l-3" data-validate="agreement">
                          <a href="#" class="step-trigger" tabindex="-1"><span class="step-indicator step-indicator-icon"><i class="oi oi-check"></i></span> <span class="d-none d-sm-inline">Confirm</span></a>
                        </li>
                      </ul>
                    </div><!-- /.steps -->
                  </div><!-- /.card-header -->
                  <!-- .card-body -->
                  <div class="card-body">
                    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" id="stepper-form" class="p-lg-4 p-sm-3 p-0">
                        @csrf
                        <!-- .content -->
                      <div id="test-l-1" class="content dstepper-none fade">
                        <!-- fieldset -->
                        <fieldset>
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
                              <label for="company_id">Company</label>
                              <select id="company_id" class="custom-select custom-select-lg d-block w-100" name="company_id" data-parsley-group="fieldset01" required>
                                <option value="#"> Choose Company </option>
                                @foreach ($companies as $company)
                                <option value="{{ $company->id }}"> {{ $company->company }} </option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <!-- grid column -->
                            <div class="col-md-6 mb-4">
                              <div class="form-label-group">
                                <input type="text" id="customername" class="form-control" name="customername" data-parsley-group="fieldset01" placeholder="USING CAPITAL"> <label for="customername">Customer Name <span class="badge badge-info"><em>If Request</em></span></label>
                              </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-6 mb-4">
                              <div class="form-label-group">
                                <input type="text" id="email" class="form-control" name="email" data-parsley-group="fieldset1" placeholder="USING CAPITAL"> <label for="email">Email</label>
                              </div>
                            </div><!-- /grid column -->
                          </div>
                          <div class="row">
                            <!-- grid column -->
                            <div class="col-md-6 mb-4">
                              <div class="form-label-group">
                                <input type="text" id="contact" class="form-control" name="contact" data-parsley-group="fieldset1" placeholder="USING CAPITAL"> <label for="contact">Contact Name</label>
                              </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-6 mb-4">
                              <div class="form-label-group">
                                <input type="text" id="phone" class="form-control" name="phone" data-parsley-group="fieldset1" placeholder="USING CAPITAL"> <label for="phone">Phone</label>
                              </div>
                            </div><!-- /grid column -->
                          </div><!-- /.row -->
                          <!-- .form-group -->
                          <div class="form-group mb-4">
                            <div class="form-label-group">
                              <input type="text" id="address" class="form-control" name="address" data-parsley-group="fieldset1" placeholder="USING CAPITAL"> <label for="address">Address</label>
                            </div>
                          </div><!-- /.form-group -->
                          <div class="form-group mb-4">
                            <div class="form-label-group">
                              <input type="text" id="taxaddress" class="form-control" name="taxaddress" data-parsley-group="fieldset1" placeholder="USING CAPITAL"> <label for="taxaddress">Tax Address</label>
                            </div>
                          </div>
                          <div class="row">
                            <!-- grid column -->
                            <div class="col-md-6 mb-4">
                              <select id="term_id" class="custom-select custom-select-lg d-block w-100" name="term_id" data-parsley-group="fieldset1">
                                <option value="#"> Choose Term </option>
                                @foreach ($terms as $term)
                                    <option value="{{ $term->id }}"> {{ $term->term }} </option>
                                @endforeach
                              </select>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-6 mb-4">
                                <div class="form-label-group">
                                  <input type="text" id="taxnumber" class="form-control" name="taxnumber" data-parsley-group="fieldset1" placeholder="00.000.000.0-000.000"> <label for="taxnumber">Tax Number</label>
                                </div>
                            </div><!-- /grid column -->
                          </div>
                          <!-- .row -->
                          <div class="row">
                            <!-- grid column -->
                            <div class="col-md-6 mb-4">
                              <select id="taxcategorya_id" class="custom-select custom-select-lg d-block w-100" name="taxcategorya_id" data-parsley-group="fieldset1">
                                <option value="#"> Choose Tax Category 1 </option>
                                @foreach ($taxcategories as $taxcategory)
                                <option value="{{ $taxcategory->id }}"> {{ $taxcategory->taxcategory }} </option>
                                @endforeach
                              </select>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-6 mb-4">
                              <select id="taxcategoryb_id" class="custom-select custom-select-lg d-block w-100" name="taxcategoryb_id" data-parsley-group="fieldset1">
                                <option value=""> Choose Tax Category 2 </option>
                                @foreach ($taxcategories as $taxcategory)
                                <option value="{{ $taxcategory->id }}"> {{ $taxcategory->taxcategory }} </option>
                                @endforeach
                              </select>
                            </div><!-- /grid column -->
                          </div><!-- /.row -->
                          <div class="row">
                            <!-- grid column -->
                            <div class="col-md-6 mb-4">
                                <label for="tax_image">Tax Image</label>
                                <div class="form-label-group">
                                    <input type="file" id="tax_image" class="form-control" name="tax_image" data-parsley-group="fieldset1">
                                  </div>
                            </div><!-- /grid column -->
                          </div>
                          <hr class="mt-5">
                          <div class="d-flex">
                             <button type="button" class="next btn btn-primary ml-auto" data-validate="fieldset1">Next step</button>
                          </div>
                        </fieldset><!-- /fieldset -->
                      </div><!-- /.content -->
                      <!-- .content -->
                      <div id="test-l-2" class="content dstepper-none fade">
                        <!-- fieldset -->
                        <fieldset>
                          <legend>Add Department</legend> <!-- .form-group -->
                          <div class="form-group mb-4">
                            <div class="form-label-group">
                              <input type="text" id="departmentname" class="form-control" data-parsley-group="fieldset02" name="departmentname" placeholder="USING CAPITAL"> <label for="departmentname">Department Name <span class="badge badge-info"><em>If Request</em></span></label>
                            </div>
                          </div><!-- /.form-group -->
                          <hr class="mt-5">
                          <!-- .d-flex -->
                          <div class="d-flex">
                            <button type="button" class="prev btn btn-secondary">Previous</button> <button type="button" class="next btn btn-primary ml-auto" data-validate="fieldset02">Next step</button>
                          </div><!-- /.d-flex -->
                        </fieldset><!-- /fieldset -->
                      </div><!-- /.content -->
                      <!-- .content -->
                      {{-- <div id="test-l-3" class="content dstepper-none fade">
                        <!-- fieldset -->
                        <fieldset>
                          <legend>Chart Of Account</legend> <!-- .custom-control -->
                          <div class="row">
                            <div class="col-md-6 mb-4">
                                <select id="accounttype_id" class="custom-select custom-select-lg d-block w-100" name="accounttype_id" data-parsley-group="fieldset03" required="">
                                  <option value="#"> Choose Account Type </option>
                                  @foreach ($accounttypes as $accounttype)
                                  <option value="{{ $accounttype->id }}"> {{ $accounttype->accounttype }} </option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-label-group">
                                  <input type="text" id="accountname" class="form-control" name="accountname" data-parsley-group="fieldset03" placeholder="USING CAPITAL"> <label for="taxnumber">Account Name</label>
                                </div>
                            </div>
                          </div>
                          <hr class="mt-5">
                          <div class="d-flex">
                            <button type="button" class="prev btn btn-secondary">Previous</button> <button type="button" class="next btn btn-primary ml-auto" data-validate="fieldset03">Next step</button>
                          </div>
                        </fieldset><!-- /fieldset -->
                      </div><!-- /.content --> --}}
                      <!-- .content -->
                      <div id="test-l-3" class="content dstepper-none fade">
                        <!-- fieldset -->
                        <fieldset>
                          <legend>Terms Agreement</legend> <!-- .card -->
                          <div class="card bg-light">
                            <div class="card-body overflow-auto" style="height: 260px">
                                <p>1. Pastikan semua kolom yang wajib diisi telah terisi dengan lengkap dan benar. Jangan mengosongkan kolom-kolom yang wajib diisi, karena hal ini dapat menyebabkan data tidak lengkap atau tidak valid. </p>
                                <p>2. Hindari pengisian form secara otomatis. Beberapa aplikasi atau program mungkin menawarkan fitur otomatis untuk mengisi form, namun hal ini dapat menyebabkan kesalahan data atau tidak lengkapnya data yang terkumpul. </p>
                                <p>3. Gunakan huruf atau karakter yang diizinkan dalam form. Hindari menggunakan karakter khusus, simbol, atau angka di kolom-kolom yang meminta data berupa kata atau kalimat. Ikuti format yang telah ditentukan. </p>
                                <p>4. Cek kembali data sebelum mengirimkan. Pastikan semua data yang telah dimasukkan sudah benar dan sesuai dengan yang diminta sebelum menekan tombol submit. </p>
                                <p>5. Permintaan perubahan data tidak dapat langsung diproses, dikarenakan membutuhkan Approved dari atasan yang bersangkutan, agar tidak terjadi kekeliruan Data dari berbagai pihak.</p>
                            </div>
                          </div><!-- /.card -->
                          <!-- .form-group -->
                          <div class="form-group">
                            <!-- .custom-control -->
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" id="agreement" class="custom-control-input" data-parsley-group="agreement"> <label class="custom-control-label" for="agreement">Agree to terms and conditions</label>
                            </div><!-- /.custom-control -->
                          </div><!-- /.form-group -->
                          <hr class="mt-5">
                          <div class="d-flex">
                            <button type="button" class="prev btn btn-secondary">Previous</button>
                            <button type="submit" class="btn btn-primary ml-auto">Submit</button>
                          </div>
                        </fieldset><!-- /fieldset -->
                      </div><!-- /.content -->
                    </form><!-- /form -->
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
              </div><!-- /.bs-stepper -->
            </div><!-- /.section-block -->
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
@push('js')
<script src="{{ asset('') }}admin/vendor/parsleyjs/parsley.min.js"></script>
<script src="{{ asset('') }}admin/vendor/vanilla-text-mask/vanillaTextMask.js"></script>
<script src="{{ asset('') }}admin/vendor/text-mask-addons/textMaskAddons.js"></script>
<script src="{{ asset('') }}admin/vendor/bs-stepper/js/bs-stepper.min.js"></script>
<script src="{{ asset('') }}admin/javascript/pages/steps-demo.js"></script>
@endpush
