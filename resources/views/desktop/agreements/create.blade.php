@extends('desktop.layouts.master')

@section('title', 'Create Agreement | InterCipta ERP Management')

@section('plugin')
    <link rel="stylesheet" href="{{ asset('') }}admin/vendor/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="{{ asset('') }}admin/vendor/highlightjs/styles/github.css">
    <link rel="stylesheet" href="{{ asset('') }}admin/vendor/katex/katex.min.css">
    <link rel="stylesheet" href="{{ asset('') }}admin/vendor/quill/quill.snow.css">
    <link rel="stylesheet" href="{{ asset('') }}admin/vendor/simplemde/simplemde.min.css">
@endsection

@section('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')
    <main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
            <!-- .page -->
            <div class="page has-sidebar has-sidebar-expand-xl">
                <!-- .page-inner -->
                <div class="page-inner">
                    <!-- .page-title-bar -->
                    <header class="page-title-bar">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    <a href="{{ route('agreements.index') }}"><i
                                            class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="page-title"> Buat Perjanjian </h1>
                    </header><!-- /.page-title-bar -->
                    <!-- .page-section -->
                    <div class="card-deck-xl">
                        <!-- .card -->
                        <div class="card card-fluid">
                          <!-- .card-header -->
                          <div class="card-header">
                            <!-- .nav-tabs -->
                            <ul class="nav nav-tabs card-header-tabs">
                              <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab" href="#pkwt">PKWT & PERJANJIAN KERJA</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#penempatan">PENEMPATAN</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#interview">INTERVIEW</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#bko">BKO</a>
                              </li>
                            </ul><!-- /.nav-tabs -->
                          </div><!-- /.card-header -->
                          <!-- .card-body -->
                          <div class="card-body">
                            <!-- .tab-content -->
                            <div id="myTabContent" class="tab-content">
                              <div class="tab-pane fade active show" id="pkwt">
                                <form action="{{ route('agreements.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- .fieldset -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="title">Judul Perjanjian</label>
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Tulis Disini">
                                            @error('title')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="department">Untuk Posisi</label>
                                                <input type="text" name="department" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('department')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="year">Bulan Romawi</label>
                                                <input type="text" name="romawi" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('romawi')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="year">Tahun</label>
                                                <input type="text" name="year" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('year')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="salary">Gaji</label>
                                                <input type="text" name="salary" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('salary')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="penalty">Penalty</label>
                                                <input type="text" name="penalty" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('penalty')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="length_of_work">Lama Bekerja</label>
                                                <input type="text" name="length_of_work" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('length_of_work')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <small style="color: red">Jika kosong maka beri tanda(-)</small>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="other_non_fix_allowance">Other Non Fix</label>
                                                <input type="text" name="other_non_fix_allowance" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('other_non_fix_allowance')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="department_allowance">Tunjangan Jabatan</label>
                                                <input type="text" name="department_allowance" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('department_allowance')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="attendance_allowance">Tunjangan kehadiran</label>
                                                <input type="text" name="attendance_allowance" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('attendance_allowance')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="comunication_allowance">Tunjangan Komunikasi</label>
                                                <input type="text" name="comunication_allowance" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('comunication_allowance')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="beauty_allowance">Tunjangan Kecantikan</label>
                                                <input type="text" name="beauty_allowance" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('beauty_allowance')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="food_allowance">Tunjangan Makan</label>
                                                <input type="text" name="food_allowance" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('food_allowance')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="transport_allowance">Tunjangan Transport</label>
                                                <input type="text" name="transport_allowance" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('transport_allowance')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="location_allowance">Tunjangan Lokasi</label>
                                                <input type="text" name="location_allowance" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('location_allowance')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="place">Tempat Pelaksana</label>
                                                <input type="text" name="place" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('place')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="area">Area</label>
                                                <input type="text" name="area" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('area')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="year">Tanggal Mulai</label>
                                                <input type="date" name="start_date" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('start_date')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="year">Tanggal Berakhir</label>
                                                <input type="date" name="end_date" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('end_date')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="responsible">Penanggung Jawab</label>
                                                <input type="text" name="responsible" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('responsible')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label" for="bss3">Pilih Addendum</label>
                                                <select id="bss3" data-toggle="selectpicker" data-live-search="true"
                                                    data-width="100%" name="addendum_id">
                                                    <option value="">Pilih</option>
                                                    @foreach ($addendums as $addendum)
                                                        <option value="{{ $addendum->id }}">
                                                            {{ $addendum->site['name'] ?? 'Tidak ada Data' }} ({{ $addendum->title ?? 'Tidak ada Data' }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                              </div>
                              <div class="tab-pane fade" id="penempatan">
                                <form action="{{ route('agreements.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- .fieldset -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="title">Judul Perjanjian</label>
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Tulis Disini">
                                            @error('title')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="department">Untuk Posisi</label>
                                                <input type="text" name="department" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('department')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="year">Bulan Romawi</label>
                                                <input type="text" name="romawi" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('romawi')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="year">Tahun</label>
                                                <input type="text" name="year" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('year')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="year">Tanggal Mulai</label>
                                                <input type="date" name="start_date" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('start_date')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="year">Tanggal Berakhir</label>
                                                <input type="date" name="end_date" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('end_date')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="responsible">Penanggung Jawab</label>
                                                <input type="text" name="responsible" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('responsible')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label" for="bss3">Pilih Addendum</label>
                                                <select id="bss3" data-toggle="selectpicker" data-live-search="true"
                                                    data-width="100%" name="addendum_id">
                                                    <option value="">Pilih</option>
                                                    @foreach ($addendums as $addendum)
                                                        <option value="{{ $addendum->id }}">
                                                            {{ $addendum->site['name'] ?? 'Tidak ada Data' }} ({{ $addendum->title ?? 'Tidak ada Data' }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                              </div>
                              <div class="tab-pane fade" id="interview">
                                <form action="{{ route('agreements.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- .fieldset -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="title">Judul Perjanjian</label>
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Tulis Disini">
                                            @error('title')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="department">Untuk Posisi</label>
                                                <input type="text" name="department" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('department')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="year">Bulan Romawi</label>
                                                <input type="text" name="romawi" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('romawi')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="year">Tahun</label>
                                                <input type="text" name="year" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('year')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="year">Tanggal Mulai</label>
                                                <input type="date" name="start_date" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('start_date')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="year">Tanggal Berakhir</label>
                                                <input type="date" name="end_date" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('end_date')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="responsible">Penanggung Jawab</label>
                                                <input type="text" name="responsible" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('responsible')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label" for="bss3">Pilih Addendum</label>
                                                <select id="bss3" data-toggle="selectpicker" data-live-search="true"
                                                    data-width="100%" name="addendum_id">
                                                    <option value="">Pilih</option>
                                                    @foreach ($addendums as $addendum)
                                                        <option value="{{ $addendum->id }}">
                                                            {{ $addendum->site['name'] ?? 'Tidak ada Data' }} ({{ $addendum->title ?? 'Tidak ada Data' }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                              </div>
                              <div class="tab-pane fade" id="bko">
                                <form action="{{ route('agreements.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- .fieldset -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="title">Judul Perjanjian</label>
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Tulis Disini">
                                            @error('title')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="department">Untuk Posisi</label>
                                                <input type="text" name="department" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('department')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="year">Bulan Romawi</label>
                                                <input type="text" name="romawi" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('romawi')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="year">Tahun</label>
                                                <input type="text" name="year" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('year')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="year">Tanggal Mulai</label>
                                                <input type="date" name="start_date" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('start_date')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="year">Tanggal Berakhir</label>
                                                <input type="date" name="end_date" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('end_date')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="responsible">Penanggung Jawab</label>
                                                <input type="text" name="responsible" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('responsible')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label" for="bss3">Pilih Addendum</label>
                                                <select id="bss3" data-toggle="selectpicker" data-live-search="true"
                                                    data-width="100%" name="addendum_id">
                                                    <option value="">Pilih</option>
                                                    @foreach ($addendums as $addendum)
                                                        <option value="{{ $addendum->id }}">
                                                            {{ $addendum->site['name'] ?? 'Tidak ada Data' }} ({{ $addendum->title ?? 'Tidak ada Data' }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                              </div>
                            </div><!-- /.tab-content -->
                          </div><!-- /.card-body -->
                        </div>
                      </div>
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
                        <div class="copyright"> Copyright © 2023. InterCipta Corporation All right reserved. </div>
                    </footer><!-- /.app-footer -->
                </div><!-- /.page-inner -->
            </div><!-- /.page -->
        </div><!-- /.wrapper -->
    </main>
@endsection

@push('js')
    <script src="{{ asset('') }}admin/vendor/summernote/summernote-bs4.min.js"></script>
    <script src="{{ asset('') }}admin/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    {{-- <script>
  ClassicEditor
  .create( document.querySelector( '#addendum' ) )
  .catch( error => {
  console.error( error );
  } );
</script>
<script>
    ClassicEditor
    .create( document.querySelector( '#skk' ) )
    .catch( error => {
    console.error( error );
    } );
</script> --}}
@endpush
