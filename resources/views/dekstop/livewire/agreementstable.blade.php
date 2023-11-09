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
                <th>No Perjanjian</th>
                <th>Judul</th>
                <th>Jabatan</th>
                <th>Tipe</th>
                <th>Project / Site</th>
                <th width="100px"></th>
            </tr>
          </thead>
          <!-- /thead -->
          <!-- tbody -->
          <tbody>
            @foreach ($data as $key => $agreement)
              <tr>
                  <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                  <td>AGREEMENT - {{ str_pad($agreement->id, 5, '0', STR_PAD_LEFT) }}</td>
                  <td>{{ $agreement->title }}</td>
                  <td>{{ $agreement->department }}</td>
                  <td>{{ $agreement->addendum['title'] }}</td>
                  <td>{{ $agreement->addendum?->site['name'] }}</td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <button type="submit" class="btn btn-primary">Menu</button>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <div class="dropdown-arrow"></div>
                                <form action="{{ route('agreements.destroy', $agreement->id) }}" method="POST">
                                    <a class="dropdown-item"
                                        href="{{ route('agreements.edit', $agreement->id) }}">Lihat Agreement</a>
                                    @csrf
                                    @method('DELETE')
                                    @can('agreement-delete')
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
