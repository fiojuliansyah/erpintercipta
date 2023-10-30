@extends('layouts.master')

@section('title', 'Candidate Detail | InterCipta ERP Management')

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
            <img src="{{ Storage::url($candidate->user?->profile['avatar']) }}" width="350" alt="">
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
                      <h2 id="client-billing-contact-tab" class="card-title"> Informasi Data Diri </h2>
                    </div>
                    @if ( $candidate->status == '0' )  
                      <span class="badge badge-danger">Cek Berkas</span>
                    @elseif ( $candidate->status == '1' )
                      <span class="badge badge-warning">Interview</span>
                    @elseif ( $candidate->status == '2' )
                      <span class="badge badge-info">Training</span>
                    @endif
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <strong>Nama Lengkap</strong>
                            <p>{{ $candidate->user['name'] }}</p>
                        </div>
                        <div class="col-md-3 mb-4">
                            <strong>Nama Panggilan</strong>
                            <p>{{ $candidate->user?->profile['nickname'] }}</p>
                        </div>
                        <div class="col-md-3 mb-4">
                            <strong>Tempat Tanggal Lahir</strong>
                            <p>{{ $candidate->user?->profile['birth_place'] }}, {{ $candidate->user?->profile['birth_date'] }}</p>
                        </div>
                        <div class="col-md-3 mb-4">
                            <strong>Alamat sesuai KTP</strong>
                            <p>{{ $candidate->user?->profile['address'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <strong>Berat Badan</strong>
                            <p>{{ $candidate->user?->profile['weight'] }}</p>
                        </div>
                        <div class="col-md-3 mb-4">
                            <strong>Tinggi Badan</strong>
                            <p>{{ $candidate->user?->profile['height'] }}</p>
                        </div>
                        <div class="col-md-3 mb-4">
                            <strong>No Telepon</strong>
                            <p>{{ $candidate->user['phone'] }}</p>
                        </div>
                        <div class="col-md-3 mb-4">
                            <strong>Email</strong>
                            <p>{{ $candidate->user['email'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <strong>Status</strong>
                            <p>{{ $candidate->user?->profile['person_status'] }}</p>
                        </div>
                        <div class="col-md-3 mb-4">
                            <strong>Tinggal Bersama</strong>
                            <p>{{ $candidate->user?->profile['stay_in'] }}</p>
                        </div>
                        <div class="col-md-3 mb-4">
                            <strong>Tinggal Bersama</strong>
                            <p>{{ $candidate->user?->profile['family_name'] }}</p>
                        </div>
                        <div class="col-md-3 mb-4">
                            <strong>Alamat (Tempat Tinggal)</strong>
                            <p>{{ $candidate->user?->profile['family_address'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <strong>No Rekening</strong>
                            <p>{{ $candidate->user?->profile['bank_account'] }}</p>
                        </div>
                        <div class="col-md-3 mb-4">
                            <strong>Nama BANK</strong>
                            <p>{{ $candidate->user?->profile['bank_name'] }}</p>
                        </div>
                        <div class="col-md-3 mb-4">
                            <strong>Hobi & Kegiatan di waktu luang</strong>
                            <p>{{ $candidate->user?->profile['hobby'] }}</p>
                        </div>
                        <div class="col-md-3 mb-4">
                            <strong>Agama</strong>
                            <p>{{ $candidate->user?->profile['religion'] }}</p>
                        </div>
                    </div>

                    
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
                <div class="card">
                    <!-- .card-body -->
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <h2 id="client-billing-contact-tab" class="card-title"> Informasi Referensi Kerja </h2>
                      </div>
                      <div class="row">
                          <div class="col-md-3 mb-4">
                              <strong>Nama</strong>
                              <p>{{ $candidate->user?->profile['reference'] }}</p>
                          </div>
                          <div class="col-md-3 mb-4">
                              <strong>Pekerjaan / Jabatan</strong>
                              <p>{{ $candidate->user?->profile['reference_job'] }}</p>
                          </div>
                          <div class="col-md-3 mb-4">
                              <strong>Alamat</strong>
                              <p>{{ $candidate->user?->profile['reference_address'] }}</p>
                          </div>
                          <div class="col-md-3 mb-4">
                              <strong>Hubungan</strong>
                              <p>{{ $candidate->user?->profile['reference_relation'] }}</p>
                          </div>
                      </div>
                    </div><!-- /.card-body -->
                </div>
                <!-- .card -->
                <div class="card mt-4">
                  <!-- .card-body -->
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <h2 id="client-billing-contact-tab" class="card-title"> Informasi Dokumen </h2>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <strong>SCAN KTP</strong>
                            <br>
                            <br>
                            <p>{{ $candidate->user->nik_number }}</p>
                            <img src="{{ Storage::url($candidate->user?->profile['card_ktp']) }}" width="300" alt="">
                        </div>
                        <div class="col-md-3 mb-4">
                          <strong>SCAN KARTU KELUARGA</strong>
                          <br>
                          <br>
                          <p>{{ $candidate->user?->profile['family_number'] }}</p>
                          <img src="{{ Storage::url($candidate->user?->profile['card_family']) }}" width="300" alt="">
                        </div>
                        <div class="col-md-3 mb-4">
                            <strong>SCAN IJAZAH</strong>
                            <br>
                            <br>
                            <img src="{{ Storage::url($candidate->user?->profile['card_ijazah']) }}" width="300" alt="">
                        </div>
                        <div class="col-md-3 mb-4">
                            <strong>SCAN SKCK <span class="badge badge-danger">{{ $candidate->user?->profile['active_date'] }}</span></strong>
                            <br>
                            <br>
                            <img src="{{ Storage::url($candidate->user?->profile['card_skck']) }}" width="300" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <strong>SCAN SERITIFKAT</strong>
                            <br>
                            <br>
                            <img src="{{ Storage::url($candidate->user?->profile['card_certificate']) }}" width="350" alt="">
                        </div>
                        <div class="col-md-4 mb-4">
                            <strong>SCAN NPWP</strong>
                            <br>
                            <br>
                            <img src="{{ Storage::url($candidate->user?->profile['card_npwp']) }}" width="350" alt="">
                        </div>
                        <div class="col-md-4 mb-4">
                            <strong>SCAN SIM</strong>
                            <br>
                            <br>
                            <img src="{{ Storage::url($candidate->user?->profile['card_sim']) }}" width="350" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <strong>SCAN {{ $candidate->user?->profile['add_name_document_a'] }}</strong>
                            <br>
                            <br>
                            <img src="{{ Storage::url($candidate->user?->profile['add_document_a']) }}" width="350" alt="">
                        </div>
                        <div class="col-md-4 mb-4">
                            <strong>SCAN {{ $candidate->user?->profile['add_name_document_b'] }}</strong>
                            <br>
                            <br>
                            <img src="{{ Storage::url($candidate->user?->profile['add_document_b']) }}" width="350" alt="">
                        </div>
                        <div class="col-md-4 mb-4">
                            <strong>SCAN {{ $candidate->user?->profile['add_name_document_c'] }}</strong>
                            <br>
                            <br>
                            <img src="{{ Storage::url($candidate->user?->profile['add_document_c']) }}" width="350" alt="">
                        </div>
                    </div>

                  </div><!-- /.card-body -->
                  <!-- .card-footer -->
                  <div class="alert alert-danger"> <span style="color: red">Perhatian:</span> Cek dengan teliti scan dokumen agar tidak terjadi kelolosan data pribadi! </div><!-- /.card-footer -->
                </div><!-- /.card -->
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                          <h2 id="client-billing-contact-tab" class="card-title"> Informasi Riwayat Pekerjaan </h2>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-4">
                                <strong>Nama Perusahaan</strong>
                                <p>{{ $candidate->user?->profile['company_name_a'] }}</p>
                                <p>{{ $candidate->user?->profile['company_name_b'] }}</p>
                                <p>{{ $candidate->user?->profile['company_name_c'] }}</p>
                                <p>{{ $candidate->user?->profile['company_name_d'] }}</p>
                            </div>
                            <div class="col-md-3 mb-4">
                                <strong>Periode</strong>
                                <p>{{ $candidate->user?->profile['period_a'] }}</p>
                                <p>{{ $candidate->user?->profile['period_b'] }}</p>
                                <p>{{ $candidate->user?->profile['period_c'] }}</p>
                                <p>{{ $candidate->user?->profile['period_d'] }}</p>
                            </div>
                            <div class="col-md-3 mb-4">
                                <strong>Posisi / Jabatan</strong>
                                <p>{{ $candidate->user?->profile['position_a'] }}</p>
                                <p>{{ $candidate->user?->profile['position_b'] }}</p>
                                <p>{{ $candidate->user?->profile['position_c'] }}</p>
                                <p>{{ $candidate->user?->profile['position_d'] }}</p>
                            </div>
                            <div class="col-md-3 mb-4">
                                <strong>Gaji yang diterima</strong>
                                <p>{{ $candidate->user?->profile['salary_a'] }}</p>
                                <p>{{ $candidate->user?->profile['salary_b'] }}</p>
                                <p>{{ $candidate->user?->profile['salary_c'] }}</p>
                                <p>{{ $candidate->user?->profile['salary_d'] }}</p>
                            </div>
                        </div>
    
                        
                      </div>
                    </div><!-- /.card-body -->
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                          <h2 id="client-billing-contact-tab" class="card-title"> update Status </h2>
                        </div>
                        <div class="col-md-4 mb-4">
                            <strong>Bukti Transfer</strong>
                            <br>
                            <br>
                            <img src="{{ Storage::url($candidate->user?->profile['transfer']) }}" width="350" alt="">
                        </div>
                        <form action="{{ route('candidates.update',$candidate->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="user_id" value="{{ $candidate->user['id'] }}">
                            <input type="hidden" name="career_id" value="{{ $candidate->career['id'] }}">
                            <div class="form-group">
                                <label for="status">Data Status</label>
                                <select id="status" class="custom-select custom-select-lg d-block w-100" name="status" required="">
                                <option value="{{ $candidate->status }}"></option>
                                <option value="0"> Cek Berkas </option>
                                <option value="1"> Interview </option>
                                <option value="2"> Training </option>
                                <option value="3"> PKWT </option>
                                </select>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-light" data-dismiss="modal">Keluar</button>
                              <button type="submit" class="btn btn-success">Submit</button>
                            </div><!-- /.modal-footer -->
                        </form>
                          <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalScrollable">Buat PKWT</a>
                        </div>
                      </div><!-- /.card-body -->
                    </div>
                    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
                      <!-- .modal-dialog -->
                      <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <!-- .modal-content -->
                        <div class="modal-content">
                          <!-- .modal-header -->
                          <div class="modal-header">
                            <h5 id="exampleModalScrollableLabel" class="modal-title"> Generate SKK/PKWT </h5>
                          </div><!-- /.modal-header -->
                          <!-- .modal-body -->
                          <div class="modal-body">
                            <form action="{{ route('pkwts.store') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="user_id" value="{{ $candidate->user['id'] }}">
                              <input type="hidden" name="company_id" value="{{ $candidate->career?->company['id'] }}">
                              <div class="form-group mb-4">
                                <div class="form-label-group">
                                <input type="text" class="form-control" name="reference_number" required=""> <label for="reference_number">No SURAT</label>
                                </div>
                                <div class="invalid-feedback"> Wajib Diisi! </div>
                              </div>
                              <div class="form-group mb-4">
                                <div class="form-label-group">
                                <input type="text" class="form-control" value="{{ $candidate->career?->company['company'] }}" readonly> <label for="name">Perusahaan</label>
                                </div>
                                <div class="invalid-feedback"> Wajib Diisi! </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-label-group">
                                    <input type="text" class="form-control" value="{{ $candidate->user['name'] }}" readonly> <label for="name">Nama Lengkap (sesuai KTP/Ijazah)</label>
                                    </div>
                                    <div class="invalid-feedback"> Wajib Diisi! </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-label-group">
                                    <input type="text" class="form-control" value="{{ $candidate->user?->profile['gender'] }}" readonly> <label for="name">Jenis Kelamin</label>
                                    </div>
                                    <div class="invalid-feedback"> Wajib Diisi! </div>
                                </div>
                              </div>
                              <div class="form-group mb-4">
                                <div class="form-label-group">
                                <input type="text" class="form-control" value="{{ $candidate->user?->profile['birth_place'] }}, {{ $candidate->user?->profile['birth_date'] }}" readonly> <label for="name">Tempat Tanggal Lahir</label>
                                </div>
                                <div class="invalid-feedback"> Wajib Diisi! </div>
                              </div>
                              <div class="form-group mb-4">
                                <div class="form-label-group">
                                <input type="text" class="form-control" value="{{ $candidate->user?->profile['nik_number'] }}" readonly> <label for="name">No NIK</label>
                                </div>
                                <div class="invalid-feedback"> Wajib Diisi! </div>
                              </div>
                              <div class="form-group mb-4">
                                <div class="form-label-group">
                                <input type="text" class="form-control" value="{{ $candidate->user?->profile['address'] }}" readonly> <label for="name">Alamat</label>
                                </div>
                                <div class="invalid-feedback"> Wajib Diisi! </div>
                              </div>
                              <p> Masukan Tanggal </p>
                              <div class="row">
                                <div class="col-md-3 mb-4">
                                    <div class="form-label-group">
                                    <input type="text" class="form-control" name="date"> <label for="name">Tanggal</label>
                                    </div>
                                    <div class="invalid-feedback"> Wajib Diisi! </div>
                                </div>
                                <div class="col-md-9 mb-4">
                                    <div class="form-label-group">
                                    <input type="text" class="form-control" name="date_abjad"> <label for="name">Abjad</label>
                                    </div>
                                    <div class="invalid-feedback"> Wajib Diisi! </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3 mb-4">
                                    <div class="form-label-group">
                                    <input type="text" class="form-control" name="month"> <label for="name">Bulan</label>
                                    </div>
                                    <div class="invalid-feedback"> Wajib Diisi! </div>
                                </div>
                                <div class="col-md-9 mb-4">
                                    <div class="form-label-group">
                                    <input type="text" class="form-control" name="month_abjad"> <label for="name">Abjad</label>
                                    </div>
                                    <div class="invalid-feedback"> Wajib Diisi! </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3 mb-4">
                                    <div class="form-label-group">
                                    <input type="text" class="form-control" name="year"> <label for="name">Tahun</label>
                                    </div>
                                    <div class="invalid-feedback"> Wajib Diisi! </div>
                                </div>
                                <div class="col-md-9 mb-4">
                                    <div class="form-label-group">
                                    <input type="text" class="form-control" name="year_abjad"> <label for="name">Abjad</label>
                                    </div>
                                    <div class="invalid-feedback"> Wajib Diisi! </div>
                                </div>
                              </div>
                              <p> Penempatan </p>
                              <div class="form-group mb-4">
                                <div class="form-label-group">
                                <input type="text" class="form-control" name="project" required=""> <label for="name">Proyek</label>
                                </div>
                                <div class="invalid-feedback"> Wajib Diisi! </div>
                              </div>
                              <div class="form-group mb-4">
                                <div class="form-label-group">
                                <input type="text" class="form-control" name="area" required=""> <label for="name">Area</label>
                                </div>
                                <div class="invalid-feedback"> Wajib Diisi! </div>
                              </div>
                              <p> Gaji & Tunjangan </p>
                              <div class="form-group mb-4">
                                <div class="form-label-group">
                                <input type="text" class="form-control" name="salary" required=""> <label for="name">Gaji</label>
                                </div>
                                <div class="invalid-feedback"> Wajib Diisi! </div>
                              </div>
                              <div class="form-group mb-4">
                                <div class="form-label-group">
                                <input type="text" class="form-control" name="allowance" required=""> <label for="name">Tunjangan</label>
                                </div>
                                <div class="invalid-feedback"> Wajib Diisi! </div>
                              </div>
                              <br>
                              <br>
                              <div class="form-group mb-4">
                                <div class="form-label-group">
                                <input type="text" class="form-control" name="place" required=""> <label for="palce">Tempat Tanda Terima</label>
                                </div>
                                <div class="invalid-feedback"> Wajib Diisi! </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">CLose</button>
                                <button type="submit" class="btn btn-warning">Submit</button>
                              </div><!-- /.modal-footer -->
                            </form>
                          </div><!-- /.modal-body -->
                          <!-- .modal-footer -->
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
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