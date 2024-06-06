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
          <div class="d-md-flex align-items-md-start">
            <h1 class="page-title mr-sm-auto">  </h1><!-- .btn-toolbar -->
            <div class="btn-toolbar">
                <div class="dropdown">
                    <button type="button" class="btn btn-light" data-toggle="modal"
                        data-target="#exampleModalScrollable"><i class="oi oi-data-transfer-upload"></i>
                        <span>Upload Data Item</span></button>
                </div>
                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
                    <!-- .modal-dialog -->
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <!-- .modal-content -->
                        <div class="modal-content">
                            <!-- .modal-header -->
                            <div class="modal-header">
                                <h5 id="exampleModalScrollableLabel" class="modal-title"> Upload Data New Item </h5>
                            </div><!-- /.modal-header -->
                            <!-- .modal-body -->
                            <div class="modal-body">
                                <form action="{{ route('import-item') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input"
                                            id="customFile"><label class="custom-file-label">Hanya Format xlsx atau
                                            csv</label>
                                        @error('file')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ asset('/admin/format_import/FORMAT_NEW_CART.xlsx') }}"
                                            class="dropdown-item"><img
                                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png"
                                                width="20" alt="">&nbsp;&nbsp;Download Format Excel</a>
                                        <button type="submit" class="btn btn-success">Import Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.modal-dialog -->
                </div>
            </div><!-- /.btn-toolbar -->
        </div>
          <!-- .page-section -->
          <div class="page-section">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h5>{{ $item->customer }}</h5>
                <p>{{ $item->description }}</p>
                <p>Delivery Date : <span class="badge badge-danger">{{ $item->delivery_date }}</span></p>
                <br>
                <br>
                {!! html_entity_decode($item->qr_link) !!}
                <br>
                <br>
                <!-- .table-responsive -->
                <div class="table-responsive">
                    <table id="roletable" class="table">
                      <!-- thead -->
                      <thead>
                        <tr>
                            <th>ACCURATE ID</th>
                            <th>Name</th>
                            <th>QTY</th>
                            <th>Unit</th>
                            <th>Request By</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                      </thead>
                      <!-- /thead -->
                      <!-- tbody -->
                      <tbody>
                        @foreach ($carts as $cart)
                          <tr>
                              <td>{{ $cart->product['accurate_id'] }}</td>
                              <td>{{ $cart->product['name'] }}</td>
                              <td>{{ $cart->quantity }}</td>
                              <td>{{ $cart->product['unit'] }}</td>
                              <td>{{ $cart->user['name'] }}</td>
                              <td>
                                  @if ($cart->status == 'waiting')
                                  <span class="badge badge-warning">{{ $cart->status }}</span>
                                  @elseif ($cart->status == 'force')
                                  <span class="badge badge-success">{{ $cart->status }}</span>
                                  @elseif ($cart->status == 'pending')
                                  <span class="badge badge-info">{{ $cart->status }}</span>
                                  @endif
                              </td>
                              <td>
                                <div class="row">
                                  <div class="col-3">
                                    <a class="btn btn-primary btn-sm mt-2" data-toggle="modal" data-target="#exampleModalAlertWarning{{ $cart->id }}">Force</a>
                                    {{-- <form action="{{ route('update-cart', $cart->id) }}" method="POST">
                                      @csrf
                                      @method('PUT')
                                      <input type="hidden" value="force" name="status">
                                      <button type="submit" class="btn btn-primary btn-sm mt-2">Force</button>
                                  </form> --}}
                                  </div>
                                  <div class="col-3">
                                    <form action="{{ route('delete-cart', $cart->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                                  </form>
                                  </div>
                                </div>
                              </td>
                          </tr><!-- /tr -->
                          <div class="modal modal-alert fade" id="exampleModalAlertWarning{{ $cart->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalAlertWarningLabel" aria-hidden="true">
                            <!-- .modal-dialog -->
                            <div class="modal-dialog" role="document">
                              <!-- .modal-content -->
                              <div class="modal-content">
                                <!-- .modal-header -->
                                <div class="modal-header">
                                  <h5 id="exampleModalAlertWarningLabel" class="modal-title">
                                    <i class="fa fa-bullhorn text-danger mr-1"></i> Apakah anda yakin?</h5>
                                </div><!-- /.modal-header -->
                                <!-- .modal-body -->
                                <form action="{{ route('update-cart', $cart->id) }}" method="POST">
                                  @csrf
                                  @method('PUT')
                                    <div class="modal-body">
                                      <input type="text" class="form-control" name="quantity" placeholder="QTY">
                                      <input type="hidden" value="force" name="status">
                                    </div><!-- /.modal-body -->
                                    <!-- .modal-footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary">Force</button>
                                    </div><!-- /.modal-footer -->
                                </form>
                              </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                          @endforeach
                      </tbody><!-- /tbody -->
                    </div>
                  </table>
                  <table>
                    <tbody>
                      <form action="{{ route('add-cart') }}" method="POST">
                        @csrf
                        <tr>
                          <td width="800">
                                <select id="bss3"
                                    data-toggle="selectpicker"
                                    data-live-search="true" data-width="100%"
                                    name="product_id">
                                    <option>pilih Produk</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">
                                          {{ $product->accurate_id }} - {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td width="200">
                                <input type="text" class="form-control" name="quantity" placeholder="QTY" >
                          </td>
                          <td width="200">
                            <input type="hidden" name="item_request_id" value="{{ $item->id }}">
                            <button type="submit" class="btn btn-sm btn-success"><spam>Tambahkan</span></button>
                          </td>
                        </div>
                      </form> 
                    </tbody>
                  </table>
                  <div class="pb-6"></div>
                  <div class="pb-6"></div>
                  <div class="pb-6"></div>
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
@push('js')
    <script src="{{ asset('') }}admin/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
@endpush