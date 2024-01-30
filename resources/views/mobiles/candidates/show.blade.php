@extends('mobiles.layouts.master')

@section('title', 'Resume | Intercipta Mobile')

@section('content')
    <div class="page-content">

        <div class="page-title page-title-small">
            <h2>Kandidat</h2>
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
                        <img src="{{ Storage::url($candidate ? $candidate->user->profile?->avatar : '') }}" width="50"
                            class="mr-3 bg-highlight rounded-xl">
                    </div>
                    <div>
                        <h1 class="mb-0 pt-1">{{ $candidate->user['name'] }}</h1>
                        <p class="color-highlight font-11 mt-n2 mb-3">{{ $candidate->user['nik_number'] }}</p>
                    </div>
                </div>
                <p>
                    {{ $candidate->user['email'] ?? '' }}
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
                        <p>{{ $candidate->user['name'] }}</p>
                    </div>
                    <div style="margin-right: 30px;">
                        <h6>Panggilan</h6>
                        <p>{{ $candidate->user->profile['nickname'] ?? '' }}</p>
                    </div>
                    <div>
                        <h6>handphone</h6>
                        <p>{{ $candidate->user['phone'] }}</p>
                    </div>
                </div>
                <br>
                <div style="display: flex;">
                    <div style="margin-right: 30px;">
                        <h6>Alamat</h6>
                        <p>{{ $candidate->user->profile['address'] ?? '' }}</p>
                    </div>
                </div>
                <br>
                <div style="display: flex;">
                    <div style="margin-right: 30px;">
                        <h6>Ibu Kandung</h6>
                        <p>{{ $candidate->user->profile['mother_name'] ?? '' }}</p>
                    </div>
                    <div style="margin-right: 30px;">
                        <h6>Status</h6>
                        <p>{{ $candidate->user->profile['person_status'] ?? '' }}</p>
                    </div>
                    <div>
                        <h6>Agama</h6>
                        <p>{{ $candidate->user->profile['religion'] ?? '' }}</p>
                    </div>
                </div>
                <br>
                <div style="display: flex;">
                    <div style="margin-right: 30px;">
                        <h6>Jenis Kelamin</h6>
                        <p>{{ $candidate->user->profile['gender'] ?? '' }}</p>
                    </div>
                    <div style="margin-right: 30px;">
                        <h6>Tinggi</h6>
                        <p>{{ $candidate->user->profile['height'] ?? '' }} Cm</p>
                    </div>
                    <div>
                        <h6>Berat</h6>
                        <p>{{ $candidate->user->profile['weight'] ?? '' }} Kg</p>
                    </div>
                </div>
                <br>
                <div style="display: flex;">
                    <div style="margin-right: 30px;">
                        <h6>Tinggal Bersama</h6>
                        <p>{{ $candidate->user->profile['stay_in'] ?? '' }}</p>
                    </div>
                    <div style="margin-right: 30px;">
                        <h6>Nama Keluarga</h6>
                        <p>{{ $candidate->user->profile['family_name'] ?? '' }}</p>
                    </div>
                </div>
                <br>
                <div style="display: flex;">
                    <div style="margin-right: 30px;">
                        <h6>Alamat Keluarga</h6>
                        <p>{{ $candidate->user->profile['family_address'] ?? '' }}</p>
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
                        <h6>Nama Bank</h6>
                        <p>{{ $candidate->user->profile['bank_name'] ?? '' }}</p>
                    </div>
                    <div style="margin-right: 30px;">
                        <h6>Nama Rekening</h6>
                        <p>{{ $candidate->user['name'] ?? '' }}</p>
                    </div>
                    <div>
                        <h6>No Rekening</h6>
                        <p>{{ $candidate->user->profile['bank_account'] ?? '' }}</p>
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
                        <p>{{ $candidate->user->profile['reference'] ?? '' }}</p>
                    </div>
                    <div style="margin-right: 30px;">
                        <h6>Pekerjaan</h6>
                        <p>{{ $candidate->user['reference_job'] ?? '' }}</p>
                    </div>
                    <div>
                        <h6>Hubungan</h6>
                        <p>{{ $candidate->user->profile['reference_relation'] ?? '' }}</p>
                    </div>
                </div>
                <br>
                <div style="display: flex;">
                    <div style="margin-right: 30px;">
                        <h6>Alamat</h6>
                        <p>{{ $candidate->user->profile['reference_address'] ?? '' }}</p>
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
                    <a href="#" data-menu="menu-pengalaman"
                        class="btn btn-full bg-red1-dark rounded-sm shadow-xl btn-m text-uppercase font-900">Pengalaman</a>
                </div>
            </div>
        </div>
        <a href="#"
            class="btn btn-full btn-margins bg-highlight rounded-sm shadow-xl btn-m text-uppercase font-900">Download CV</a>

    </div>
@endsection

@section('modal')
    <div id="menu-berkas" class="menu menu-box-modal rounded-m" data-menu-height="800" data-menu-width="350">
        <div class="content mb-0">
            <strong>SCAN KTP</strong>
            <br>
            <br>
            <p>{{ $candidate->user->nik_number }}</p>
            <img src="{{ Storage::url($candidate->user?->profile['card_ktp'] ?? 'Tidak ada Data') }}" width="300"
                alt="">
            <br>
            <br>
            <strong>SCAN KARTU KELUARGA</strong>
            <br>
            <br>
            <p>{{ $candidate->user?->profile['family_number'] ?? 'Tidak ada Data' }}</p>
            <img src="{{ Storage::url($candidate->user?->profile['card_family'] ?? 'Tidak ada Data') }}" width="300"
                alt="">
            <br>
            <br>
            <strong>SCAN IJAZAH</strong>
            <br>
            <br>
            <img src="{{ Storage::url($candidate->user?->profile['card_ijazah'] ?? 'Tidak ada Data') }}" width="300"
                alt="">
            <br>
            <br>
            <strong>SCAN SKCK <span
                    class="badge badge-danger">{{ $candidate->user?->profile['active_date'] ?? 'Tidak ada Data' }}</span></strong>
            <br>
            <br>
            <img src="{{ Storage::url($candidate->user?->profile['card_skck'] ?? 'Tidak ada Data') }}" width="300"
                alt="">
            <br>
            <br>
            <strong>SCAN SERITIFKAT</strong>
            <br>
            <br>
            <img src="{{ Storage::url($candidate->user?->profile['card_certificate'] ?? 'Tidak ada Data') }}"
                width="350" alt="">
            <br>
            <br>
            <strong>SCAN NPWP</strong>
            <br>
            <br>
            <img src="{{ Storage::url($candidate->user?->profile['card_npwp'] ?? 'Tidak ada Data') }}" width="350"
                alt="">
            <br>
            <br>
            <strong>SCAN SIM</strong>
            <br>
            <br>
            <img src="{{ Storage::url($candidate->user?->profile['card_sim'] ?? 'Tidak ada Data') }}" width="350"
                alt="">
            <br>
            <br>
            <strong>SCAN
                {{ $candidate->user?->profile['add_name_document_a'] ?? 'Tidak ada Data' }}</strong>
            <br>
            <br>
            <img src="{{ Storage::url($candidate->user?->profile['add_document_a'] ?? 'Tidak ada Data') }}" width="350"
                alt="">
            <br>
            <br>
            <strong>SCAN
                {{ $candidate->user?->profile['add_name_document_b'] ?? 'Tidak ada Data' }}</strong>
            <br>
            <br>
            <img src="{{ Storage::url($candidate->user?->profile['add_document_b'] ?? 'Tidak ada Data') }}" width="350"
                alt="">
            <br>
            <br>
            <strong>SCAN
                {{ $candidate->user?->profile['add_name_document_c'] ?? 'Tidak ada Data' }}</strong>
            <br>
            <br>
            <img src="{{ Storage::url($candidate->user?->profile['add_document_c'] ?? 'Tidak ada Data') }}" width="350"
                alt="">
            <br>
            <br>
            <a href="#"
                class="close-menu btn btn-m btn-center-m button-s shadow-l rounded-s text-uppercase font-900 bg-red1-light">tutup</a>
            <br>
            <br>
        </div>
    </div>
    <div id="menu-pengalaman" class="menu menu-box-modal rounded-m" data-menu-height="800" data-menu-width="350">
        <div class="content mb-0">
            <h3 class="font-600">Pengalaman</h3>
            <br>
            <div style="display: flex;">
                <div style="margin-right: 30px;">
                    <h6>Nama Perusahaan</h6>
                    <p>{{ $candidate->user?->profile['company_name_a'] ?? 'Tidak ada Data' }}</p>
                </div>
                <div style="margin-right: 30px;">
                    <h6>Periode</h6>
                    <p>{{ $candidate->user?->profile['period_a'] ?? 'Tidak ada Data' }}</p>
                </div>
            </div>
            <br>
            <div style="display: flex;">
                <div style="margin-right: 30px;">
                    <h6>Posisi / Jabatan</h6>
                    <p>{{ $candidate->user?->profile['position_a'] ?? 'Tidak ada Data' }}</p>
                </div>
                <div style="margin-right: 30px;">
                    <h6>Gaji</h6>
                    <p>{{ $candidate->user?->profile['salary_a'] ?? 'Tidak ada Data' }}</p>
                </div>
            </div>
            <br>
            <br>
            <div style="display: flex;">
                <div style="margin-right: 30px;">
                    <h6>Nama Perusahaan</h6>
                    <p>{{ $candidate->user?->profile['company_name_b'] ?? 'Tidak ada Data' }}</p>
                </div>
                <div style="margin-right: 30px;">
                    <h6>Periode</h6>
                    <p>{{ $candidate->user?->profile['period_b'] ?? 'Tidak ada Data' }}</p>
                </div>
            </div>
            <br>
            <div style="display: flex;">
                <div style="margin-right: 30px;">
                    <h6>Posisi / Jabatan</h6>
                    <p>{{ $candidate->user?->profile['position_b'] ?? 'Tidak ada Data' }}</p>
                </div>
                <div style="margin-right: 30px;">
                    <h6>Gaji</h6>
                    <p>{{ $candidate->user?->profile['salary_b'] ?? 'Tidak ada Data' }}</p>
                </div>
            </div>
            <br>
            <br>
            <div style="display: flex;">
                <div style="margin-right: 30px;">
                    <h6>Nama Perusahaan</h6>
                    <p>{{ $candidate->user?->profile['company_name_c'] ?? 'Tidak ada Data' }}</p>
                </div>
                <div style="margin-right: 30px;">
                    <h6>Periode</h6>
                    <p>{{ $candidate->user?->profile['period_c'] ?? 'Tidak ada Data' }}</p>
                </div>
            </div>
            <br>
            <div style="display: flex;">
                <div style="margin-right: 30px;">
                    <h6>Posisi / Jabatan</h6>
                    <p>{{ $candidate->user?->profile['position_c'] ?? 'Tidak ada Data' }}</p>
                </div>
                <div style="margin-right: 30px;">
                    <h6>Gaji</h6>
                    <p>{{ $candidate->user?->profile['salary_c'] ?? 'Tidak ada Data' }}</p>
                </div>
            </div>
            <br>
            <br>
            <div style="display: flex;">
                <div style="margin-right: 30px;">
                    <h6>Nama Perusahaan</h6>
                    <p>{{ $candidate->user?->profile['company_name_d'] ?? 'Tidak ada Data' }}</p>
                </div>
                <div style="margin-right: 30px;">
                    <h6>Periode</h6>
                    <p>{{ $candidate->user?->profile['period_d'] ?? 'Tidak ada Data' }}</p>
                </div>
            </div>
            <br>
            <div style="display: flex;">
                <div style="margin-right: 30px;">
                    <h6>Posisi / Jabatan</h6>
                    <p>{{ $candidate->user?->profile['position_d'] ?? 'Tidak ada Data' }}</p>
                </div>
                <div style="margin-right: 30px;">
                    <h6>Gaji</h6>
                    <p>{{ $candidate->user?->profile['salary_d'] ?? 'Tidak ada Data' }}</p>
                </div>
            </div>
            <br>
        </div>
        <a href="#"
            class="close-menu btn btn-m btn-center-m button-s shadow-l rounded-s text-uppercase font-900 bg-red1-light">Close</a>
        <br>
    </div>
@endsection
