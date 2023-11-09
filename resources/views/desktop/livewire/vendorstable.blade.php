<div>
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
        <table id="roletable" class="table">
          <!-- thead -->
          <thead>
            <tr>
                <th>No</th>
                <th>Status</th>
                <th>To Company</th>
                <th>Vendor Name</th>
                <th>Phone</th>
                <th>Contact</th>
                <th>Tax Number</th>
                <th>Request By</th>
                <th>Created At</th>
                <th width="100px"></th>
            </tr>
          </thead>
          <!-- /thead -->
          <!-- tbody -->
          <tbody>
            @foreach ($data as $key => $vendor)
              <tr>
                  <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                  <td>
                    @if ($vendor->status == '1')
                        <span class="badge badge-success">Approve</span>
                    @elseif ($vendor->status == '2')
                      <span class="badge badge-danger">Rejected</span>
                    @elseif ($vendor->status == '0')
                      <span class="badge badge-warning">Pending</span>
                    @endif
                  </td>
                  <td>{{ $vendor->company['company'] }}</td>
                  <td>{{ $vendor->vendorname }}</td>
                  <td>{{ $vendor->phone }}</td>
                  <td>{{ $vendor->contact }}</td>
                  <td>{{ $vendor->taxnumber }}</td>
                  <td>{{ $vendor->user_id }}</td>
                  <td>{{ $vendor->created_at }}</td>
                  <td class="align-middle text-right">
                  <form action="{{ route('vendors.destroy',$vendor->id) }}" method="POST">
                    <a href="{{ route('vendors.show',$vendor->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> <span class="sr-only">Show</span></a>
                    @csrf
                    @method('DELETE')
                    @can('vendor-delete')
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
