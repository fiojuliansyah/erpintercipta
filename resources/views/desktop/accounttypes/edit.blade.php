@extends('desktop.layouts.master')

@section('title', 'Account Type Edit | InterCipta ERP Management')

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
                  <a href="{{ route('taxcategories.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                </li>
              </ol>
            </nav>
            <h1 class="page-title"> Account Type Edit </h1>
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="page-section">
            <div class="d-xl-none">
              <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
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
                <form action="{{ route('accounttypes.update',$accounttype->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
               
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="name">Account Type</label>
                                <input type="text" name="name" value="{{ $accounttype->accounttype }}" class="form-control" placeholder="Post Title">
                                @error('name')
                                 <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>       
                          <button type="submit" class="btn btn-primary ml-3">Submit</button>
                      
                    </div>
                </form>
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