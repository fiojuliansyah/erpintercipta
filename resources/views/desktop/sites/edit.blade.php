@extends('desktop.layouts.master')

@section('title', 'Add Site | InterCipta ERP Management')

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
                        <h1 class="page-title"> Add Site </h1>
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
                                <form action="{{ route('sites.update', $site->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <!-- .fieldset -->
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="customername">Perusahaan</label>
                                                <select id="company_id" class="custom-select custom-select-lg d-block w-100"
                                                    name="company_id" required="">
                                                    <option value="{{ $site->company['company'] }}">
                                                        {{ $site->company['company'] }} </option>
                                                    @foreach ($companies as $company)
                                                        <option value="{{ $company->id }}"> {{ $company->company }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="name">Site Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $site->name }}">
                                                @error('name')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <input type="text" name="description" class="form-control"
                                                    value="{{ $site->description }}">
                                                @error('description')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="guard_name">Latitude</label>
                                                <input type="text" name="lat" class="form-control"
                                                    value="{{ $site->lat }}">
                                                @error('lat')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="guard_name">Longitude</label>
                                                <input type="text" name="long" class="form-control"
                                                    value="{{ $site->long }}">
                                                @error('long')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="guard_name">Show Document</label>
                                                <select name="show_document" class="form-control">
                                                    <option value="">Pilih</option>
                                                    <option value="1">Tampilkan</option>
                                                    <option value="">Jangan Tampilkan</option>
                                                </select>
                                                @error('show_document')
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
