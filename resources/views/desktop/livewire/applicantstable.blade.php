<div>
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto"> Pelamar List </h1><!-- .btn-toolbar -->
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
        <table id="usertable" class="table">
            <!-- thead -->
            <thead>
                <tr>
                    <th></th>
                    <th>No</th>
                    <th>ID User</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>QR Code</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <!-- /thead -->
            <!-- tbody -->
            <tbody>
                @foreach ($data as $key => $user)
                    <tr>
                        <td>
                            <input type="checkbox" wire:model="selectedIds" value="{{ $user->id }}">
                        </td>
                        <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                        <td>USER - {{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter{{ $user->id }}">Show</button>
                            <div class="modal fade" id="exampleModalCenter{{ $user->id }}" tabindex="-1"
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
                                                {!! html_entity_decode($user->qr_link) !!}
                                            </div>
                                        </div><!-- /.modal-body -->
                                        <!-- .modal-footer -->
                                        <div class="modal-footer">
                                            <form action="{{ route('update-qrcode-user', ['id' => $user->id]) }}"
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
                                        <form action="{{ route('employee.destroy', $user->id) }}" method="POST">
                                            <a class="dropdown-item"
                                                href="{{ route('employees.edit', $user->id) }}">Edit
                                                User</a>
                                            <a class="dropdown-item"
                                                href="{{ route('applicants.show', $user->id) }}">Lihat Profil</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">Hapus</button>
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
