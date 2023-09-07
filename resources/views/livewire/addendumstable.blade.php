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
                <th>Perusahaan</th>
                <th>Proyek</th>
                <th>Area</th>
                <th>Addendum</th>
                <th>Lampiran</th>
                <th width="100px"></th>
            </tr>
          </thead>
          <!-- /thead -->
          <!-- tbody -->
          <tbody>
            @foreach ($data as $key => $addendum)
              <tr>
                  <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                  <td>{{ $addendum->company['company'] }}</td>
                  <td>{{ $addendum->project }}</td>
                  <td>{{ $addendum->area }}</td>
                  <td><button type="button" class="btn btn-success ml-auto" data-toggle="modal" data-target="#addendum">View Addendum</button></td>
                  <div class="modal fade" id="addendum" tabindex="-1" role="dialog" aria-labelledby="addendum" aria-hidden="true">
                    <!-- .modal-dialog -->
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                      <!-- .modal-content -->
                      <div class="modal-content">
                        <!-- .modal-header -->
                        <div class="modal-header">
                          
                        </div><!-- /.modal-header -->
                        <!-- .modal-body -->
                        <div class="modal-body">
                          {!! ($addendum->addendum) !!}
                        </div><!-- /.modal-body -->
                        <!-- .modal-footer -->
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div>
                  <td><button type="button" class="btn btn-success ml-auto" data-toggle="modal" data-target="#skk">View Lampiran</button></td>
                  <div class="modal fade" id="skk" tabindex="-1" role="dialog" aria-labelledby="skk" aria-hidden="true">
                    <!-- .modal-dialog -->
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                      <!-- .modal-content -->
                      <div class="modal-content">
                        <!-- .modal-header -->
                        <div class="modal-header">
                          
                        </div><!-- /.modal-header -->
                        <!-- .modal-body -->
                        <div class="modal-body">
                          {!! ($addendum->attachment) !!}
                        </div><!-- /.modal-body -->
                        <!-- .modal-footer -->
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div>
                  <td class="align-middle text-right">
                  <form action="{{ route('addendums.destroy',$addendum->id) }}" method="POST">
                    <a href="{{ route('addendums.show',$addendum->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> <span class="sr-only">Show</span></a>
                    @csrf
                    @method('DELETE')
                    @can('addendum-delete')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></button>
                    @endcan
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
