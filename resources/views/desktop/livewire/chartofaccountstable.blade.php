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
                <th>Status</th>
                <th>Account Type</th>
                <th>Account Name</th>
                <th>Request By</th>
                <th width="100px"></th>
            </tr>
          </thead>
          <!-- /thead -->
          <!-- tbody -->
          <tbody>
            @foreach ($data as $key => $coa)
              <tr>
                  <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                  <td>
                    @if ($coa->status == '1')
                      <span class="badge badge-success">Approve</span>
                    @elseif ($coa->status == '2')
                      <span class="badge badge-danger">Rejected</span>
                    @elseif ($coa->status == '0')
                      <span class="badge badge-warning">Pending</span>
                    @endif
                  </td>
                  <td>{{ $coa->accounttype ['accounttype'] }}</td>
                  <td>{{ $coa->accountname }}</td>
                  <td>{{ $coa->user_id }}</td>
                  <td class="align-middle text-right">
                  <form action="{{ route('chartofaccounts.destroy',$coa->id) }}" method="POST">
                    <a href="{{ route('chartofaccounts.show',$coa->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> <span class="sr-only">Show</span></a>
                    @csrf
                    @method('DELETE')
                    @can('department-delete')
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
