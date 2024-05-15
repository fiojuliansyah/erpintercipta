@extends('desktop.layouts.master')

@section('title', 'Catalog Product | InterCipta ERP Management')

@section('content')
<main class="app-main">
    <div class="wrapper">
      <div class="page">
        <div class="page-inner">
          <header class="page-title-bar">
            <div class="d-md-flex align-items-md-start">
              <h1 class="page-title mr-sm-auto"> Catalog Product</h1>
              <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i><span class="badge badge-danger">{{ $cart }}</span></a>
            </div>
          </header>
          <!-- .page-section -->
          <div class="page-section">
            <!-- .card -->
            <div class="card card-fluid">
              <div class="card-body">
            
                <!-- .table-responsive -->
                <div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                        </div><input type="text" class="form-control" name="keyword" placeholder="Search..." wire:model="search">
                    </div>
                    <div class="table-responsive">
                        <table id="roletable" class="table">
                          <!-- thead -->
                          <thead>
                            <tr>
                              <th>Product ID</th>
                                <th>Name</th>
                                <th>Unit</th>
                                <th width="100px"></th>
                            </tr>
                          </thead>
                          <!-- /thead -->
                          <!-- tbody -->
                          <tbody>
                            @foreach ($products as $product)
                              <tr>
                                  <td>{{ $product->accurate_id ?? '' }}</td>
                                  <td>{{ $product->name }}</td>
                                  <td>{{ $product->unit ?? '' }}</td>
                                  <td class="align-middle text-right">
                                    <form action="{{ route('cart-add') }}" method="POST">
                                      @csrf
                                      <input type="hidden" name="product_id" value="{{ $product->id }}" id="">
                                    <button type="submit" class="btn btn-sm btn-icon btn-success"><i class="fa fa-plus"></i> <span class="sr-only">Tambahkan</span></button>
                                  </form>  
                                </td>
                              </tr><!-- /tr -->
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