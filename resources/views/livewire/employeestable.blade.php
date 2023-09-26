<div>
    <div class="d-md-flex align-items-md-start">
      <h1 class="page-title mr-sm-auto"> User List </h1><!-- .btn-toolbar -->
      <div class="btn-toolbar">
        <div class="dropdown">
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalScrollable"><i class="oi oi-data-transfer-upload"></i> <span>Upload</span></button>
        </div>
        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
          <!-- .modal-dialog -->
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            <!-- .modal-content -->
            <div class="modal-content">
              <!-- .modal-header -->
                <div class="modal-header">
                  <h5 id="exampleModalScrollableLabel" class="modal-title"> Upload Data New PKWT Employee </h5>
                </div><!-- /.modal-header -->
                <!-- .modal-body -->
                <div class="modal-body">
                  <form action="{{ route('import-user') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="custom-file">
                      <input type="file" name="file" class="custom-file-input" id="customFile"><label class="custom-file-label">Hanya Format xlsx atau csv</label>
                      @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="modal-footer">
                      <a href="{{asset('/admin/format_import/format_import_user.xlsx')}}" class="dropdown-item"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png" width="20" alt="">&nbsp;&nbsp;Download Format Excel</a>
                      <button type="submit" class="btn btn-success">Import Data</button>
                    </div>
                  </form>
                </div><!-- /.modal-body -->
              <!-- .modal-footer -->
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>
        <div class="dropdown">
          <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="oi oi-data-transfer-download"></i> <span>Export</span> <span class="fa fa-caret-down"></span></button>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-arrow"></div><button wire:click="exportSelected" class="dropdown-item"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png" width="20" alt="">&nbsp;&nbsp;Export Excel</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
          </div>
          <input type="text" class="form-control" name="keyword" placeholder="Search..." wire:model="search">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <input type="date" class="form-control" wire:model="search">
        </div>
      </div>
    </div>
    <div class="table-responsive">
        <table id="usertable" class="table">
          <!-- thead -->
          <thead>
            <tr>
              <th></th>
              <th>No</th>
              <th>ID User</th>
              <th>Name</th>
              <th>Email</th>
              <th>Jabatan</th>
              <th>Project</th>
              <th>Area</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <!-- /thead -->
          <!-- tbody -->
          <tbody>
            @foreach ($data as $key => $user)
              <tr>
                  <td>
                    <input type="checkbox" wire:model="selectedIds" value="{{ $user->id }}">
                  </td>
                  <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                  <td>USER - {{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->profile['department'] }}</td>
                  <td>{{ $user->profile['project'] }}</td>
                  <td>{{ $user->profile['area'] }}</td>
                  <td class="align-middle text-right">
                  <form action="{{ route('employee.destroy',$user->id) }}" method="POST">
                    <a href="#" class="btn btn-sm btn-secondary"><i class="fa fa-user"></i> <span class="sr-only">Edit</span></a>
                    <a href="#" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></button>
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
