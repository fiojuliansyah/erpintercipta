@extends('desktop.layouts.master')

@section('title', 'Product | InterCipta ERP Management')

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
            <h1 class="page-title">Product </h1>
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
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="accurate_id">Produk ID-Accurate ID</label>
                            <input type="text" name="accurate_id" class="form-control" value="{{ $product->floor }}-{{ $product->corridor }}-{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}-{{ $product->accurate_id }}" disabled>
                        </div>
                    </div> 
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" disabled>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="unit">Unit</label>
                            <input type="text" name="unit" class="form-control" value="{{ $product->unit }}" disabled>
                        </div>
                    </div> 
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="unit">Quantity</label>
                            <input type="text" name="unit" class="form-control" value="{{ $selisih }}" disabled>
                        </div>
                    </div> 
                </div>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
            <div id="base-style" class="card">
                <div class="card-body">
                    <h2>Quantities</h2>
                    <div class="table-responsive">
                        <table id="roletable" class="table">
                            <!-- thead -->
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>In</th>
                                    <th>Out</th>
                                </tr>
                            </thead>
                            <!-- /thead -->
                            <!-- tbody -->
                            <tbody>
                                @foreach ($quantities as $quantity)
                                    <tr>
                                        <td>{{ $quantity->created_at }}</td>
                                        <td>{{ $quantity->in ?? 'Tidak ada Data' }}</td>
                                        <td>{{ $quantity->out ?? 'Tidak ada Data' }}</td>
                                    </tr><!-- /tr -->
                                @endforeach
                
                                <!-- Menampilkan total quantity_in dan quantity_out secara terpisah -->
                                <tr>
                                    <td><strong>Total Quantity In:</strong></td>
                                    <td><strong>{{ $totalIn }}</strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Total Quantity Out:</strong></td>
                                    <td></td>
                                    <td><strong>{{ $totalOut }}</strong></td>
                                </tr>
                
                                <!-- Menampilkan selisih antara totalIn dan totalOut -->
                                <tr>
                                    <td><strong>Selisih:</strong></td>
                                    <td><strong>{{ $selisih }}</strong></td>
                                    <td></td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table>
                    </div
                </div>
              </div>
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