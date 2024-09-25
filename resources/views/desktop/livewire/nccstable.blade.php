<div>
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto"> List Kandidat </h1>
        <div class="btn-toolbar">
            <form action="{{ route('candidates.updateBarcodeAll') }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-light"><i
                    class="fas fa-qrcode"></i> <span>Update QRCode Kandidat</span></button>
            </form>            
            <div class="dropdown">
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#updateStatus"><i
                        class="oi oi-laptop"></i> <span>Update Status Kandidat</span></button>
            </div>
            <div class="modal fade" id="updateStatus" tabindex="-1" role="dialog" aria-labelledby="updateStatusLabel"
                aria-hidden="true">
                <!-- .modal-dialog -->
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <!-- .modal-content -->
                    <div class="modal-content">
                        <!-- .modal-header -->
                        <div class="modal-header">
                            <h5 id="updateStatusLabel" class="modal-title"> Data Screening
                            </h5>
                        </div><!-- /.modal-header -->
                        <!-- .modal-body -->
                        <div class="modal-body">
                            <div class="card card-fluid">
                                <!-- .card-header -->
                                <div class="card-header">
                                    <!-- .nav-tabs -->
                                    <ul class="nav nav-tabs card-header-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active show" data-toggle="tab"
                                                href="#orientasi">Orientasi</a>
                                        </li>
                                    </ul><!-- /.nav-tabs -->
                                </div><!-- /.card-header -->
                                <!-- .card-body -->
                                <div class="card-body">
                                    <!-- .tab-content -->
                                    <div id="myTabContent" class="tab-content">
                                        <div class="tab-pane fade active show" id="orientasi">
                                            <form  wire:submit.prevent="submitUpdate">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="bss3">Pilih
                                                            Training</label>
                                                        <input list="statuss" class="form-control" wire:model.defer="status"
                                                            id="status">
                                                        <datalist id="statuss">
                                                            <option value="0">Pilih</option>
                                                            <option value="1">PENDING</option>
                                                            <option value="2">NCC</option>
                                                            <option value="3">GNC</option>
                                                            <option value="4">Interview User</option>
                                                            <option value="5">Reject</option>
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="bss3">Pilih Karir</label>
                                                        <input list="careers" class="form-control" wire:model.defer="career_id"
                                                            id="career">
                                                        <datalist id="careers">
                                                            @foreach ($careers as $career)
                                                                <option value="{{ $career->id }}">
                                                                    {{ $career->company['cmpy'] }} -
                                                                    {{ $career->jobname }}
                                                                </option>
                                                            @endforeach
                                                        </datalist>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Note Untuk Pelamar</label>
                                                        <textarea class="form-control" wire:model.defer="description_user"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Note Untuk Client</label>
                                                        <textarea class="form-control" wire:model.defer="description_client"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Jadwal</label>
                                                        <input type="date" class="form-control" wire:model.defer="date">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="bss3">Pilih Site /
                                                            Project</label>
                                                        <input list="sites" class="form-control" wire:model.defer="site_id" id="site">
                                                        <datalist id="sites">
                                                            @foreach ($sites as $site)
                                                                <option value="{{ $site->id }}">
                                                                    {{ $site->company['cmpy'] }} - {{ $site->name }}
                                                                </option>
                                                            @endforeach
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Ketemu / Penanggung Jawab</label>
                                                        <input type="text" class="form-control" wire:model.defer="responsible">
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-dismiss="modal">CLose</button>
                                                    <button type="submit" class="btn btn-warning">Submit</button>
                                                </div><!-- /.modal-footer -->
                                            </form>
                                        </div>
                                    </div><!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                        </div><!-- /.modal-body -->
                        <!-- .modal-footer -->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
        </div>
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
        </div>
    </div>
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto"> NCC List </h1><!-- .btn-toolbar -->
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
        <div class="col-md-4">
            <div class="form-group">
                <select class="custom-select" wire:model="selectedProject" name="project">
                    <option value="">Select Project</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>     
    </div>
    <div class="table-responsive">
        <table id="trainingtable" class="table">
            <!-- thead -->
            <thead>
                <tr>
                    <th></th>
                    <th>No</th>
                    {{-- <th>ID User</th> --}}
                    <th>Name</th>
                    <th>Site / Project</th>
                    <th>Berkas</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <!-- /thead -->
            <!-- tbody -->
            <tbody>
                @foreach ($data as $key => $candidate)
                @if ($candidate->status == 2)
                    <tr>
                        <td>
                            <input type="checkbox" wire:model="selectedIds" value="{{ $candidate->id }}">
                        </td>
                        {{-- <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td> --}}
                        <td>USER - {{ str_pad($candidate->user['id'], 5, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $candidate->user['name'] ?? 'Tidak ada Data' }}</td>
                        <td>{{ $candidate->site['name'] ?? 'Tidak ada Data' }}</td>
                        <td><a class="btn btn-primary" target="blank" href="{{ route('document-print', $candidate->id) }}">Print</a></td>               
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
                                                href="{{ route('employees.edit', $candidate->user['id'] ?? 'Tidak ada Data') }}">Edit
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
