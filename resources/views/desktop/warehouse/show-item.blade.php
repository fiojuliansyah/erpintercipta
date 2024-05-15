@extends('desktop.layouts.master')

@section('title', 'Show Item Request | InterCipta ERP Management')

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
              <h1 class="page-title mr-sm-auto"> Item Request</h1><!-- .btn-toolbar -->
            </div><!-- /title and toolbar -->
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="page-section">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h5>{{ $item->customer }}</h5>
                <p>{{ $item->description }}</p>
                <!-- .table-responsive -->
                <div class="table-responsive">
                    <table id="roletable" class="table">
                      <!-- thead -->
                      <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Name</th>
                            <th>QTY</th>
                            <th>Unit</th>
                            <th width="100px"></th>
                        </tr>
                      </thead>
                      <!-- /thead -->
                      <!-- tbody -->
                      <tbody>
                        @foreach ($item->carts as $cart)
                          <tr>
                              <td>{{ $cart->product['accurate_id'] }}</td>
                              <td>{{ $cart->product['name'] }}</td>
                              <td>{{ $cart->quantity }}</td>
                              <td>{{ $cart->product['unit'] }}</td>
                          </tr><!-- /tr -->
                        @endforeach
                      </tbody><!-- /tbody -->
                    </table>
                </div>
                <div>
                  
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