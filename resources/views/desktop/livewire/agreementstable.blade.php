<div class="card-deck-xl">
    <!-- .card -->
    <div class="card card-fluid">
        <!-- .card-header -->
        <div class="card-header">
            <!-- .nav-tabs -->
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#pkwt">PKWT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#perjanjian-kerja">PERJANJIAN KERJA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#penempatan">PENEMPATAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#interview">INTERVIEW USER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#bko">BKO</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active show" id="pkwt">
                    <div>
                        <div class="d-md-flex align-items-md-start">
                            <h4 class="page-title mr-sm-auto"> Agreement PKWT</h4><!-- .btn-toolbar -->
                            <div class="btn-toolbar">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-light" data-toggle="modal"
                                        data-target="#exampleModalScrollable"><i class="oi oi-data-transfer-upload"></i>
                                        <span>Upload</span></button>
                                </div>
                                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
                                    <!-- .modal-dialog -->
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <!-- .modal-content -->
                                        <div class="modal-content">
                                            <!-- .modal-header -->
                                            <div class="modal-header">
                                                <h5 id="exampleModalScrollableLabel" class="modal-title"> Upload
                                                    Agreement
                                                </h5>
                                            </div><!-- /.modal-header -->
                                            <!-- .modal-body -->
                                            <div class="modal-body">
                                                <form action="{{ route('import-agreement-all') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="custom-file">
                                                        <input type="file" name="file" class="custom-file-input"
                                                            id="customFile"><label class="custom-file-label">Hanya
                                                            Format xlsx atau
                                                            csv</label>
                                                        @error('file')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ asset('/admin/format_import/FORMAT_NEW_PKWT.xlsx') }}"
                                                            class="dropdown-item"><img
                                                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png"
                                                                width="20" alt="">&nbsp;&nbsp;Download
                                                            Format Excel</a>
                                                        <button type="submit" class="btn btn-success">Import
                                                            Data</button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-body -->
                                            <!-- .modal-footer -->
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                {{-- <div class="dropdown">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i
                                    class="oi oi-data-transfer-download"></i> <span>Export</span> <span
                                    class="fa fa-caret-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-arrow"></div><button wire:click="exportSelected" class="dropdown-item"><img
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png"
                                        width="20" alt="">&nbsp;&nbsp;Export Excel</button>
                            </div>
                        </div> --}}
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                            </div><input type="text" class="form-control" name="keyword" placeholder="Search..."
                                wire:model="search">
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
                                        @if ($agreement->addendum['title'] == 'pkwt')
                                            <tr>
                                                <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}
                                                </td>
                                                <td>AGREEMENT - {{ str_pad($agreement->id, 5, '0', STR_PAD_LEFT) }}</td>
                                                <td>{{ $agreement->title }}</td>
                                                <td>{{ $agreement->department }}</td>
                                                <td>{{ $agreement->addendum['title'] }}</td>
                                                <td>{{ $agreement->addendum?->site['name'] }}</td>
                                                <td>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Button group with nested dropdown">
                                                        <button type="submit" class="btn btn-primary">Menu</button>
                                                        <div class="btn-group" role="group">
                                                            <button id="btnGroupDrop1" type="button"
                                                                class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false"></button>
                                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                                <div class="dropdown-arrow"></div>
                                                                <form
                                                                    action="{{ route('agreements.destroy', $agreement->id) }}"
                                                                    method="POST">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('agreements.edit', $agreement->id) }}">Lihat
                                                                        Agreement</a>
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    @can('agreement-delete')
                                                                        <button type="submit"
                                                                            class="dropdown-item">Hapus</button>
                                                                    @endcan
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody><!-- /tbody -->
                            </table>
                        </div>
                        <ul class="pagination justify-content-center mt-4">
                            {{ $data->links() }}
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="perjanjian-kerja">
                    <div>
                        <div class="d-md-flex align-items-md-start">
                            <h4 class="page-title mr-sm-auto"> Agreement Perjanjian Kerja</h4><!-- .btn-toolbar -->
                            <div class="btn-toolbar">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-light" data-toggle="modal"
                                        data-target="#exampleModalScrollable"><i
                                            class="oi oi-data-transfer-upload"></i> <span>Upload</span></button>
                                </div>
                                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
                                    <!-- .modal-dialog -->
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <!-- .modal-content -->
                                        <div class="modal-content">
                                            <!-- .modal-header -->
                                            <div class="modal-header">
                                                <h5 id="exampleModalScrollableLabel" class="modal-title"> Upload
                                                    Agreement
                                                </h5>
                                            </div><!-- /.modal-header -->
                                            <!-- .modal-body -->
                                            <div class="modal-body">
                                                <form action="{{ route('import-agreement') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="custom-file">
                                                        <input type="file" name="file"
                                                            class="custom-file-input" id="customFile"><label
                                                            class="custom-file-label">Hanya Format xlsx atau
                                                            csv</label>
                                                        @error('file')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ asset('/admin/format_import/format_import_agreement.xlsx') }}"
                                                            class="dropdown-item"><img
                                                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png"
                                                                width="20" alt="">&nbsp;&nbsp;Download
                                                            Format Excel</a>
                                                        <button type="submit" class="btn btn-success">Import
                                                            Data</button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-body -->
                                            <!-- .modal-footer -->
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                {{-- <div class="dropdown">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i
                                    class="oi oi-data-transfer-download"></i> <span>Export</span> <span
                                    class="fa fa-caret-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-arrow"></div><button wire:click="exportSelected" class="dropdown-item"><img
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png"
                                        width="20" alt="">&nbsp;&nbsp;Export Excel</button>
                            </div>
                        </div> --}}
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                            </div><input type="text" class="form-control" name="keyword" placeholder="Search..."
                                wire:model="search">
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
                                        @if ($agreement->addendum['title'] == 'perjanjian kerja')
                                            <tr>
                                                <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}
                                                </td>
                                                <td>AGREEMENT - {{ str_pad($agreement->id, 5, '0', STR_PAD_LEFT) }}
                                                </td>
                                                <td>{{ $agreement->title }}</td>
                                                <td>{{ $agreement->department }}</td>
                                                <td>{{ $agreement->addendum['title'] }}</td>
                                                <td>{{ $agreement->addendum?->site['name'] }}</td>
                                                <td>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Button group with nested dropdown">
                                                        <button type="submit" class="btn btn-primary">Menu</button>
                                                        <div class="btn-group" role="group">
                                                            <button id="btnGroupDrop1" type="button"
                                                                class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false"></button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="btnGroupDrop1">
                                                                <div class="dropdown-arrow"></div>
                                                                <form
                                                                    action="{{ route('agreements.destroy', $agreement->id) }}"
                                                                    method="POST">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('agreements.edit', $agreement->id) }}">Lihat
                                                                        Agreement</a>
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    @can('agreement-delete')
                                                                        <button type="submit"
                                                                            class="dropdown-item">Hapus</button>
                                                                    @endcan
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody><!-- /tbody -->
                            </table>
                        </div>
                        <ul class="pagination justify-content-center mt-4">
                            {{ $data->links() }}
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="penempatan">
                    <div>
                        <div class="d-md-flex align-items-md-start">
                            <h4 class="page-title mr-sm-auto"> Agreement Penempatan</h4><!-- .btn-toolbar -->
                            <div class="btn-toolbar">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-light" data-toggle="modal"
                                        data-target="#exampleModalScrollable"><i
                                            class="oi oi-data-transfer-upload"></i> <span>Upload</span></button>
                                </div>
                                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
                                    <!-- .modal-dialog -->
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <!-- .modal-content -->
                                        <div class="modal-content">
                                            <!-- .modal-header -->
                                            <div class="modal-header">
                                                <h5 id="exampleModalScrollableLabel" class="modal-title"> Upload
                                                    Agreement
                                                </h5>
                                            </div><!-- /.modal-header -->
                                            <!-- .modal-body -->
                                            <div class="modal-body">
                                                <form action="{{ route('import-agreement') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="custom-file">
                                                        <input type="file" name="file"
                                                            class="custom-file-input" id="customFile"><label
                                                            class="custom-file-label">Hanya Format xlsx atau
                                                            csv</label>
                                                        @error('file')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ asset('/admin/format_import/format_import_agreement.xlsx') }}"
                                                            class="dropdown-item"><img
                                                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png"
                                                                width="20" alt="">&nbsp;&nbsp;Download
                                                            Format Excel</a>
                                                        <button type="submit" class="btn btn-success">Import
                                                            Data</button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-body -->
                                            <!-- .modal-footer -->
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                {{-- <div class="dropdown">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i
                                    class="oi oi-data-transfer-download"></i> <span>Export</span> <span
                                    class="fa fa-caret-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-arrow"></div><button wire:click="exportSelected" class="dropdown-item"><img
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png"
                                        width="20" alt="">&nbsp;&nbsp;Export Excel</button>
                            </div>
                        </div> --}}
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                            </div><input type="text" class="form-control" name="keyword" placeholder="Search..."
                                wire:model="search">
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
                                        @if ($agreement->addendum['title'] == 'penempatan')
                                            <tr>
                                                <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}
                                                </td>
                                                <td>AGREEMENT - {{ str_pad($agreement->id, 5, '0', STR_PAD_LEFT) }}
                                                </td>
                                                <td>{{ $agreement->title }}</td>
                                                <td>{{ $agreement->department }}</td>
                                                <td>{{ $agreement->addendum['title'] }}</td>
                                                <td>{{ $agreement->addendum?->site['name'] }}</td>
                                                <td>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Button group with nested dropdown">
                                                        <button type="submit" class="btn btn-primary">Menu</button>
                                                        <div class="btn-group" role="group">
                                                            <button id="btnGroupDrop1" type="button"
                                                                class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false"></button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="btnGroupDrop1">
                                                                <div class="dropdown-arrow"></div>
                                                                <form
                                                                    action="{{ route('agreements.destroy', $agreement->id) }}"
                                                                    method="POST">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('agreements.edit', $agreement->id) }}">Lihat
                                                                        Agreement</a>
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    @can('agreement-delete')
                                                                        <button type="submit"
                                                                            class="dropdown-item">Hapus</button>
                                                                    @endcan
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody><!-- /tbody -->
                            </table>
                        </div>
                        <ul class="pagination justify-content-center mt-4">
                            {{ $data->links() }}
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="interview">
                    <div>
                        <div class="d-md-flex align-items-md-start">
                            <h4 class="page-title mr-sm-auto"> Agreement Interview User</h4><!-- .btn-toolbar -->
                            <div class="btn-toolbar">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-light" data-toggle="modal"
                                        data-target="#exampleModalScrollable"><i
                                            class="oi oi-data-transfer-upload"></i> <span>Upload</span></button>
                                </div>
                                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
                                    <!-- .modal-dialog -->
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <!-- .modal-content -->
                                        <div class="modal-content">
                                            <!-- .modal-header -->
                                            <div class="modal-header">
                                                <h5 id="exampleModalScrollableLabel" class="modal-title"> Upload
                                                    Agreement
                                                </h5>
                                            </div><!-- /.modal-header -->
                                            <!-- .modal-body -->
                                            <div class="modal-body">
                                                <form action="{{ route('import-agreement') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="custom-file">
                                                        <input type="file" name="file"
                                                            class="custom-file-input" id="customFile"><label
                                                            class="custom-file-label">Hanya Format xlsx atau
                                                            csv</label>
                                                        @error('file')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ asset('/admin/format_import/format_import_agreement.xlsx') }}"
                                                            class="dropdown-item"><img
                                                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png"
                                                                width="20" alt="">&nbsp;&nbsp;Download
                                                            Format Excel</a>
                                                        <button type="submit" class="btn btn-success">Import
                                                            Data</button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-body -->
                                            <!-- .modal-footer -->
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                {{-- <div class="dropdown">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i
                                    class="oi oi-data-transfer-download"></i> <span>Export</span> <span
                                    class="fa fa-caret-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-arrow"></div><button wire:click="exportSelected" class="dropdown-item"><img
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png"
                                        width="20" alt="">&nbsp;&nbsp;Export Excel</button>
                            </div>
                        </div> --}}
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                            </div><input type="text" class="form-control" name="keyword" placeholder="Search..."
                                wire:model="search">
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
                                        @if ($agreement->addendum['title'] == 'interview user')
                                            <tr>
                                                <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}
                                                </td>
                                                <td>AGREEMENT - {{ str_pad($agreement->id, 5, '0', STR_PAD_LEFT) }}
                                                </td>
                                                <td>{{ $agreement->title }}</td>
                                                <td>{{ $agreement->department }}</td>
                                                <td>{{ $agreement->addendum['title'] }}</td>
                                                <td>{{ $agreement->addendum?->site['name'] }}</td>
                                                <td>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Button group with nested dropdown">
                                                        <button type="submit" class="btn btn-primary">Menu</button>
                                                        <div class="btn-group" role="group">
                                                            <button id="btnGroupDrop1" type="button"
                                                                class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false"></button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="btnGroupDrop1">
                                                                <div class="dropdown-arrow"></div>
                                                                <form
                                                                    action="{{ route('agreements.destroy', $agreement->id) }}"
                                                                    method="POST">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('agreements.edit', $agreement->id) }}">Lihat
                                                                        Agreement</a>
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    @can('agreement-delete')
                                                                        <button type="submit"
                                                                            class="dropdown-item">Hapus</button>
                                                                    @endcan
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody><!-- /tbody -->
                            </table>
                        </div>
                        <ul class="pagination justify-content-center mt-4">
                            {{ $data->links() }}
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="bko">
                    <div>
                        <div class="d-md-flex align-items-md-start">
                            <h4 class="page-title mr-sm-auto"> Agreement BKO</h4><!-- .btn-toolbar -->
                            <div class="btn-toolbar">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-light" data-toggle="modal"
                                        data-target="#exampleModalScrollable"><i
                                            class="oi oi-data-transfer-upload"></i> <span>Upload</span></button>
                                </div>
                                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
                                    <!-- .modal-dialog -->
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <!-- .modal-content -->
                                        <div class="modal-content">
                                            <!-- .modal-header -->
                                            <div class="modal-header">
                                                <h5 id="exampleModalScrollableLabel" class="modal-title"> Upload
                                                    Agreement
                                                </h5>
                                            </div><!-- /.modal-header -->
                                            <!-- .modal-body -->
                                            <div class="modal-body">
                                                <form action="{{ route('import-agreement') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="custom-file">
                                                        <input type="file" name="file"
                                                            class="custom-file-input" id="customFile"><label
                                                            class="custom-file-label">Hanya Format xlsx atau
                                                            csv</label>
                                                        @error('file')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ asset('/admin/format_import/format_import_agreement.xlsx') }}"
                                                            class="dropdown-item"><img
                                                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png"
                                                                width="20" alt="">&nbsp;&nbsp;Download
                                                            Format Excel</a>
                                                        <button type="submit" class="btn btn-success">Import
                                                            Data</button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-body -->
                                            <!-- .modal-footer -->
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                {{-- <div class="dropdown">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i
                                    class="oi oi-data-transfer-download"></i> <span>Export</span> <span
                                    class="fa fa-caret-down"></span></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-arrow"></div><button wire:click="exportSelected" class="dropdown-item"><img
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png"
                                        width="20" alt="">&nbsp;&nbsp;Export Excel</button>
                            </div>
                        </div> --}}
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                            </div><input type="text" class="form-control" name="keyword" placeholder="Search..."
                                wire:model="search">
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
                                        @if ($agreement->addendum['title'] == 'bko')
                                            <tr>
                                                <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}
                                                </td>
                                                <td>AGREEMENT - {{ str_pad($agreement->id, 5, '0', STR_PAD_LEFT) }}
                                                </td>
                                                <td>{{ $agreement->title }}</td>
                                                <td>{{ $agreement->department }}</td>
                                                <td>{{ $agreement->addendum['title'] }}</td>
                                                <td>{{ $agreement->addendum?->site['name'] }}</td>
                                                <td>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Button group with nested dropdown">
                                                        <button type="submit" class="btn btn-primary">Menu</button>
                                                        <div class="btn-group" role="group">
                                                            <button id="btnGroupDrop1" type="button"
                                                                class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false"></button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="btnGroupDrop1">
                                                                <div class="dropdown-arrow"></div>
                                                                <form
                                                                    action="{{ route('agreements.destroy', $agreement->id) }}"
                                                                    method="POST">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('agreements.edit', $agreement->id) }}">Lihat
                                                                        Agreement</a>
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    @can('agreement-delete')
                                                                        <button type="submit"
                                                                            class="dropdown-item">Hapus</button>
                                                                    @endcan
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody><!-- /tbody -->
                            </table>
                        </div>
                        <ul class="pagination justify-content-center mt-4">
                            {{ $data->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
