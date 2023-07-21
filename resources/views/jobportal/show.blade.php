@extends('layouts.master')

@section('title', 'Job Detail | InterCipta ERP Management')

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
          <!-- page title stuff goes here -->
          <div class="container-fluid py-3">
            <img src="https://karir-production.nos.jkt-1.neo.id/logos/72/3341172/download.png" width="350" alt="">
          </div>
        </header><!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
          <!-- .section-block -->
          <div class="section-block">
            <!-- page content goes here -->
            <div class="tab-content pt-4" id="clientDetailsTabs">
              <!-- .tab-pane -->
              <div class="tab-pane fade show active" id="client-billing-contact" role="tabpanel" aria-labelledby="client-billing-contact-tab">
                <!-- .card -->
                <div class="card">
                  <!-- .card-body -->
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <h2 id="client-billing-contact-tab" class="card-title"> Description </h2>
                    </div>
                    <p>{!! html_entity_decode($career->description) !!}</p>
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
                <!-- .card -->
                <div class="card mt-4">
                  <!-- .card-body -->
                  <div class="card-body">
                    <h2 class="card-title"> Information </h2><!-- .table-responsive -->
                    <div class="table-responsive">
                      <table class="table table-hover" style="min-width: 678px">
                        <thead>
                          <tr>
                            <th> Salary </th>
                            <th> Work Experience </th>
                            <th> Graduate </th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="align-middle" style="color: green"> {{ $career->salary }} </td>
                            <td class="align-middle"> {{ $career->experience }} </td>
                            <td class="align-middle"> <span class="badge badge-danger"> {{ $career->graduate }} </span></td>
                            <td class="align-middle text-right">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div><!-- /.table-responsive -->
                  </div><!-- /.card-body -->
                  <!-- .card-footer -->
                  <div class="alert alert-danger"> <span style="color: red">Disclaimer:</span> melamar pekerjaan di InterCipta Corporation tidak dipungut biaya </div><!-- /.card-footer -->
                </div><!-- /.card -->
                <div class="card mt-4">
                  <!-- .card-body -->
                  <div class="card-body">
                    <h2 class="card-title"> About Company </h2><!-- .table-responsive -->
                    <div class="table-responsive">
                      <h3>InterCipta Corporation</h3>
                      <p>
                          Intercipta Corporation is the Holding Company of several businesses, covering areas of Manpower Services, Trading, and Technology. Since 2003 The Companies were consolidated into the Group, initially starting from PT Cipta Power Service (Skilled Manpower provision and Services), and PT Intercipta Jasa Indonesia / Interclean, Housekeeping and Cleaning Company) to be latest in establishment. Intercipta Corporation is growing with more products and services. We are developing into Electrical Power Infrastructure. The roadmap is clear that we are developing our businesses with Manpower and Human Resources as our Core of Competence. Trading and Technology also plays a very important role in our portfolio as it supports the Services Sector and also serves as portfolio diversification.
                      </p>
                    </div><!-- /.table-responsive -->
                  </div><!-- /.card-body -->
                  <!-- .card-footer -->
                </div>
              </div><!-- /.tab-pane -->
            </div>
          </div><!-- /.section-block -->
        </div><!-- /.page-section -->
      </div><!-- /.page-inner -->
    </div><!-- /.page -->
  </div><!-- /.wrapper -->
</main>
@endsection