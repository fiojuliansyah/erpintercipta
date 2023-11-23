@extends('desktop.layouts.master')

@section('title', 'Edit Addendum | InterCipta ERP Management')

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

@if ($addendum->title == 'pkwt')
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
                                    <a href="{{ route('addendums.index') }}"><i
                                            class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="page-title"> Edit Addendum </h1>
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
                                <form action="{{ route('addendums.update', $addendum->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <!-- .fieldset -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="bss3">Type Addendum</label>
                                            <select id="bss3" data-toggle="selectpicker" data-live-search="true"
                                                data-width="100%" name="title">
                                                <option value="{{ $addendum->title }}">{{ $addendum->title }}</option>
                                                <option value="pkwt">PKWT</option>
                                                <option value="perjanjian kerja">Perjanjian Kerja</option>
                                                <option value="penempatan">PENEMPATAN</option>
                                                <option value="interview user">INTERVIEW USER</option>
                                                <option value="bko">BKO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="bss3">Pilih Project / Site</label>
                                            <select id="bss3" data-toggle="selectpicker" data-live-search="true"
                                                data-width="100%" name="site_id">
                                                <option value="{{ $addendum->site['id'] }}">{{ $addendum->site['name'] }}
                                                </option>
                                                @foreach ($sites as $site)
                                                    <option value="{{ $site->id }}">
                                                        {{ $site->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <a href="{{ asset('/admin/format_import/format_draft_pkwt.doc') }}"
                                        class="dropdown-item"><img
                                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Microsoft_Office_Word_%282019%E2%80%93present%29.svg/1200px-Microsoft_Office_Word_%282019%E2%80%93present%29.svg.png"
                                            width="20" alt="">&nbsp;&nbsp;Download Format ADDENDUM</a>
                                    <div class="col-xs-20 col-sm-20 col-md-12">
                                        <div class="section-block">
                                            <label for="addendum">Addendum</label>
                                            <p class="text-muted"> Buat addendum dengan kesepakatan proyek atau area </p>
                                        </div><!-- /.section-block -->
                                        <!-- .card -->
                                        <div class="card card-fluid">
                                            <!-- #summernote-basic -->
                                            <textarea name="addendum" data-toggle="summernote" data-placeholder="Write here..." data-height="200">{!! html_entity_decode($addendum->addendum) !!}</textarea><!-- /#summernote-basic -->
                                        </div>
                                    </div>
                                    <div class="col-xs-20 col-sm-20 col-md-12">
                                        <div class="section-block">
                                            <label for="skk">LAMPIRAN TAMBAHAN 1</label>
                                            <p class="text-muted"> Buat lampiran Tambahan dengan kesepakatan proyek atau
                                                area </p>
                                        </div><!-- /.section-block -->
                                        <!-- .card -->
                                        <div class="card card-fluid">
                                            <!-- #summernote-basic -->
                                            <textarea name="attachment_1" data-toggle="summernote" data-placeholder="Write here..." data-height="200">{!! html_entity_decode($addendum->attachment_1) !!}</textarea><!-- /#summernote-basic -->
                                        </div>
                                    </div>
                                    <div class="col-xs-20 col-sm-20 col-md-12">
                                        <div class="section-block">
                                            <label for="skk">LAMPIRAN TAMBAHAN 2</label>
                                            <p class="text-muted"> Buat lampiran Tambahan dengan kesepakatan proyek atau
                                                area </p>
                                        </div><!-- /.section-block -->
                                        <!-- .card -->
                                        <div class="card card-fluid">
                                            <!-- #summernote-basic -->
                                            <textarea name="attachment_2" data-toggle="summernote" data-placeholder="Write here..." data-height="200">{!! html_entity_decode($addendum->attachment_2) !!}</textarea><!-- /#summernote-basic -->
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
@elseif ($addendum->title == 'perjanjian kerja')
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
                                    <a href="{{ route('addendums.index') }}"><i
                                            class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="page-title"> Edit Addendum </h1>
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
                                <form action="{{ route('addendums.update', $addendum->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <!-- .fieldset -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="bss3">Type Addendum</label>
                                            <select id="bss3" data-toggle="selectpicker" data-live-search="true"
                                                data-width="100%" name="title">
                                                <option value="{{ $addendum->title }}">{{ $addendum->title }}</option>
                                                <option value="pkwt">PKWT</option>
                                                <option value="perjanjian kerja">Perjanjian Kerja</option>
                                                <option value="penempatan">PENEMPATAN</option>
                                                <option value="interview user">INTERVIEW USER</option>
                                                <option value="bko">BKO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="bss3">Pilih Project / Site</label>
                                            <select id="bss3" data-toggle="selectpicker" data-live-search="true"
                                                data-width="100%" name="site_id">
                                                <option value="{{ $addendum->site['id'] }}">{{ $addendum->site['name'] }}
                                                </option>
                                                @foreach ($sites as $site)
                                                    <option value="{{ $site->id }}">
                                                        {{ $site->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <a href="{{ asset('/admin/format_import/format_draft_pkwt.doc') }}"
                                        class="dropdown-item"><img
                                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Microsoft_Office_Word_%282019%E2%80%93present%29.svg/1200px-Microsoft_Office_Word_%282019%E2%80%93present%29.svg.png"
                                            width="20" alt="">&nbsp;&nbsp;Download Format ADDENDUM</a>
                                    <div class="col-xs-20 col-sm-20 col-md-12">
                                        <div class="section-block">
                                            <label for="addendum">Addendum</label>
                                            <p class="text-muted"> Buat addendum dengan kesepakatan proyek atau area </p>
                                        </div><!-- /.section-block -->
                                        <!-- .card -->
                                        <div class="card card-fluid">
                                            <!-- #summernote-basic -->
                                            <textarea name="addendum" data-toggle="summernote" data-placeholder="Write here..." data-height="200">{!! html_entity_decode($addendum->addendum) !!}</textarea><!-- /#summernote-basic -->
                                        </div>
                                    </div>
                                    <div class="col-xs-20 col-sm-20 col-md-12">
                                        <div class="section-block">
                                            <label for="skk">LAMPIRAN TAMBAHAN 1</label>
                                            <p class="text-muted"> Buat lampiran Tambahan dengan kesepakatan proyek atau
                                                area </p>
                                        </div><!-- /.section-block -->
                                        <!-- .card -->
                                        <div class="card card-fluid">
                                            <!-- #summernote-basic -->
                                            <textarea name="attachment_1" data-toggle="summernote" data-placeholder="Write here..." data-height="200">{!! html_entity_decode($addendum->attachment_1) !!}</textarea><!-- /#summernote-basic -->
                                        </div>
                                    </div>
                                    <div class="col-xs-20 col-sm-20 col-md-12">
                                        <div class="section-block">
                                            <label for="skk">LAMPIRAN TAMBAHAN 2</label>
                                            <p class="text-muted"> Buat lampiran Tambahan dengan kesepakatan proyek atau
                                                area </p>
                                        </div><!-- /.section-block -->
                                        <!-- .card -->
                                        <div class="card card-fluid">
                                            <!-- #summernote-basic -->
                                            <textarea name="attachment_2" data-toggle="summernote" data-placeholder="Write here..." data-height="200">{!! html_entity_decode($addendum->attachment_2) !!}</textarea><!-- /#summernote-basic -->
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
@elseif ($addendum->title == 'penempatan')
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
                                    <a href="{{ route('addendums.index') }}"><i
                                            class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="page-title"> Edit Addendum </h1>
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
                                <form action="{{ route('addendums.update', $addendum->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <!-- .fieldset -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="bss3">Type Addendum</label>
                                            <select id="bss3" data-toggle="selectpicker" data-live-search="true"
                                                data-width="100%" name="title">
                                                <option value="{{ $addendum->title }}">{{ $addendum->title }}</option>
                                                <option value="pkwt">PKWT</option>
                                                <option value="perjanjian kerja">Perjanjian Kerja</option>
                                                <option value="penempatan">PENEMPATAN</option>
                                                <option value="interview user">INTERVIEW USER</option>
                                                <option value="bko">BKO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="bss3">Pilih Project / Site</label>
                                            <select id="bss3" data-toggle="selectpicker" data-live-search="true"
                                                data-width="100%" name="site_id">
                                                <option value="{{ $addendum->site['id'] }}">{{ $addendum->site['name'] }}
                                                </option>
                                                @foreach ($sites as $site)
                                                    <option value="{{ $site->id }}">
                                                        {{ $site->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <a href="{{ asset('/admin/format_import/format_draft_pkwt.doc') }}"
                                        class="dropdown-item"><img
                                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Microsoft_Office_Word_%282019%E2%80%93present%29.svg/1200px-Microsoft_Office_Word_%282019%E2%80%93present%29.svg.png"
                                            width="20" alt="">&nbsp;&nbsp;Download Format ADDENDUM</a>
                                    <div class="col-xs-20 col-sm-20 col-md-12">
                                        <div class="section-block">
                                            <label for="addendum">Addendum</label>
                                            <p class="text-muted"> Buat addendum dengan kesepakatan proyek atau area </p>
                                        </div><!-- /.section-block -->
                                        <!-- .card -->
                                        <div class="card card-fluid">
                                            <!-- #summernote-basic -->
                                            <textarea name="addendum" data-toggle="summernote" data-placeholder="Write here..." data-height="200">{!! html_entity_decode($addendum->addendum) !!}</textarea><!-- /#summernote-basic -->
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
@elseif ($addendum->title == 'interview user')
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
                                    <a href="{{ route('addendums.index') }}"><i
                                            class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="page-title"> Edit Addendum </h1>
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
                                <form action="{{ route('addendums.update', $addendum->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <!-- .fieldset -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="bss3">Type Addendum</label>
                                            <select id="bss3" data-toggle="selectpicker" data-live-search="true"
                                                data-width="100%" name="title">
                                                <option value="{{ $addendum->title }}">{{ $addendum->title }}</option>
                                                <option value="pkwt">PKWT</option>
                                                <option value="perjanjian kerja">Perjanjian Kerja</option>
                                                <option value="penempatan">PENEMPATAN</option>
                                                <option value="interview user">INTERVIEW USER</option>
                                                <option value="bko">BKO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="bss3">Pilih Project / Site</label>
                                            <select id="bss3" data-toggle="selectpicker" data-live-search="true"
                                                data-width="100%" name="site_id">
                                                <option value="{{ $addendum->site['id'] }}">{{ $addendum->site['name'] }}
                                                </option>
                                                @foreach ($sites as $site)
                                                    <option value="{{ $site->id }}">
                                                        {{ $site->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <a href="{{ asset('/admin/format_import/format_draft_pkwt.doc') }}"
                                        class="dropdown-item"><img
                                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Microsoft_Office_Word_%282019%E2%80%93present%29.svg/1200px-Microsoft_Office_Word_%282019%E2%80%93present%29.svg.png"
                                            width="20" alt="">&nbsp;&nbsp;Download Format ADDENDUM</a>
                                    <div class="col-xs-20 col-sm-20 col-md-12">
                                        <div class="section-block">
                                            <label for="addendum">Addendum</label>
                                            <p class="text-muted"> Buat addendum dengan kesepakatan proyek atau area </p>
                                        </div><!-- /.section-block -->
                                        <!-- .card -->
                                        <div class="card card-fluid">
                                            <!-- #summernote-basic -->
                                            <textarea name="addendum" data-toggle="summernote" data-placeholder="Write here..." data-height="200">{!! html_entity_decode($addendum->addendum) !!}</textarea><!-- /#summernote-basic -->
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
@elseif ($addendum->title == 'bko')
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
                                    <a href="{{ route('addendums.index') }}"><i
                                            class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="page-title"> Edit Addendum </h1>
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
                                <form action="{{ route('addendums.update', $addendum->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <!-- .fieldset -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="bss3">Type Addendum</label>
                                            <select id="bss3" data-toggle="selectpicker" data-live-search="true"
                                                data-width="100%" name="title">
                                                <option value="{{ $addendum->title }}">{{ $addendum->title }}</option>
                                                <option value="pkwt">PKWT</option>
                                                <option value="perjanjian kerja">Perjanjian Kerja</option>
                                                <option value="penempatan">PENEMPATAN</option>
                                                <option value="interview user">INTERVIEW USER</option>
                                                <option value="bko">BKO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="bss3">Pilih Project / Site</label>
                                            <select id="bss3" data-toggle="selectpicker" data-live-search="true"
                                                data-width="100%" name="site_id">
                                                <option value="{{ $addendum->site['id'] }}">{{ $addendum->site['name'] }}
                                                </option>
                                                @foreach ($sites as $site)
                                                    <option value="{{ $site->id }}">
                                                        {{ $site->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <a href="{{ asset('/admin/format_import/format_draft_pkwt.doc') }}"
                                        class="dropdown-item"><img
                                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Microsoft_Office_Word_%282019%E2%80%93present%29.svg/1200px-Microsoft_Office_Word_%282019%E2%80%93present%29.svg.png"
                                            width="20" alt="">&nbsp;&nbsp;Download Format ADDENDUM</a>
                                    <div class="col-xs-20 col-sm-20 col-md-12">
                                        <div class="section-block">
                                            <label for="addendum">Addendum</label>
                                            <p class="text-muted"> Buat addendum dengan kesepakatan proyek atau area </p>
                                        </div><!-- /.section-block -->
                                        <!-- .card -->
                                        <div class="card card-fluid">
                                            <!-- #summernote-basic -->
                                            <textarea name="addendum" data-toggle="summernote" data-placeholder="Write here..." data-height="200">{!! html_entity_decode($addendum->addendum) !!}</textarea><!-- /#summernote-basic -->
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
@endif
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
