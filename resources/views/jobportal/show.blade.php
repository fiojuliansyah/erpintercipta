@extends('layouts.main')

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
                      <h2 id="client-billing-contact-tab" class="card-title"> Deskripsi </h2>
                    </div>
                    <p>{!! html_entity_decode($career->description) !!}</p>
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
                <!-- .card -->
                <div class="card mt-4">
                  <!-- .card-body -->
                  <div class="card-body">
                    <h2 class="card-title"> Informasi</h2><!-- .table-responsive -->
                    <div class="table-responsive">
                      <table class="table table-hover" style="min-width: 678px">
                        <thead>
                          <tr>
                            <th> Gaji </th>
                            <th> Pengalaman </th>
                            <th> Pendidikan </th>
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
                    <h2 class="card-title"> Tentang Perusahaan </h2><!-- .table-responsive -->
                    <div class="table-responsive">
                      <h3>InterCipta Corporation</h3>
                      <p>
                          Intercipta Corporation is the Holding Company of several businesses, covering areas of Manpower Services, Trading, and Technology. Since 2003 The Companies were consolidated into the Group, initially starting from PT Cipta Power Service (Skilled Manpower provision and Services), and PT Intercipta Jasa Indonesia / Interclean, Housekeeping and Cleaning Company) to be latest in establishment. Intercipta Corporation is growing with more products and services. We are developing into Electrical Power Infrastructure. The roadmap is clear that we are developing our businesses with Manpower and Human Resources as our Core of Competence. Trading and Technology also plays a very important role in our portfolio as it supports the Services Sector and also serves as portfolio diversification.
                      </p>
                    </div><!-- /.table-responsive -->
                  </div><!-- /.card-body -->
                  <div class="card-body">
                    @if(Auth::user()->profile?->avatar != null)   
                    <button type="button" class="btn btn-success ml-auto" data-toggle="modal" data-target="#exampleModalScrollable">Apply Pekerjaan Ini</button>
                    @else
                    <span class="badge badge-lg badge-danger"><span class="oi oi-media-record pulse mr-1"></span>Lengkapi Data untuk melamar pekerjaan ini!</span>
                    @endif
                    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
                      <!-- .modal-dialog -->
                      <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <!-- .modal-content -->
                        <div class="modal-content">
                          <!-- .modal-header -->
                          <div class="modal-header">
                            <h5 id="exampleModalScrollableLabel" class="modal-title"> Cek Informasi Data Diri </h5>
                          </div><!-- /.modal-header -->
                          <!-- .modal-body -->
                          <div class="modal-body">
                            <img src="{{ Storage::url(Auth::user()->profile?->avatar) }}" width="300" alt="">
                            <br>
                            <br>
                            <div>
                              <strong>Nama Lengkap</strong>
                              <p>{{ Auth::user()->name }}</p>
                            </div>
                            <div>
                              <strong>Nama Singkatan</strong>
                              <p>{{ Auth::user()->profile?->nickname }}</p>
                            </div>
                            <div>
                              <strong>Alamat</strong>
                              <p>{{ Auth::user()->profile?->address }}</p>
                            </div>
                            <div>
                              <strong>Tempat Tanggal Lahir</strong>
                              <p>{{ Auth::user()->profile?->birth_place }}, {{ Auth::user()->profile?->birth_date }}</p>
                            </div>
                            <div>
                              <strong>Agama</strong>
                              <p>{{ Auth::user()->profile?->religion }}</p>
                            </div>
                            <div>
                              <strong>Status</strong>
                              <p>{{ Auth::user()->profile?->person_status }}</p>
                            </div>
                            <div>
                              <strong>Tinggal Di</strong>
                              <p>{{ Auth::user()->profile?->stay_in }}</p>
                            </div>
                            <div>
                              <strong>Alamat Keluarga</strong>
                              <p>{{ Auth::user()->profile?->family_address }}</p>
                            </div>
                            <div>
                              <strong>Berat & Tinggi</strong>
                              <p>{{ Auth::user()->profile?->weight }} Kg & {{ Auth::user()->profile?->height }} Cm</p>
                            </div>
                            <div>
                              <strong>Hobi</strong>
                              <p>{{ Auth::user()->profile?->hobby }}</p>
                            </div>
                            <div>
                              <strong>No Rekening</strong>
                              <p>{{ Auth::user()->profile?->bank_account }}</p>
                            </div>
                            <div>
                              <strong>Nama Bank</strong>
                              <p>{{ Auth::user()->profile?->bank_name }}</p>
                            </div>
                            <div>
                              <strong>Referensi</strong>
                              <p>{{ Auth::user()->profile?->reference }}</p>
                            </div>
                            <div>
                              <strong>Jabatan Referensi</strong>
                              <p>{{ Auth::user()->profile?->reference_job }}</p>
                            </div>
                            <div>
                              <strong>Hubungan Referensi</strong>
                              <p>{{ Auth::user()->profile?->reference_relation }}</p>
                            </div>
                            <div>
                              <strong>Alamat Referensi</strong>
                              <p>{{ Auth::user()->profile?->reference_address }}</p>
                            </div>
                          </div><!-- /.modal-body -->
                          <!-- .modal-footer -->
                          <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="status" value="0">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="career_id" value="{{ $career->id }}">
                            <div class="modal-footer">
                              <button type="button" class="btn btn-light" data-dismiss="modal">Keluar</button>
                              <button type="submit" class="btn btn-success">Submit</button>
                            </div><!-- /.modal-footer -->
                          </form>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div>
                  </div>
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