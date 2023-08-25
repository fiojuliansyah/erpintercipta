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
              <th><input type="checkbox" id="select-all"></th>
              <th>No</th>
              <th>Perusahaan</th>
              <th>Nama Lengkap</th>
              <th>Nama Panggilan</th>
              <th>Alamat</th>
              <th>TTL</th>
              <th>Agama</th>
              <th>Status</th>
              <th>Nama Ibu Kandung</th>
              <th>Nama Keluarga</th>
              <th>Alamat Keluarga</th>
              <th>Berat dan Tinggi</th>
              <th>Hobi</th>
              <th>No Rekening</th>
              <th>Nama BANK</th>
              <th>No NIK</th>
              <th>No NPWP</th>
              <th width="100px"></th>
          </tr>
        </thead>
        <!-- /thead -->
        <!-- tbody -->
        <tbody>
          @foreach ($data as $key => $applicant)
            <tr>
                <td><input type="checkbox" name="selected_ids[]" value="{{ $applicant->id }}"></td>
                <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                <td>{{ $applicant->career?->company['company'] }}</td>
                <td>{{ $applicant->user['name'] }}</td>
                <td>{{ $applicant->user?->profile['nickname'] }}</td>
                <td>{{ $applicant->user?->profile['address'] }}</td>
                <td>{{ $applicant->user?->profile['birth_place'] }}, {{ $applicant->user?->profile['birth_date'] }}</td>
                <td>{{ $applicant->user?->profile['religion'] }}</td>
                <td>{{ $applicant->user?->profile['person_status'] }}</td>
                <td>{{ $applicant->user?->profile['mother_name'] }}</td>
                <td>{{ $applicant->user?->profile['family_name'] }}</td>
                <td>{{ $applicant->user?->profile['family_address'] }}</td>
                <td>{{ $applicant->user?->profile['weight'] }}Kg & {{ $applicant->user?->profile['height'] }}Cm</td>
                <td>{{ $applicant->user?->profile['hobby'] }}</td>
                <td>{{ $applicant->user?->profile['bank_account'] }}</td>
                <td>{{ $applicant->user?->profile['bank_name'] }}</td>
                <td>{{ $applicant->user?->profile['nik_number'] }}</td>
                <td>{{ $applicant->user?->profile['npwp_number'] }}</td>
                <td class="align-middle text-right">
                <form action="{{ route('applicants.destroy',$applicant->id) }}" method="POST">
                  <a href="{{ route('applicants.show',$applicant->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> <span class="sr-only">Show</span></a>
                  @csrf
                  @method('DELETE')
                  @can('applicant-delete')
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
