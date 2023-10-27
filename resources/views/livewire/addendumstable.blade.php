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
                <th>Addindum ID</th>
                <th>Perusahaan</th>
                <th>judul</th>
                <th>Project</th>
                <th width="100px"></th>
            </tr>
          </thead>
          <!-- /thead -->
          <!-- tbody -->
          <tbody>
            @foreach ($data as $key => $addendum)
              <tr>
                  <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                  <td>ADDINDUM - {{ str_pad($addendum->id, 5, '0', STR_PAD_LEFT) }}</td>
                  <td>{{ $addendum->company['company'] }}</td>
                  <td>{{ $addendum->title }}</td>
                  <td>{{ $addendum->project }}</td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <button type="submit" class="btn btn-primary">Menu</button>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <div class="dropdown-arrow"></div>
                                <form action="{{ route('addendums.destroy', $addendum->id) }}" method="POST">
                                    <a class="dropdown-item"
                                        href="{{ route('addendums.edit', $addendum->id) }}">Lihat Addendum</a>
                                    @csrf
                                    @method('DELETE')
                                    @can('addendum-delete')
                                        <button type="submit" class="dropdown-item">Hapus</button>
                                    @endcan
                                </form>
                            </div>
                        </div>
                    </div>
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
