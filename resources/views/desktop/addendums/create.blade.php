@extends('desktop.layouts.master')

@section('title', 'Create Addendum | InterCipta ERP Management')

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
                  <a href="{{ route('addendums.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                </li>
              </ol>
            </nav>
            <h1 class="page-title"> Buat Addendum </h1>
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
                <form action="{{ route('addendums.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <!-- .fieldset -->
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="bss3">Type Addendum</label>
                            <select id="bss3" data-toggle="selectpicker" data-live-search="true" data-width="100%" name="title">
                            <option value="">Pilih</option>
                            <option value="PKWT">PKWT</option>
                            <option value="Perjanjian Kerja">Perjanjian Kerja</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="bss3">Pilih Project / Site</label>
                            <select id="bss3" data-toggle="selectpicker" data-live-search="true" data-width="100%" name="site_id">
                            <option value="">Pilih</option>
                            @foreach ($sites as $site)
                            <option value="{{ $site->id }}">
                                {{ $site->name }}
                            </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                          <label for="responsible">Penanggung Jawab</label>
                          <input type="text" name="responsible" class="form-control" placeholder="Tulis Disini">
                          @error('responsible')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-3">
                          <label for="year">Tanggal Romawi</label>
                          <input type="text" name="romawi" class="form-control" placeholder="Tulis Disini">
                          @error('romawi')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="year">Tahun</label>
                            <input type="text" name="year" class="form-control" placeholder="Tulis Disini">
                            @error('year')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>
                    </div> --}}
                    <br>
                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                            <label for="project">Proyek</label>
                            <input type="text" name="project" class="form-control" placeholder="Tulis Disini">
                            @error('project')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="area">Area</label>
                            <input type="text" name="area" class="form-control" placeholder="Tulis Disini">
                            @error('area')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>
                    </div> --}}
                    <br>
                    <a href="{{asset('/admin/format_import/format_draft_pkwt.doc')}}" class="dropdown-item"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Microsoft_Office_Word_%282019%E2%80%93present%29.svg/1200px-Microsoft_Office_Word_%282019%E2%80%93present%29.svg.png" width="20" alt="">&nbsp;&nbsp;Download Format ADDENDUM</a>
                    <div class="col-xs-20 col-sm-20 col-md-12">
                        <div class="section-block">
                            <label for="addendum">Addendum</label>
                            <p class="text-muted"> Buat addendum dengan kesepakatan proyek atau area </p>
                        </div><!-- /.section-block -->
                        <!-- .card -->
                        <div class="card card-fluid">
                            <!-- #summernote-basic -->
                            <textarea name="addendum" data-toggle="summernote" data-placeholder="Write here..." data-height="200"></textarea><!-- /#summernote-basic -->
                        </div>
                    </div>
                    <div class="col-xs-20 col-sm-20 col-md-12">
                        <div class="section-block">
                            <label for="skk">LAMPIRAN TAMBAHAN 1</label>
                            <p class="text-muted"> Buat lampiran Tambahan dengan kesepakatan proyek atau area </p>
                        </div><!-- /.section-block -->
                        <!-- .card -->
                        <div class="card card-fluid">
                            <!-- #summernote-basic -->
                            <textarea name="attachment_1" data-toggle="summernote" data-placeholder="Write here..." data-height="200"></textarea><!-- /#summernote-basic -->
                        </div>
                    </div>
                    <div class="col-xs-20 col-sm-20 col-md-12">
                      <div class="section-block">
                          <label for="skk">LAMPIRAN TAMBAHAN 2</label>
                          <p class="text-muted"> Buat lampiran Tambahan dengan kesepakatan proyek atau area </p>
                      </div><!-- /.section-block -->
                      <!-- .card -->
                      <div class="card card-fluid">
                          <!-- #summernote-basic -->
                          <textarea name="attachment_2" data-toggle="summernote" data-placeholder="Write here..." data-height="200"></textarea><!-- /#summernote-basic -->
                      </div>
                  </div>
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