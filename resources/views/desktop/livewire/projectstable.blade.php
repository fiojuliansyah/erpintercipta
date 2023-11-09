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
                <th>To Company</th>
                <th>Department Name</th>
                <th>Customer Name</th>
                <th>Account Name</th>
                <th>Request By</th>
                <th width="100px"></th>
            </tr>
          </thead>
          <!-- /thead -->
          <!-- tbody -->
          <tbody>
            @foreach ($data as $key => $project)
              <tr>
                  <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                  <td>{{ $project->company_id }}</td>
                  <td>{{ $project->departmentname }}</td>
                  <td>{{ $project->customername }}</td>
                  <td>{{ $project->accountname }}</td>
                  <td>{{ $project->user_id }}</td>
                  <td class="align-middle text-right">
                  <form action="{{ route('projects.destroy',$project->id) }}" method="POST">
                    <a href="{{ route('projects.show',$project->id) }}" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-eye"></i> <span class="sr-only">Show</span></a>
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
