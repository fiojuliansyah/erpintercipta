<div>
    <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
        </div><input type="text" class="form-control" name="keyword" placeholder="Search..." wire:model="search">
  </div>
    <div class="table-responsive">
        <table id="usertable" class="table">
          <!-- thead -->
          <thead>
            <tr>
              <th>No</th>
              <th class="text-left"> Name </th>
              <th class="text-left"> Email </th>
              <th class="text-left"> Roles </th>
              <th style="width:100px; min-width:100px;"> &nbsp; </th>
            </tr>
          </thead>
          <!-- /thead -->
          <!-- tbody -->
          <tbody>
            @foreach ($data as $key => $user)
              <tr>
                  <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                      @if(!empty($user->getRoleNames()))
                          @foreach($user->getRoleNames() as $v)
                              <span class="badge badge-success">{{ $v }}</span>
                          @endforeach
                      @endif
                  </td>
                  <td class="align-middle text-right">
                  <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></button>
                  </form>  
                </td>
              </tr><!-- /tr -->
            @endforeach
          </tbody><!-- /tbody -->
          <thead>
            <tr>
              <th>No</th>
              <th class="text-left"> Name </th>
              <th class="text-left"> Email </th>
              <th class="text-left"> Roles </th>
              <th style="width:100px; min-width:100px;"> &nbsp; </th>
            </tr>
          </thead>
        </table>
      </div>
      <ul class="pagination justify-content-center mt-4">
        {{ $data->links() }}
      </ul>
</div>
