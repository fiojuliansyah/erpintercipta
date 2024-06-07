@extends('mobiles.layouts.master')

@section('title', 'Pelamar | Intercipta Mobile')

@section('content')
    <div class="page-content">

        <div class="page-title page-title-small">
            <h2>Pelamar</h2>
        </div>
        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
        </div>

        <div class="card card-style">
            <div class="content">
                <div class="d-flex">
                    <div>
                        <img src="{{ Storage::url($applicant?->profile['avatar'] ?? 'Tidak ada Data') }}" width="50"
                            class="mr-3 bg-highlight rounded-xl">
                    </div>
                    <div>
                        <h1 class="mb-0 pt-1">{{ $applicant->name }}</h1>
                        <p class="color-highlight font-11 mt-n2 mb-3">{{ $applicant->nik_number }}</p>
                    </div>
                </div>
                <p>
                    {{ $applicant->email }}
                </p>
            </div>
        </div>

        <div class="card card-style">
            <div class="content mb-0">
                <h3 class="font-600">Informasi Diri</h3>
                <br>
                <div style="display: flex;">
                    <div style="margin-right: 30px;">
                        <h6>Nama</h6>
                        <p>{{ $applicant->name }}</p>
                    </div>
                    <div style="margin-right: 30px;">
                        <h6>Panggilan</h6>
                        <p>{{ $applicant->profile['nickname'] ?? '' }}</p>
                    </div>
                    <div>
                        <h6>handphone</h6>
                        <p>{{ $applicant->phone }}</p>
                    </div>
                </div>
                <br>
                <div style="display: flex;">
                    <div style="margin-right: 30px;">
                        <h6>Alamat</h6>
                        <p>{{ $applicant->profile['address'] ?? '' }}</p>
                    </div>
                </div>
                <br>
                <div style="display: flex;">
                    <div style="margin-right: 30px;">
                        <h6>Ibu Kandung</h6>
                        <p>{{ $applicant->profile['mother_name'] ?? '' }}</p>
                    </div>
                    <div style="margin-right: 30px;">
                        <h6>Status</h6>
                        <p>{{ $applicant->profile['person_status'] ?? '' }}</p>
                    </div>
                    <div>
                        <h6>Agama</h6>
                        <p>{{ $applicant->profile['religion'] ?? '' }}</p>
                    </div>
                </div>
                <br>
                <div style="display: flex;">
                    <div style="margin-right: 30px;">
                        <h6>Jenis Kelamin</h6>
                        <p>{{ $applicant->profile['gender'] ?? '' }}</p>
                    </div>
                    <div style="margin-right: 30px;">
                        <h6>Tinggi</h6>
                        <p>{{ $applicant->profile['height'] ?? '' }} Cm</p>
                    </div>
                    <div>
                        <h6>Berat</h6>
                        <p>{{ $applicant->profile['weight'] ?? '' }} Kg</p>
                    </div>
                </div>
                <br>
                <div style="display: flex;">
                    <div style="margin-right: 30px;">
                        <h6>Tinggal Bersama</h6>
                        <p>{{ $applicant->profile['stay_in'] ?? '' }}</p>
                    </div>
                    <div style="margin-right: 30px;">
                        <h6>Nama Keluarga</h6>
                        <p>{{ $applicant->profile['family_name'] ?? '' }}</p>
                    </div>
                </div>
                <br>
                <div style="display: flex;">
                    <div style="margin-right: 30px;">
                        <h6>Alamat Keluarga</h6>
                        <p>{{ $applicant->profile['family_address'] ?? '' }}</p>
                    </div>
                </div>
                <br>
            </div>
        </div>

        <div class="card card-style">
            <div class="content mb-0">
                <h3 class="font-600">Informasi BANK</h3>
                <br>
                <div style="display: flex;">
                    <div style="margin-right: 30px;">
                        <h6>Bank</h6>
                        <p>{{ $applicant->profile['bank_name'] ?? '' }}</p>
                    </div>
                    <div style="margin-right: 30px;">
                        <h6>Nama</h6>
                        <p>{{ $applicant['name'] ?? '' }}</p>
                    </div>
                    <div>
                        <h6>Rekening</h6>
                        <p>{{ $applicant->profile['bank_account'] ?? '' }}</p>
                    </div>
                </div>
                <br>
            </div>
        </div>

        <div class="card card-style">
            <div class="content mb-0">
                <h3 class="font-600">Referensi</h3>
                <br>
                <div style="display: flex;">
                    <div style="margin-right: 30px;">
                        <h6>Nama</h6>
                        <p>{{ $applicant->profile['reference'] ?? '' }}</p>
                    </div>
                    <div style="margin-right: 30px;">
                        <h6>Pekerjaan</h6>
                        <p>{{ $applicant['reference_job'] ?? '' }}</p>
                    </div>
                    <div>
                        <h6>Hubungan</h6>
                        <p>{{ $applicant->profile['reference_relation'] ?? '' }}</p>
                    </div>
                </div>
                <br>
                <div style="display: flex;">
                    <div style="margin-right: 30px;">
                        <h6>Alamat</h6>
                        <p>{{ $applicant->profile['reference_address'] ?? '' }}</p>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <div class="content mb-0">
            <div class="row">
                <div class="col-6">
                    <a href="#" data-menu="menu-berkas"
                        class="btn btn-full bg-blue2-dark rounded-sm shadow-xl btn-m text-uppercase font-900">Berkas</a>
                </div>
                <div class="col-6">
                    <a href="#"
                        class="btn btn-full bg-red1-dark rounded-sm shadow-xl btn-m text-uppercase font-900">Reject</a>
                </div>
            </div>
        </div>
        <a href="#" data-menu="update-lowongan"
            class="btn btn-full btn-margins bg-highlight rounded-sm shadow-xl btn-m text-uppercase font-900">Update Ploting</a>

    </div>
@endsection

@section('modal')
    <div id="menu-berkas" class="menu menu-box-modal rounded-m" data-menu-height="500" data-menu-width="350">
        <div class="content mb-0">
            @foreach ($documents as $doc) 
            <h6>{{ $doc->type }}</h6>
            <p>{{ $doc->title }}</p>
            <img src="{{ $doc->file_url ?? 'Tidak ada Data' }}" width="300"
                alt="">
            <br>
            <br>
            @endforeach
        </div>
    </div>
    <div id="update-lowongan" class="menu menu-box-modal rounded-m" data-menu-height="500" data-menu-width="350">
        <div class="content mb-0">
            <form action="{{ route('applicants.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="control-label"
                            for="bss3">Pilih Penempatan Kandidat</label>
                            <input type="hidden" name="user_id" value="{{ $applicant->id }}">
                        <select id="bss3"
                            data-toggle="selectpicker"
                            data-live-search="true" class="form-control" data-width="100%"
                            name="career_id">
                            <option value="">Pilih</option>
                            @foreach ($careers as $career)
                                <option value="{{ $career->id }}">
                                  {{ $career->company['cmpy'] }} - {{ $career->jobname }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-s button-s btn-center-s shadow-l rounded-s text-uppercase font-900 bg-blue1-light">Submit</button>
                    </div>
                    <div class="col">
                        <a href="#"
                            class="close-menu btn btn-s button-s btn-center-s shadow-l rounded-s text-uppercase font-900 bg-red1-light">Close</a>                     
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>
@endsection
