<div>
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto"> Candidate List </h1><!-- .btn-toolbar -->
        <div class="btn-toolbar">
            <div class="dropdown">
                <button type="button" class="btn btn-light" data-toggle="dropdown"><i
                        class="oi oi-data-transfer-download"></i> <span>Export</span> <span
                        class="fa fa-caret-down"></span></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-arrow"></div><button wire:click="exportSelected" class="dropdown-item"><img
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png"
                            width="20" alt="">&nbsp;&nbsp;Export Excel</button>
                </div>
            </div>
        </div><!-- /.btn-toolbar -->
    </div>
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
                    <th width="50px"></th>
                    <th>No</th>
                    <th>Perusahaan</th>
                    <th>Nama Lengkap</th>
                    <th>Melamar</th>
                    <th>Alamat</th>
                    <th>QR Code</th>
                    <th>Lamaran Masuk</th>
                    <th width="100px"></th>
                </tr>
            </thead>
            <!-- /thead -->
            <!-- tbody -->
            <tbody>
                @foreach ($data as $key => $candidate)                   
                @if ($candidate->status == 0)
                    <tr>
                        <td>
                            <input type="checkbox" wire:model="selectedIds" value="{{ $candidate->id }}">
                        </td>
                        <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                        <td>{{ $candidate->career?->company['cmpy'] }}</td>
                        <td>{{ $candidate->user['name'] ?? ''}}</td>
                        <td>{{ $candidate->career['jobname'] ?? '' }}</td>
                        <td>{{ $candidate->user?->profile['address'] ?? '' }}</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter{{ $candidate->id }}">Show</button>
                            <div class="modal fade" id="exampleModalCenter{{ $candidate->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                                <!-- .modal-dialog -->
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <!-- .modal-content -->
                                    <div class="modal-content">
                                        <!-- .modal-header -->
                                        <div class="modal-header">
                                            <h5 id="exampleModalCenterLabel" class="modal-title"> QR Code </h5>
                                        </div><!-- /.modal-header -->
                                        <!-- .modal-body -->
                                        <div class="modal-body">
                                            <div style="text-align: center">
                                                {!! html_entity_decode($candidate->qr_link) !!}
                                            </div>
                                        </div><!-- /.modal-body -->
                                        <!-- .modal-footer -->
                                        <div class="modal-footer">
                                            <form action="{{ route('update-qrcode', ['id' => $candidate->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-warning">Update QR
                                                    Code</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </form>
                                        </div><!-- /.modal-footer -->
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                        </td>
                        <td>{{ $candidate->created_at }}</td>
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
                                        <form action="{{ route('candidates.destroy', $candidate->id) }}"
                                            method="POST">
                                            <a class="dropdown-item"
                                                href="{{ route('employees.edit', $candidate->user['id'] ?? '') }}">Edit
                                                User</a>
                                            <a class="dropdown-item"
                                                href="{{ route('candidates.show', $candidate->id) }}">Lihat Profil</a>
                                            @csrf
                                            @method('DELETE')
                                            @can('candidate-delete')
                                                <button type="submit" class="dropdown-item">Hapus</button>
                                            @endcan
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr><!-- /tr -->
                @endif
                @endforeach
            </tbody><!-- /tbody -->
        </table>
    </div>
    <ul class="pagination justify-content-center mt-4">
        {{ $data->links() }}
    </ul>
</div>
