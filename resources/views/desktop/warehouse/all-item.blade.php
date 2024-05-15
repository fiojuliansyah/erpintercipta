@extends('desktop.layouts.master')

@section('title', 'Catalog Product | InterCipta ERP Management')

@section('content')
<main class="app-main">
    <div class="wrapper">
      <div class="page">
        <div class="page-inner">
          <header class="page-title-bar">
            <div class="d-md-flex align-items-md-start">
              <h1 class="page-title mr-sm-auto"> All Area Request</h1>
            </div>
          </header>
          <!-- .page-section -->
          <div class="page-section">
            <!-- .card -->
            <div class="card card-fluid">
              <div class="card-body">
            
                <!-- .table-responsive -->
                <div>
                    <div class="table-responsive">
                        <table id="roletable" class="table">
                          <!-- thead -->
                          <thead>
                            <tr>
                                <th>ACCURATE ID</th>
                                <th>Name</th>
                                <th>QTY</th>
                                <th>Waiting</th>
                                <th>Force</th>
                                <th>Unit</th>
                            </tr>
                          </thead>
                          <!-- /thead -->
                          <!-- tbody -->
                          <tbody>
                            @foreach ($groupedItems as $group)
                                <tr>
                                    <td>{{ $group['product']['accurate_id'] ?? '' }}</td>
                                    <td>{{ $group['product']['name'] ?? '' }}</td>
                                    <td>{{ $group['quantity'] ?? '' }}</td>
                                    <td>{{ $group['waitingQuantity'] ?? '' }}</td>
                                    <td>{{ $group['forceQuantity'] ?? '' }}</td>
                                    <td>{{ $group['product']['unit'] ?? '' }}</td>
                                </tr>
                            @endforeach
                          </tbody><!-- /tbody -->
                        </table>
                      </div>
                      <ul class="pagination justify-content-center mt-4">
                      </ul>
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