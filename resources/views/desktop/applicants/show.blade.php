@extends('desktop.layouts.master')

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
                            <img src="{{ Storage::url($applicant->profile['avatar']) }}" width="350" alt="">
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
                                                    <p>{{ $applicant->name }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Nama Panggilan</strong>
                                                    <p>{{ $applicant->profile['nickname'] }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Tempat Tanggal Lahir</strong>
                                                    <p>{{ $applicant->profile['birth_place'] }},
                                                        {{ $applicant->profile['birth_date'] }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Alamat sesuai KTP</strong>
                                                    <p>{{ $applicant->profile['address'] }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 mb-4">
                                                    <strong>Berat Badan</strong>
                                                    <p>{{ $applicant->profile['weight'] }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Tinggi Badan</strong>
                                                    <p>{{ $applicant->profile['height'] }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>No Telepon</strong>
                                                    <p>{{ $applicant->phone }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Email</strong>
                                                    <p>{{ $applicant->email }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 mb-4">
                                                    <strong>Status</strong>
                                                    <p>{{ $applicant->profile['person_status'] }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Tinggal Bersama</strong>
                                                    <p>{{ $applicant->profile['stay_in'] }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Tinggal Bersama</strong>
                                                    <p>{{ $applicant->profile['family_name'] }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Alamat (Tempat Tinggal)</strong>
                                                    <p>{{ $applicant->profile['family_address'] }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 mb-4">
                                                    <strong>No Rekening</strong>
                                                    <p>{{ $applicant->profile['bank_account'] }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Nama BANK</strong>
                                                    <p>{{ $applicant->profile['bank_name'] }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Hobi & Kegiatan di waktu luang</strong>
                                                    <p>{{ $applicant->profile['hobby'] }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Agama</strong>
                                                    <p>{{ $applicant->profile['religion'] }}</p>
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
                                                    <p>{{ $applicant->profile['reference'] }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Pekerjaan / Jabatan</strong>
                                                    <p>{{ $applicant->profile['reference_job'] }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Alamat</strong>
                                                    <p>{{ $applicant->profile['reference_address'] }}</p>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <strong>Hubungan</strong>
                                                    <p>{{ $applicant->profile['reference_relation'] }}</p>
                                                </div>
                                            </div>
                                        </div><!-- /.card-body -->
                                    </div>
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h2 id="client-billing-contact-tab" class="card-title"> Informasi Dokumen
                                                </h2>
                                            </div>
                                            <div class="card">
                                                @foreach ($documents as $doc)
                                                    <div class="card-body">
                                                        <strong>{{ $doc->type ?? '' }}</strong>
                                                        <br>
                                                        <br>
                                                        <p>{{ $doc->title ?? '' }}</p>
                                                        <img src="{{ $doc->file_url ?? '' }}"
                                                            width="300" alt="">
                                                    </div>   
                                                @endforeach
                                            </div>
                                        </div><!-- /.card-body -->
                                        <!-- .card-footer -->
                                        <div class="alert alert-danger"> <span style="color: red">Perhatian:</span> Cek
                                            dengan teliti scan dokumen agar tidak terjadi kelolosan data pribadi! </div>
                                        <!-- /.card-footer -->
                                    </div>
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
                                                <input type="hidden" name="status" value="0">
                                                <input type="hidden" name="user_id" value="{{ $applicant->id }}">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="bss3">Pilih Penempatan</label>
                                                        <select id="bss3" data-toggle="selectpicker" data-live-search="true" data-width="100%" name="career_id">
                                                        <option value="">Pilih</option>
                                                        @foreach ($careers as $career)
                                                        <option value="{{ $career->id }}">
                                                            {{ $career->jobname }} || {{ $career->location }}
                                                        </option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
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

@push('js')
<script>
    document.getElementById("searchCareer").addEventListener("input", function () {
        var input, filter, select, option, i;
        input = this;
        filter = input.value.toUpperCase();
        select = document.getElementById("career_id");
        option = select.getElementsByTagName("option");

        for (i = 0; i < option.length; i++) {
            txtValue = option[i].textContent || option[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                option[i].style.display = "";
            } else {
                option[i].style.display = "none";
            }
        }
    });
</script>
<script src="{{ asset('') }}admin/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
@endpush