@extends('desktop.layouts.master')

@section('title', 'Item Request | InterCipta ERP Management')

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
            <a href="{{ route('item-request-add') }}">
              <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> <!-- /floating action -->
            </a>            
            <div class="d-md-flex align-items-md-start">
              <h1 class="page-title mr-sm-auto"> Item Request </h1><!-- .btn-toolbar -->
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
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th width="100px"></th>
                            </tr>
                          </thead>
                          <!-- /thead -->
                          <!-- tbody -->
                          <tbody>
                            @foreach ($itemRequests as $itemRequest)
                                <tr>
                                    <td>RQST - {{ str_pad($itemRequest->id, 5, '0', STR_PAD_LEFT) }}</td>
                                    <td>{{ $itemRequest->customer ?? '' }}</td>
                                    <td>{{ $itemRequest->description ?? '' }}</td>
                                    <td>
                                        @if ($itemRequest->carts->contains('status', 'waiting'))
                                            <span class="badge badge-warning">Waiting</span>
                                        @else
                                            <span class="badge badge-success">Force</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-right">
                                        <a href="{{ route('show-item', $itemRequest->id) }}" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-eye"></i> <span class="sr-only">show</span></a>
                                        <a href="{{ route('edit-item', $itemRequest->id) }}" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a>
                                    </td>
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