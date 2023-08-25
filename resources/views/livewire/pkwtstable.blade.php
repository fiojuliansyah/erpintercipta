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
                <th>No Surat</th>
                <th>ID Pelamar</th>
                <th>Nama</th>
                <th>TTD Pelamar</th>
                <th>TTD HRD</th>
                <th width="100px"></th>
            </tr>
          </thead>
          <!-- /thead -->
          <!-- tbody -->
          <tbody>
            @foreach ($data as $key => $pkwt)
              <tr>
                  <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                  <td>{{ $pkwt->company ['company'] }}</td>
                  <td>{{ $pkwt->reference_number }}</td>
                  <td>APPLICANT - {{ str_pad($pkwt->user['id'], 5, '0', STR_PAD_LEFT) }}</td>
                  <td>{{ $pkwt->user ['name'] }}</td>
                  <td>
                    @if ($pkwt->user?->signature == null) 
                    @else
                    <span class="badge badge-success">Sudah Tertanda Tangan</span>
                    @endif
                  </td>
                  <td><span class="badge badge-danger">Belum Tertanda Tangan</span></td>
                  <td class="align-middle text-right">
                  <form action="{{ route('pkwts.destroy',$pkwt->id) }}" method="POST">
                    <a href="{{ route('pkwts.show',$pkwt->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> <span class="sr-only">Show</span></a>
                    @csrf
                    @method('DELETE')
                    @can('pkwt-delete')
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
