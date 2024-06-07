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
                        <img src="{{ Storage::url($candidate->user?->profile['avatar'] ?? 'Tidak ada Data') }}" width="50"
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
                        <h6>Bank</h6>
                        <p>{{ $candidate->user->profile['bank_name'] ?? '' }}</p>
                    </div>
                    <div style="margin-right: 30px;">
                        <h6>Nama</h6>
                        <p>{{ $candidate->user['name'] ?? '' }}</p>
                    </div>
                    <div>
                        <h6>Rekening</h6>
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
                    <a href="#"
                        class="btn btn-full bg-red1-dark rounded-sm shadow-xl btn-m text-uppercase font-900">Reject</a>
                </div>
            </div>
        </div>
        <a href="#" data-menu="update-lowongan"
            class="btn btn-full btn-margins bg-highlight rounded-sm shadow-xl btn-m text-uppercase font-900">Update Lowongan</a>

    </div>
@endsection

@section('modal')
    <div id="menu-berkas" class="menu menu-box-modal rounded-m" data-menu-height="600" data-menu-width="350">
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
    <div id="update-lowongan" class="menu menu-box-modal rounded-m" data-menu-height="600" data-menu-width="350">
        <div class="content mb-0">
            <form action="{{ route('candidates.update',$candidate->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                  @csrf
                <input type="hidden" name="user_id"
                    value="{{ $candidate->user['id'] }}">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="control-label"
                            for="bss3">Pilih Training</label>
                        <select id="bss3"
                            data-toggle="selectpicker"
                            data-live-search="true" class="form-control" data-width="100%"
                            name="status">
                            <option value="0">Pilih</option>
                            <option value="1">PENDING</option>
                            <option value="2">NCC</option>
                            <option value="3">GNC</option>
                            <option value="4">Interview User</option>
                            <option value="5">Reject</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="control-label"
                            for="bss3">Pilih Karir</label>
                        <select id="bss3"
                            data-toggle="selectpicker"
                            data-live-search="true" class="form-control" data-width="100%"
                            name="career_id">
                            <option value="{{ $candidate->career['id'] }}">{{ $candidate->career->company['cmpy'] }} - {{ $candidate->career['jobname'] }}</option>
                            @foreach ($careers as $career)
                                <option value="{{ $career->id }}">
                                  {{ $career->company['cmpy'] }} - {{ $career->jobname }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="control-label">Note Untuk Pelamar</label>
                        <textarea class="form-control" name="description_user">{{ $candidate->description_user }}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="control-label">Note Untuk Client</label>
                        <textarea class="form-control" name="description_client">{{ $candidate->description_client }}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="control-label">Jadwal</label>
                        <input type="date" class="form-control" name="date" value="{{ $candidate->date }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="control-label"
                            for="bss3">Pilih Site / Project</label>
                        <select id="bss3"
                            data-toggle="selectpicker"
                            data-live-search="true" class="form-control" data-width="100%"
                            name="site_id">
                            <option value="{{ $candidate->site['id'] ?? 'Tidak ada Data' }}">{{ $candidate->site->company['cmpy'] ?? 'Tidak ada Data' }} - {{ $candidate->site['name'] ?? 'Tidak ada Data' }}</option>
                            @foreach ($sites as $site)
                                <option value="{{ $site->id }}">
                                  {{ $site->company['cmpy'] }} - {{ $site->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="control-label">Ketemu / Penanggung Jawab</label>
                        <input type="text" class="form-control" name="responsible" value="{{ $candidate->responsible }}">
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-s button-s shadow-l rounded-s text-uppercase font-900 bg-blue1-light">Submit</button>
                    </div>
                    <div class="col-6">
                        <a href="#"
                            class="close-menu btn btn-s button-s shadow-l rounded-s text-uppercase font-900 bg-red1-light">Close</a>                     
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>
@endsection
