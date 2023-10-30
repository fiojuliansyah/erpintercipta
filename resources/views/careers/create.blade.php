@extends('layouts.master')

@section('title', 'Add Job | InterCipta ERP Management')

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
                                    <a href="{{ route('careers.index') }}"><i
                                            class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="page-title"> Add Career </h1>
                    </header><!-- /.page-title-bar -->
                    <!-- .page-section -->
                    <div class="page-section">
                        <div class="d-xl-none">
                            <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i
                                    class="fa fa-th-list"></i></button>
                        </div><!-- .card -->
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
                                <form action="{{ route('careers.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- .fieldset -->
                                    <div class="row">
                                        @can('status')
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="customername">Data Status</label>
                                                    <select id="status" class="custom-select custom-select-lg d-block w-100"
                                                        name="status" required="">
                                                        <option value="0"> Tampil </option>
                                                        <option value="1"> Tidak Tampil </option>
                                                    </select>
                                                </div>
                                            </div>
                                        @endcan
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="customername">Perusahaan</label>
                                                <select id="company_id" class="custom-select custom-select-lg d-block w-100"
                                                    name="company_id" required="">
                                                    <option value=""> pilih Perusahaan </option>
                                                    @foreach ($companies as $company)
                                                        <option value="{{ $company->id }}"> {{ $company->company }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="name">nama Pekerjaan</label>
                                                <input type="text" name="jobname" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('jobname')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="name">Detail Pekerjaan</label>
                                                <textarea type="text" name="description" class="form-control" id="body"></textarea>
                                                @error('jobname')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="name">Departmen</label>
                                                <input type="text" name="department" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('department')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="name">Lokasi</label>
                                                <input type="text" name="location" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('location')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="name">Fungsi Kerja</label>
                                                <input type="text" name="workfunction" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('workfunction')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="name">Pengalaman Minimal</label>
                                                <input type="text" name="experience" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('experience')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="name">Jurusan</label>
                                                <input type="text" name="major" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('major')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="name">Lulusan</label>
                                                <input type="text" name="graduate" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('graduate')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="name">Gaji</label>
                                                <input type="text" name="salary" class="form-control"
                                                    value="Competitive">
                                                @error('salary')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="candidate">membutuhkan Berapa</label>
                                                <input type="text" name="candidate" class="form-control"
                                                    placeholder="Tulis Disini">
                                                @error('candidate')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
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
    <script>
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
