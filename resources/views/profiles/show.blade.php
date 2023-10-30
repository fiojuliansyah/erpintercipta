@extends('layouts.master')

@section('title', 'applicant Detail | InterCipta ERP Management')

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
                            <img src="{{ Storage::url($profile->avatar) }}" width="350" alt="">
                        </div>
                    </header><!-- /.page-title-bar -->
                    <!-- .page-section -->
                    <div class="page-section">
                        <!-- .section-block -->
                        <div class="section-block">
                            <!-- page content goes here -->
                            <div class="tab-content pt-4" id="clientDetailsTabs">
                                <!-- .tab-pane -->
                                <div class="tab-pane fade show active" id="client-billing-contact" role="tabpanel"
                                    aria-labelledby="client-billing-contact-tab">
                                    <!-- .card -->
                                    <div class="card">
                                        <!-- .card-body -->
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h2 id="client-billing-contact-tab" class="card-title"> Informasi Data Diri
                                                </h2>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 mb-4">
                                                    <strong>Nama Lengkap</strong>
                                                    <p>{{ $profile->user['name'] }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Nama Panggilan</strong>
                                                    <p>{{ $profile->nickname }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Tempat Tanggal Lahir</strong>
                                                    <p>{{ $profile->birth_place }},
                                                        {{ $profile->birth_date }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Alamat sesuai KTP</strong>
                                                    <p>{{ $profile->address }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 mb-4">
                                                    <strong>Berat Badan</strong>
                                                    <p>{{ $profile->weight }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Tinggi Badan</strong>
                                                    <p>{{ $profile->height }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>No Telepon</strong>
                                                    <p>{{ $profile->user['phone'] }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Email</strong>
                                                    <p>{{ $profile->user['email'] }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 mb-4">
                                                    <strong>Status</strong>
                                                    <p>{{ $profile->person_status }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Tinggal Bersama</strong>
                                                    <p>{{ $profile->stay_in }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Tinggal Bersama</strong>
                                                    <p>{{ $profile->family_name }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Alamat (Tempat Tinggal)</strong>
                                                    <p>{{ $profile->family_address }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 mb-4">
                                                    <strong>No Rekening</strong>
                                                    <p>{{ $profile->bank_account }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Nama BANK</strong>
                                                    <p>{{ $profile->bank_name }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Hobi & Kegiatan di waktu luang</strong>
                                                    <p>{{ $profile->hobby }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Agama</strong>
                                                    <p>{{ $profile->religion }}</p>
                                                </div>
                                            </div>


                                        </div><!-- /.card-body -->
                                    </div><!-- /.card -->
                                    <div class="card">
                                        <!-- .card-body -->
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h2 id="client-billing-contact-tab" class="card-title"> Informasi Referensi
                                                    Kerja </h2>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 mb-4">
                                                    <strong>Nama</strong>
                                                    <p>{{ $profile->reference }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Pekerjaan / Jabatan</strong>
                                                    <p>{{ $profile->reference_job }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Alamat</strong>
                                                    <p>{{ $profile->reference_address }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Hubungan</strong>
                                                    <p>{{ $profile->reference_relation }}</p>
                                                </div>
                                            </div>
                                        </div><!-- /.card-body -->
                                    </div>
                                    <!-- .card -->
                                    <div class="card mt-4">
                                        <!-- .card-body -->
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h2 id="client-billing-contact-tab" class="card-title"> Informasi Dokumen
                                                </h2>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 mb-4">
                                                    <strong>SCAN KTP</strong>
                                                    <br>
                                                    <br>
                                                    <p>{{ $profile->user['nik_number'] }}</p>
                                                    <img src="{{ Storage::url($profile->card_ktp) }}" width="300"
                                                        alt="">
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>SCAN KARTU KELUARGA</strong>
                                                    <br>
                                                    <br>
                                                    <p>{{ $profile->family_number }}</p>
                                                    <img src="{{ Storage::url($profile->card_family) }}" width="300"
                                                        alt="">
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>SCAN IJAZAH</strong>
                                                    <br>
                                                    <br>
                                                    <img src="{{ Storage::url($profile->card_ijazah) }}" width="300"
                                                        alt="">
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>SCAN SKCK <span
                                                            class="badge badge-danger">{{ $profile->active_date }}</span></strong>
                                                    <br>
                                                    <br>
                                                    <img src="{{ Storage::url($profile->card_skck) }}" width="300"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 mb-4">
                                                    <strong>SCAN SERITIFKAT</strong>
                                                    <br>
                                                    <br>
                                                    <img src="{{ Storage::url($profile->card_certificate) }}"
                                                        width="350" alt="">
                                                </div>
                                                <div class="col-md-4 mb-4">
                                                    <strong>SCAN NPWP</strong>
                                                    <br>
                                                    <br>
                                                    <img src="{{ Storage::url($profile->card_npwp) }}" width="350"
                                                        alt="">
                                                </div>
                                                <div class="col-md-4 mb-4">
                                                    <strong>SCAN SIM</strong>
                                                    <br>
                                                    <br>
                                                    <img src="{{ Storage::url($profile->card_sim) }}" width="350"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 mb-4">
                                                    <strong>SCAN
                                                        {{ $profile->add_name_document_a }}</strong>
                                                    <br>
                                                    <br>
                                                    <img src="{{ Storage::url($profile->add_document_a) }}" width="350"
                                                        alt="">
                                                </div>
                                                <div class="col-md-4 mb-4">
                                                    <strong>SCAN
                                                        {{ $profile->add_name_document_b }}</strong>
                                                    <br>
                                                    <br>
                                                    <img src="{{ Storage::url($profile->add_document_b) }}" width="350"
                                                        alt="">
                                                </div>
                                                <div class="col-md-4 mb-4">
                                                    <strong>SCAN
                                                        {{ $profile->add_name_document_c }}</strong>
                                                    <br>
                                                    <br>
                                                    <img src="{{ Storage::url($profile->add_document_c) }}" width="350"
                                                        alt="">
                                                </div>
                                            </div>

                                        </div><!-- /.card-body -->
                                        <!-- .card-footer -->
                                        <div class="alert alert-danger"> <span style="color: red">Perhatian:</span> Cek
                                            dengan teliti scan dokumen agar tidak terjadi kelolosan data pribadi! </div>
                                        <!-- /.card-footer -->
                                    </div><!-- /.card -->
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h2 id="client-billing-contact-tab" class="card-title"> Informasi Riwayat
                                                    Pekerjaan </h2>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 mb-4">
                                                    <strong>Nama Perusahaan</strong>
                                                    <p>{{ $profile->company_name_a }}</p>
                                                    <p>{{ $profile->company_name_b }}</p>
                                                    <p>{{ $profile->company_name_c }}</p>
                                                    <p>{{ $profile->company_name_d }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Periode</strong>
                                                    <p>{{ $profile->period_a }}</p>
                                                    <p>{{ $profile->period_b }}</p>
                                                    <p>{{ $profile->period_c }}</p>
                                                    <p>{{ $profile->period_d }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Posisi / Jabatan</strong>
                                                    <p>{{ $profile->position_a }}</p>
                                                    <p>{{ $profile->position_b }}</p>
                                                    <p>{{ $profile->position_c }}</p>
                                                    <p>{{ $profile->position_d }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Gaji yang diterima</strong>
                                                    <p>{{ $profile->salary_a }}</p>
                                                    <p>{{ $profile->salary_b }}</p>
                                                    <p>{{ $profile->salary_c }}</p>
                                                    <p>{{ $profile->salary_d }}</p>
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
                                        <a type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#exampleModalScrollable">Update Lowongan</a>
                                    </div>
                                </div><!-- /.card-body -->
                            </div>
                            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
                                <!-- .modal-dialog -->
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <!-- .modal-content -->
                                    <div class="modal-content">
                                        <!-- .modal-header -->
                                        <div class="modal-header">
                                            <h5 id="exampleModalScrollableLabel" class="modal-title"> pilih Penempatan
                                                Lowongan
                                            </h5>
                                        </div><!-- /.modal-header -->
                                        <!-- .modal-body -->
                                        <div class="modal-body">
                                            <form action="{{ route('applicants.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $profile->user['id'] }}">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="customername">Perusahaan</label>
                                                        <select id="career_id"
                                                            class="custom-select custom-select-lg d-block w-100"
                                                            name="career_id" required="">
                                                            <option value=""> pilih Lowongan </option>
                                                            @foreach ($careers as $career)
                                                                <option value="{{ $career->id }}">
                                                                    {{ $career->jobname }} || {{ $career->location }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-dismiss="modal">CLose</button>
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
