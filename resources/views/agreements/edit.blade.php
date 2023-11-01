@extends('layouts.master')

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
                    <div class="page-section">
                        <div id="base-style" class="card">
                            <!-- .card-body -->
                            <div class="card-body">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!-- .form -->
                                <form action="{{ route('agreements.update',$agreement->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                      @csrf
                                    <!-- .fieldset -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="title">Judul Perjanjian</label>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ $agreement->title }}">
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
                                                value="{{ $agreement->department }}">
                                                @error('department')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="year">Bulan Romawi</label>
                                                <input type="text" name="romawi" class="form-control"
                                                value="{{ $agreement->romawi }}">
                                                @error('romawi')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="year">Tahun</label>
                                                <input type="text" name="year" class="form-control"
                                                value="{{ $agreement->year }}">
                                                @error('year')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="salary">Gaji</label>
                                                <input type="text" name="salary" class="form-control"
                                                value="{{ $agreement->salary }}">
                                                @error('salary')
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
                                                value="{{ $agreement->other_non_fix_allowance }}">
                                                @error('other_non_fix_allowance')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="department_allowance">Tunjangan Jabatan</label>
                                                <input type="text" name="department_allowance" class="form-control"
                                                value="{{ $agreement->department_allowance }}">
                                                @error('department_allowance')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="attendance_allowance">Tunjangan kehadiran</label>
                                                <input type="text" name="attendance_allowance" class="form-control"
                                                value="{{ $agreement->attendance_allowance }}">
                                                @error('attendance_allowance')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="comunication_allowance">Tunjangan Komunikasi</label>
                                                <input type="text" name="comunication_allowance" class="form-control"
                                                value="{{ $agreement->comunication_allowance }}">
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
                                                value="{{ $agreement->beauty_allowance }}">
                                                @error('beauty_allowance')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="food_allowance">Tunjangan Makan</label>
                                                <input type="text" name="food_allowance" class="form-control"
                                                value="{{ $agreement->food_allowance }}">
                                                @error('food_allowance')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="transport_allowance">Tunjangan Transport</label>
                                                <input type="text" name="transport_allowance" class="form-control"
                                                value="{{ $agreement->transport_allowance }}">
                                                @error('transport_allowance')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="location_allowance">Tunjangan Lokasi</label>
                                                <input type="text" name="location_allowance" class="form-control"
                                                value="{{ $agreement->location_allowance }}">
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
                                                value="{{ $agreement->place }}">
                                                @error('place')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="area">Area</label>
                                                <input type="text" name="area" class="form-control"
                                                value="{{ $agreement->area }}">
                                                @error('area')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="year">Tanggal Mulai</label>
                                                <input type="date" name="start_date" class="form-control"
                                                value="{{ $agreement->start_date }}">
                                                @error('start_date')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="year">Tanggal Berakhir</label>
                                                <input type="date" name="end_date" class="form-control"
                                                value="{{ $agreement->end_date }}">
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
                                                value="{{ $agreement->responsible }}">
                                                @error('responsible')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label" for="bss3">Pilih Addendum</label>
                                                <select id="bss3" data-toggle="selectpicker" data-live-search="true"
                                                    data-width="100%" name="addendum_id">
                                                    <option value="{{ $agreement->addendum['id'] }}">{{ $agreement->addendum?->site['name'] }} | {{ $agreement->addendum['title'] }}</option>
                                                    <option value="">Pilih</option>
                                                    @foreach ($addendums as $addendum)
                                                        <option value="{{ $addendum->id }}">
                                                            {{ $addendum->site['name'] ?? '' }} | {{ $addendum->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form><!-- /.form -->
                            </div><!-- /.card-body -->
                        </div><!-- /.card -->
                    </div><!-- /.page-section -->
                    <!-- .app-footer -->
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
