@extends('desktop.layouts.master')

@section('title', 'Keranjang | InterCipta ERP Management')

@section('content')
<main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
      <!-- .page -->
      <div class="page">
        <!-- .page-inner -->
        <div class="page-inner">
          <!-- .page-title-bar -->
          <header class="page-title-bar">
            <div class="d-md-flex align-items-md-start">
              <h1 class="page-title mr-sm-auto"> Keranjang </h1><!-- .btn-toolbar -->
            </div><!-- /title and toolbar -->
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="page-section">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
            
                <!-- .table-responsive -->
                <div>
                  <form method="POST" action="{{ route('item-add') }}"> <!-- Sesuaikan atribut tindakan berdasarkan rute Anda -->
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer">Customer</label>
                            <input type="text" name="customer" class="form-control">
                        </div>
                      </div> 
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                      </div> 
                    </div>
                    <div class="table-responsive">
                        <table id="roletable" class="table">
                          <!-- thead -->
                          <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th width="100px"></th>
                            </tr>
                          </thead>
                          <!-- /thead -->
                          <!-- tbody -->
                          <tbody>
                            @foreach ($carts as $cart)
                              <tr>
                                  <td>{{ $cart->product['name'] }}</td>
                                  <td><input type="number" class="form-control" name="quantities[{{ $cart->id }}]" min="0" max="10" step="1" value="{{ $cart->quantity }}"></td>
                                  <td class="align-middle text-right">
                                </td>
                              </tr><!-- /tr -->
                            @endforeach
                          </tbody><!-- /tbody -->
                        </table>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                              <label for="customer">Decription</label>
                              <br>
                              <textarea name="description" id="" cols="80" rows="10"></textarea>
                          </div>
                        </div> 
                      </div>
                      <button type="submit" class="btn btn-success">Simpan</button>
                  </form>
                </div>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
      </div><!-- /.page -->
    </div><!-- .app-footer -->
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
    <!-- /.wrapper -->
</main>
@endsection