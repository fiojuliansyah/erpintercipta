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
                    <th>Company</th>
                    <th>Job Name</th>
                    <th>Department</th>
                    <th>Location</th>
                    <th>Request By</th>
                    <th width="100px"></th>
                </tr>
            </thead>
            <!-- /thead -->
            <!-- tbody -->
            <tbody>
                @foreach ($data as $key => $career)
                    <tr>
                        <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                        <td>
                            @if ($career->status == '0')
                                <span class="badge badge-success">Tampil</span>
                            @elseif ($career->status == '2')
                                <span class="badge badge-danger">Rejected</span>
                            @elseif ($career->status == '1')
                                <span class="badge badge-warning">Tidak Tampil</span>
                            @endif
                        </td>
                        <td>{{ $career->company['company'] }}</td>
                        <td>{{ $career->jobname }}</td>
                        <td>{{ $career->department }}</td>
                        <td>{{ $career->location }}</td>
                        <td>{{ $career->user_id }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <a href="#">
                                    <button type="button" class="btn btn-primary">Menu</button>
                                </a>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <div class="dropdown-arrow"></div>
                                        <form action="{{ route('careers.destroy', $career->id) }}"
                                            method="POST">
                                            <a class="dropdown-item"
                                                href="{{ route('careers.edit', $career->id) }}">Edit
                                                Lowongan</a>
                                            <a class="dropdown-item"
                                                href="{{ route('careers.show', $career->id) }}">Lihat Lowongan</a>
                                            @csrf
                                            @method('DELETE')
                                            @can('career-delete')
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
