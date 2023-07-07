@extends('layouts.master')

@section('title', 'Job Detail | InterCipta ERP Management')

@section('content')
<main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
      <!-- .page -->
      <div class="page has-sidebar has-sidebar-fluid has-sidebar-expand-lg">
        <!-- .page-inner -->
        <div class="page-inner p-0">
          <!-- .page-section -->
          <div class="page-section">
            <div class="container-fluid py-3">
                <img src="https://karir-production.nos.jkt-1.neo.id/logos/72/3341172/download.png" width="350" alt="">
            </div>
          </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
        <!-- .page-sidebar -->
        <div class="page-sidebar">
          <!-- .sidebar-header -->
          <header class="sidebar-header d-xl-none">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                  <a href="#" onclick="Looper.toggleSidebar()"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                </li>
              </ol>
            </nav>
          </header><!-- /.sidebar-header -->
          <!-- .sidebar-section -->
          <div class="sidebar-section">
            <div class="page-sidebar bg-light">
                <!-- .sidebar-header -->
                <header class="sidebar-header d-xl-none">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item active">
                        <a href="#" onclick="Looper.toggleSidebar()"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                      </li>
                    </ol>
                  </nav>
                </header><!-- /.sidebar-header -->
                <!-- .sidebar-section -->
                <div class="sidebar-section sidebar-section-fill">
                  <br>
                  <br>
                  <h1 class="page-title"> {{ $career->jobname }} </h1>
                  <p class="text-muted"> {{ $career->location }} </p>
                  <span class="badge bg-muted" data-toggle="tooltip" data-placement="bottom" title="Deadline"><span class="sr-only">Deadline</span> <i class="fa fa-calendar-alt text-muted mr-1"></i>{{ \Carbon\Carbon::parse($career->created_at)->format('d M Y') }}</span><!-- .nav-scroller -->
                  <div class="nav-scroller border-bottom">
                    <!-- .nav-tabs -->
                    <ul class="nav nav-tabs">
                      <li class="nav-item">
                        <a class="nav-link active show" data-toggle="tab" href="#client-billing-contact">Description & Information</a>
                      </li>
                    </ul><!-- /.nav-tabs -->
                  </div><!-- /.nav-scroller -->
                  <!-- .tab-content -->
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
                          <p>{{ $career->description }}</p>
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
                  </div><!-- /.tab-content -->
                </div><!-- /.sidebar-section -->
              </div>          
            </div><!-- /.sidebar-section -->
        </div><!-- /.page-sidebar -->
      </div><!-- /.page -->
    </div><!-- /.wrapper -->
</main>
@endsection