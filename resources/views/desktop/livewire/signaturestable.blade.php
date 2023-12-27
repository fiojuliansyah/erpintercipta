<div>
    <div class="d-md-flex align-items-md-start">
      <h1 class="page-title mr-sm-auto"> Signature List </h1><!-- .btn-toolbar -->
      <div class="btn-toolbar">
          <div class="dropdown">
              <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalScrollable"><i
                      class="oi oi-data-transfer-upload"></i> <span>Upload</span></button>
          </div>
          <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
              <!-- .modal-dialog -->
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                  <!-- .modal-content -->
                  <div class="modal-content">
                      <!-- .modal-header -->
                      <div class="modal-header">
                          <h5 id="exampleModalScrollableLabel" class="modal-title"> Upload TTD Karyawan
                          </h5>
                      </div><!-- /.modal-header -->
                      <!-- .modal-body -->
                      <div class="modal-body">
                          <form action="{{ route('upload-signature') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="control-label"
                                        for="bss3">Pilih User</label>
                                    <select id="bss3"
                                        data-toggle="selectpicker"
                                        data-live-search="true" data-width="100%"
                                        name="user_id">
                                        <option value="">Pilih</option>
                                          @foreach ($users as $user)
                                            @if ($user->pkwt && $user->pkwt->agreement && $user->pkwt->agreement->addendum && $user->pkwt->agreement->addendum->site)   
                                              <option value="{{ $user->id }}">
                                                {{ $user->pkwt->agreement->addendum->site['name'] ?? 'Tidak ada Data'}} | {{ $user->name }}
                                              </option>
                                            @endif
                                          @endforeach
                                    </select>
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="custom-file">
                                    <input type="file" name="signatureDataUrl" class="custom-file-input"
                                        id="customFile"><label class="custom-file-label">Hanya Format PNG</label>
                                    @error('file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="submit" class="btn btn-success">Upload Signature</button>
                              </div>
                          </form>
                      </div><!-- /.modal-body -->
                      <!-- .modal-footer -->
                  </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
          </div>
      </div>
    </div>
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
                <th>Signature</th>
                <th>site</th>
                <th>Nama</th>
                <th width="100px"></th>
            </tr>
          </thead>
          <!-- /thead -->
          <!-- tbody -->
          <tbody>
            @foreach ($data as $key => $signature)
              <tr>
                  <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                  <td><img src="{{ Storage::url($signature->signatureDataUrl) }}" width="200" alt=""></td>
                  <td>{{ $signature->user->pkwt->agreement->addendum->site->name ?? 'Tidak ada Data' }}</td>
                  <td>{{ $signature->user['name'] ?? 'Tidak ada Data' }}</td>
                  <td class="align-middle text-right">
                  <form action="{{ route('signatures.destroy',$signature->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></button>
                  </form>  
                </td>
              </tr><!-- /tr -->
            @endforeach
          </tbody><!-- /tbody -->
        </table>
      </div>
      <ul class="pagination justify-content-center mt-4">
        {{ $data->links() }}
      </ul>
</div>

@push('js')
    <script src="{{ asset('') }}admin/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
@endpush
