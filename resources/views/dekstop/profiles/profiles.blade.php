@extends('dekstop.layouts.master')

@section('title', 'User Profile | InterCipta ERP Management')

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
          <h1 class="page-title"> Data Diri </h1>
          <p style="color: red"> Isilah data diri Anda secara jujur, benar, dan lengkap. Saya menyatakan dengan sesungguhnya bahwa segala keterangan yang saya berikan dalam Formulir ini adalah benar adanya dan saya memahami jika saya memberikan keterangan yang tidak benar atau dipalsukan, maka saya bersedia mempertanggungjawabkannya di hadapan hukum. </p>
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
                        <a href="#" class="step-trigger" tabindex="-1"><span class="step-indicator step-indicator-icon"><i class="oi oi-person"></i></span> <span class="d-none d-sm-inline">Identitas Diri</span></a>
                      </li>
                      <li class="step" data-target="#test-l-2" data-validate="fieldset02">
                        <a href="#" class="step-trigger" tabindex="-1"><span class="step-indicator step-indicator-icon"><i class="oi oi-paperclip"></i></span> <span class="d-none d-sm-inline">Upload Dokumen</span></a>
                      </li>
                      <li class="step" data-target="#test-l-3" data-validate="fieldset03">
                        <a href="#" class="step-trigger" tabindex="-1"><span class="step-indicator step-indicator-icon"><i class="oi oi-briefcase"></i></span> <span class="d-none d-sm-inline">Riwayat Pekerjaan</span></a>
                      </li>
                      <li class="step" data-target="#test-l-4" data-validate="agreement">
                        <a href="#" class="step-trigger" tabindex="-1"><span class="step-indicator step-indicator-icon"><i class="oi oi-check"></i></span> <span class="d-none d-sm-inline">konfirmasi</span></a>
                      </li>
                    </ul>
                  </div><!-- /.steps -->
                </div><!-- /.card-header -->
                <!-- .card-body -->
                <div class="card-body">
                  <form action="{{ url('profiles') }}" method="POST" enctype="multipart/form-data" id="stepper-form" class="p-lg-4 p-sm-3 p-0">
                    @csrf
                    <div id="test-l-1" class="content dstepper-none fade">
                      <!-- fieldset -->
                      <fieldset>
                        <legend>Yuk isi dulu data diri Anda dengan jelas dan lengkap!</legend> <!-- .form-group -->
                        <div class="row">
                          <div class="col-md-3 mb-4">
                            <img src="{{ Storage::url(Auth::user()->profile?->avatar) }}" width="300" alt="">
                          </div>
                          <div class="col-md-9 mb-4">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="avatar" id="avatar" autocomplete="off" data-parsley-group="fieldset01" multiple=""> <label class="custom-file-label" for="avatar">Masukan Foto Diri</label>
                              <small>*hanya bisa jpg, jpeg, png</small>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" value="{{ Auth::user()->name }}" autocomplete="off" data-parsley-group="fieldset01" readonly> <label for="name">Nama Lengkap (sesuai KTP/Ijazah)</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="nickname" value="{{ Auth::user()->profile?->nickname }}" autocomplete="off" data-parsley-group="fieldset01" required=""> <label for="nickname">Nama Panggilan</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                        </div>

                        <div class="form-group mb-4">
                          <div class="form-label-group">
                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->profile?->address }}" autocomplete="off" data-parsley-group="fieldset01" required=""> <label for="address">Alamat</label>
                          </div>
                        </div>

                        <div class="row">
                          <!-- grid column -->
                          <div class="col-md-4 mb-4">
                            <div class="form-label-group">
                              <input type="text" id="birth_place" class="form-control" name="birth_place" value="{{ Auth::user()->profile?->birth_place }}" data-parsley-group="fieldset01" required=""> <label for="birth_place">Tempat Lahir</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div><!-- /grid column -->
                          <!-- grid column -->
                          <div class="col-md-4 mb-4">
                            <div class="form-label-group">
                              <label for="birth_day">Tanggal Lahir</label>
                              <input type="date" id="birth_date" class="form-control" name="birth_date" value="{{ Auth::user()->profile?->birth_date }}" data-parsley-group="fieldset01" required="">
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div><!-- /grid column -->
                          <div class="col-md-4 mb-4">
                            <div class="form-label-group">
                              <input type="text" id="religion" name="religion" value="{{ Auth::user()->profile?->religion }}" class="form-control" autocomplete="off" data-parsley-group="fieldset01" required=""> <label for="religion">Agama</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                        </div>

                        <div class="form-group mb-4">
                          <div class="form-label-group">
                            <select class="custom-select" name="person_status" id="person_status" data-parsley-group="fieldset01" required="">
                              <option value="{{ Auth::user()->profile?->person_status }}">{{ Auth::user()->profile?->person_status }}</option>
                              <option value="TK-0"> TK-0 : Tidak Kawin (lajang/janda/duda) </option>
                              <option value="TK-1"> TK-1 : Duda/Janda (punya anak 1) </option>
                              <option value="TK-2"> TK-2 : Duda/Janda (punya anak 2) </option>
                              <option value="TK-3"> TK-3 : Duda/Janda (punya anak 3) </option>
                              <option value="K-0"> K-0 : Kawin </option>
                              <option value="K-1"> K-1 : Kawin (punya anak 1) </option>
                              <option value="K-2"> K-2 : Kawin (punya anak 2) </option>
                              <option value="K-3"> K-3 : Kawin (punya anak 3) </option>
                            </select> <label for="fls1">Status Perkawinan</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-4">
                            <div class="form-label-group">
                              <select class="custom-select" name="stay_in" id="stay_in" data-parsley-group="fieldset01" required="">
                                <option value="{{ Auth::user()->profile?->stay_in }}">{{ Auth::user()->profile?->stay_in }}</option>
                                <option value="Rumah Sendiri"> Rumah Sendiri </option>
                                <option value="Orang Tua"> Orang Tua </option>
                                <option value="Saudara/Family"> Saudara/Family </option>
                                <option value="KOS"> KOS </option>
                              </select> <label for="fls1">Tinggal Bersama</label>
                            </div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="family_name" value="{{ Auth::user()->profile?->family_name }}" autocomplete="off" data-parsley-group="fieldset01"> <label for="family_name">Nama Saudara/Family, KOS, Pemilik Rumah <small><strong>(opsional)</strong></small></label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group mb-4">
                          <div class="form-label-group">
                            <input type="text" class="form-control" name="family_address" value="{{ Auth::user()->profile?->family_Address }}" autocomplete="off" data-parsley-group="fieldset01"> <label for="family_address">Alamat Saudara/Family, KOS, Pemilik Rumah <small><strong>(opsional)</strong></small></label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4 mb-4">
                            <div class="form-label-group input-group input-group-alt">
                              <input type="text" id="weight" class="form-control" name="weight" value="{{ Auth::user()->profile?->weight }}" data-parsley-group="fieldset01" required=""> <label for="weight">Berat Badan</label>
                              <div class="input-group-append">
                                <span class="input-group-text">Kg</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 mb-4">
                            <div class="form-label-group input-group input-group-alt">
                              <input type="text" id="height" class="form-control" name="height" value="{{ Auth::user()->profile?->height }}" data-parsley-group="fieldset01" required=""> <label for="height">Tinggi Badan</label>
                              <div class="input-group-append">
                                <span class="input-group-text">Cm</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 mb-4">
                            <div class="form-label-group">
                              <input type="text" id="hobby" class="form-control" name="hobby" value="{{ Auth::user()->profile?->hobby }}" data-parsley-group="fieldset01"> <label for="hobby">Hobby & Kegiatan di waktu  Luang <small><strong>(opsional)</strong></small></label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="bank_account" value="{{ Auth::user()->profile?->bank_account }}" autocomplete="off" data-parsley-group="fieldset01" required=""> <label for="bank_account">No Rekening</label>
                            </div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <div class="form-label-group">
                              <select class="custom-select" name="bank_name" id="bank_name" data-parsley-group="fieldset01" required="">
                                <option value="{{ Auth::user()->profile?->bank_name }}">{{ Auth::user()->profile?->bank_name }}</option>
                                <option value="BCA"> BCA </option>
                                <option value="BRI"> BRI </option>
                                <option value="MANDIRI"> MANDIRI </option>
                                <option value="CIMB NIAGA"> CIMB NIAGA </option>
                                <option value="BNI"> BNI </option>
                                <option value="DANAMON"> DANAMON </option>
                                <option value="ARTHA GRAHA"> ARTHA GRAHA </option>
                              </select> <label for="fls1">Pilih BANK</label>
                            </div>
                          </div>
                        </div>
                        <legend>Referensi dan Info Pekerjaan <small style="color: gold"><strong>(opsional)</strong></small></legend>
                        <div class="form-group mb-4">
                          <div class="form-label-group">
                            <input type="text" id="reference" class="form-control" name="reference" value="{{ Auth::user()->profile?->reference }}" data-parsley-group="fieldset01"> <label for="reference">Referensi</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="reference_job" value="{{ Auth::user()->profile?->reference_job }}" autocomplete="off" data-parsley-group="fieldset01"> <label for="reference_job">Pekerjaan/Jabatan</label>
                            </div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="reference_relation" value="{{ Auth::user()->profile?->reference_relation }}" autocomplete="off" data-parsley-group="fieldset01"> <label for="reference_relation">Hubungan</label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group mb-4">
                          <div class="form-label-group">
                            <input type="text" id="reference_address" class="form-control" value="{{ Auth::user()->profile?->reference_address }}" name="reference_address" data-parsley-group="fieldset01"> <label for="reference_address">Alamat</label>
                          </div>
                        </div>

                        <hr class="mt-5">
                        <!-- .d-flex -->
                        <div class="d-flex">
                          <button type="button" class="next btn btn-primary ml-auto" data-validate="fieldset01">Next step</button>
                        </div><!-- /.d-flex -->
                      </fieldset><!-- /fieldset -->
                    </div>
                    <div id="test-l-2" class="content dstepper-none fade">
                      <!-- fieldset -->
                      <fieldset>
                        <legend>Dokumen <small style="color: red"><strong>(wajib)</strong></small></legend> <!-- .row -->
                        <img src="{{ Storage::url(Auth::user()->profile?->card_ktp) }}" width="300" alt="">
                        <br>
                        <br>
                        <div class="form-group mb-4">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="card_ktp" id="card_ktp" autocomplete="off" data-parsley-group="fieldset02" multiple=""> <label class="custom-file-label" for="card_ktp">Upload SCAN KTP</label>
                          </div>
                        </div>
                        <img src="{{ Storage::url(Auth::user()->profile?->card_ijazah) }}" width="300" alt="">
                        <br>
                        <br>
                        <div class="form-group mb-4">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="card_ijazah" id="card_ijazah" autocomplete="off" data-parsley-group="fieldset02" multiple=""> <label class="custom-file-label" for="card_ijazah">Upload SCAN Ijazah Terakhir</label>
                          </div>
                        </div>
                        <!-- .form-group -->
                        <img src="{{ Storage::url(Auth::user()->profile?->card_skck) }}" width="300" alt="">
                        <br>
                        <br>
                        <div class="row">
                          <div class="col-md-6 mb-4">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="card_skck" id="card_skck" autocomplete="off" data-parsley-group="fieldset02" multiple=""> <label class="custom-file-label" for="card_skck">Upload SCAN SKCK</label>
                            </div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <div class="form-label-group">
                              <label for="active_date">Masa Berlaku SKCK</label>
                              <input type="date" id="active_date" class="form-control" name="active_date" data-parsley-group="fieldset02">
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                        </div>
                        <legend>Dokumen <small style="color: gold"><strong>(opsional)</strong></small></legend>
                        <img src="{{ Storage::url(Auth::user()->profile?->card_certificate) }}" width="300" alt="">
                        <br>
                        <br>
                        <div class="form-group mb-4">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="card_certificate" id="card_certificate" autocomplete="off" data-parsley-group="fieldset02" multiple=""> <label class="custom-file-label" for="card_certificate">Upload SCAN Sertifikat</label>
                          </div>
                        </div>
                        <img src="{{ Storage::url(Auth::user()->profile?->card_sim) }}" width="300" alt="">
                        <br>
                        <br>
                        <div class="form-group mb-4">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="card_sim" id="card_sim" autocomplete="off" data-parsley-group="fieldset02" multiple=""> <label class="custom-file-label" for="card_sim">Upload SCAN SIM</label>
                          </div>
                        </div>
                        <img src="{{ Storage::url(Auth::user()->profile?->card_npwp) }}" width="300" alt="">
                        <br>
                        <br>
                        <div class="form-group mb-4">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="card_npwp" id="card_npwp" autocomplete="off" data-parsley-group="fieldset02" multiple=""> <label class="custom-file-label" for="card_npwp">Upload SCAN NPWP</label>
                          </div>
                        </div>
                        <legend>Dokumen <small style="color: dodgerblue"><strong>(tambahan)</strong></small></legend>
                        <div class="row">
                          <div class="col-md-6 mb-4">
                            <div class="form-label-group">
                              <input type="text" name="add_name_document_a" id="add_name_document_a" class="form-control" autocomplete="off" data-parsley-group="fieldset02"> <label for="add_name_document_a">Nama Dokumen</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="add_Document_a" id="add_Document_a" autocomplete="off" data-parsley-group="fieldset02" multiple=""> <label class="custom-file-label" for="add_Document_a">Upload Foto Dokumen</label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6 mb-4">
                            <div class="form-label-group">
                              <input type="text" name="add_name_document_b" id="add_name_document_b" class="form-control" autocomplete="off" data-parsley-group="fieldset02"> <label for="add_name_document_b">Nama Dokumen</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="add_Document_b" id="add_Document_b" autocomplete="off" data-parsley-group="fieldset02" multiple=""> <label class="custom-file-label" for="add_Document_b">Upload Foto Dokumen</label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6 mb-4">
                            <div class="form-label-group">
                              <input type="text" name="add_name_document_c" id="add_name_document_c" class="form-control" autocomplete="off" data-parsley-group="fieldset02"> <label for="add_name_document_c">Nama Dokumen</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="add_Document_c" id="add_Document_c" autocomplete="off" data-parsley-group="fieldset02" multiple=""> <label class="custom-file-label" for="add_Document_c">Upload Foto Dokumen</label>
                            </div>
                          </div>
                        </div>
                        <hr class="mt-5">
                        <div class="d-flex">
                          <button type="button" class="prev btn btn-secondary">Kembali</button> <button type="button" class="next btn btn-primary ml-auto" data-validate="fieldset02">Next step</button>
                        </div>
                      </fieldset><!-- /fieldset -->
                    </div>
                    <div id="test-l-3" class="content dstepper-none fade">
                      <!-- fieldset -->
                      <fieldset>
                        <legend>Riwayat Pekerjaan</legend>
                        <div class="row">
                          <div class="col-md-3 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="company_name_a"  value="{{ Auth::user()->profile?->company_name_a }}" autocomplete="off" data-parsley-group="fieldset03"> <label for="company_name">Nama Perusahaan</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                          <div class="col-md-3 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="period_a" value="{{ Auth::user()->profile?->period_a }}" autocomplete="off" data-parsley-group="fieldset03"> <label for="period">Periode</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                          <div class="col-md-3 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="position_a" value="{{ Auth::user()->profile?->position_a }}" autocomplete="off" data-parsley-group="fieldset03"> <label for="period">Posisi / Jabatan</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                          <div class="col-md-3 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="salary_a" value="{{ Auth::user()->profile?->salary_a }}" autocomplete="off" data-parsley-group="fieldset03"> <label for="salary">Gaji yang Diterima</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="company_name_b" value="{{ Auth::user()->profile?->company_name_b }}" autocomplete="off" data-parsley-group="fieldset03"> <label for="company_name">Nama Perusahaan</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                          <div class="col-md-3 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="period_b" value="{{ Auth::user()->profile?->period_b }}" autocomplete="off" data-parsley-group="fieldset03"> <label for="period">Periode</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                          <div class="col-md-3 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="position_b" value="{{ Auth::user()->profile?->position_b }}" autocomplete="off" data-parsley-group="fieldset03"> <label for="period">Posisi / Jabatan</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                          <div class="col-md-3 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="salary_b" value="{{ Auth::user()->profile?->salary_b }}" autocomplete="off" data-parsley-group="fieldset03"> <label for="salary">Gaji yang Diterima</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="company_name_c" value="{{ Auth::user()->profile?->company_name_c }}" autocomplete="off" data-parsley-group="fieldset03"> <label for="company_name">Nama Perusahaan</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                          <div class="col-md-3 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="period_c" value="{{ Auth::user()->profile?->period_c }}" autocomplete="off" data-parsley-group="fieldset03"> <label for="period">Periode</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                          <div class="col-md-3 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="position_c" value="{{ Auth::user()->profile?->position_c }}" autocomplete="off" data-parsley-group="fieldset03"> <label for="period">Posisi / Jabatan</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                          <div class="col-md-3 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="salary_c" value="{{ Auth::user()->profile?->salary_c }}" autocomplete="off" data-parsley-group="fieldset03"> <label for="salary">Gaji yang Diterima</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="company_name_d" value="{{ Auth::user()->profile?->company_name_d }}" autocomplete="off" data-parsley-group="fieldset03"> <label for="company_name">Nama Perusahaan</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                          <div class="col-md-3 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="period_d" value="{{ Auth::user()->profile?->period_d }}" autocomplete="off" data-parsley-group="fieldset03"> <label for="period">Periode</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                          <div class="col-md-3 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="position_d" value="{{ Auth::user()->profile?->position_d }}" autocomplete="off" data-parsley-group="fieldset03"> <label for="period">Posisi / Jabatan</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                          <div class="col-md-3 mb-4">
                            <div class="form-label-group">
                              <input type="text" class="form-control" name="salary_d" value="{{ Auth::user()->profile?->salary_d }}" autocomplete="off" data-parsley-group="fieldset03"> <label for="salary">Gaji yang Diterima</label>
                            </div>
                            <div class="invalid-feedback"> Wajib Diisi! </div>
                          </div>
                        </div>
                        <hr class="mt-5">
                        <div class="d-flex">
                          <button type="button" class="prev btn btn-secondary">Kembali</button> <button type="button" class="next btn btn-primary ml-auto" data-validate="fieldset03">Next step</button>
                        </div>
                      </fieldset><!-- /fieldset -->
                    </div>
                    <div id="test-l-4" class="content dstepper-none fade">
                      <!-- fieldset -->
                      <fieldset>
                        <legend>Konfirmasi Data Diri</legend> <!-- .card -->
                        <div class="card bg-light">
                          <div class="card-body overflow-auto" style="height: 260px">
                            <p>Isilah data diri Anda secara jujur, benar, dan lengkap. Saya menyatakan dengan sesungguhnya bahwa segala keterangan yang saya berikan dalam Formulir ini adalah benar adanya dan saya memahami jika saya memberikan keterangan yang tidak benar atau dipalsukan, maka saya bersedia mempertanggungjawabkannya di hadapan hukum.</p>
                          </div>
                        </div><!-- /.card -->
                        <!-- .form-group -->
                        <div class="form-group">
                          <!-- .custom-control -->
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="agreement" name="agreement" class="custom-control-input" data-parsley-group="agreement" required=""> <label class="custom-control-label" for="agreement">Setuju dengan Ketentuan yang Berlaku</label>
                          </div><!-- /.custom-control -->
                        </div><!-- /.form-group -->
                        <hr class="mt-5">
                        <div class="d-flex">
                          <button type="button" class="prev btn btn-secondary">Kembali</button>
                          <button type="submit" class="btn btn-primary ml-auto">Kirim</button>
                        </div>
                      </fieldset><!-- /fieldset -->
                    </div>
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
    <div class="copyright"> Copyright © 2018. All right reserved. </div>
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