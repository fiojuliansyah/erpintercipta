<div>
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto"> Pkwt List </h1><!-- .btn-toolbar -->
        <div class="btn-toolbar">
            <div class="dropdown">
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#esign"><i
                        class="oi oi-key"></i> <span>Buat Tanda Tangan Digital</span></button>
            </div>
            <div class="modal fade" id="esign" tabindex="-1" role="dialog" aria-labelledby="esignLabel"
                aria-hidden="true">
                <!-- .modal-dialog -->
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <!-- .modal-content -->
                    <div class="modal-content">
                        <!-- .modal-header -->
                        <div class="modal-header">
                            <h5 id="esignLabel" class="modal-title"> Buat Tanda Tangan </h5>
                        </div><!-- /.modal-header -->
                        <!-- .modal-body -->
                        <div class="modal-body">
                            <form action="{{ url('esigns') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    @if (Auth::user()->esign == null)
                                        <canvas id="signatureCanvas" width="500" height="200"></canvas>
                                    @else
                                        <img src="{{ Storage::url(Auth::user()->esign['signatureDataUrl']) }}"
                                            width="300" alt="">
                                    @endif
                                </div><!-- /.modal-body -->
                                <!-- .modal-footer -->
                                <div class="modal-footer">
                                    @if (Auth::user()->esign == null)
                                        <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">Keluar</button>
                                        <button id="saveButton" class="btn btn-primary">Simpan</button>
                                    @else
                                        <span class="badge badge-success">Anda Sudah Punya Tanda Tangan</span>
                                    @endif
                                </div><!-- /.modal-footer -->
                            </form>
                        </div><!-- /.modal-body -->
                        <!-- .modal-footer -->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
        </div>
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
                            <h5 id="exampleModalScrollableLabel" class="modal-title"> Upload Data New PKWT </h5>
                        </div><!-- /.modal-header -->
                        <!-- .modal-body -->
                        <div class="modal-body">
                            <form action="{{ route('import-agreement-all') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input"
                                        id="customFile"><label class="custom-file-label">Hanya Format xlsx atau
                                        csv</label>
                                    @error('file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ asset('/admin/format_import/FORMAT_NEW_PKWT.xlsx') }}"
                                        class="dropdown-item"><img
                                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png"
                                            width="20" alt="">&nbsp;&nbsp;Download Format Excel</a>
                                    <button type="submit" class="btn btn-success">Import Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.modal-dialog -->
            </div>
            <div class="dropdown">
                <button type="button" class="btn btn-light" data-toggle="dropdown"><i
                        class="oi oi-data-transfer-download"></i> <span>Export</span> <span
                        class="fa fa-caret-down"></span></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <p style="text-align: center">Export Pkwt</p>
                    <div class="dropdown-arrow"></div><button wire:click="exportSelected" class="dropdown-item"><img
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png"
                            width="20" alt="">&nbsp;&nbsp;Export Excel</button>
                    <div class="dropdown-arrow"></div><button wire:click="exportPdf" class="dropdown-item"><img
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/PDF_icon.svg/1792px-PDF_icon.svg.png"
                            width="20" alt="">&nbsp;&nbsp;Export PDF</button>
                    <br>
                    <p style="text-align: center">Export Agreement</p>
                    <div class="dropdown-arrow"></div><button wire:click="exportSelected" class="dropdown-item"><img
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png"
                            width="20" alt="">&nbsp;&nbsp;Export Excel</button>
                    <div class="dropdown-arrow"></div><button wire:click="exportPdf" class="dropdown-item"><img
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/PDF_icon.svg/1792px-PDF_icon.svg.png"
                            width="20" alt="">&nbsp;&nbsp;Export PDF</button>
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
                <select class="custom-select" wire:model="selectedCompany" name="company">
                    <option value="">Pilih Perusahaan</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->company }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <select class="custom-select" wire:model="selectedProject" name="project">
                    <option value="">Pilih Project</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
        </div> 
        <div class="col-md-3">
            <div class="form-group">
                <select class="custom-select" wire:model="selectedTitle" name="title">
                    <option value="">Pilih Judul</option>
                    @foreach ($addendums->unique('title') as $addendum)
                        <option value="{{ $addendum->title }}">{{ $addendum->title }}</option>
                    @endforeach
                </select>
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
                    <th>Addendum</th>
                    <th>Nama</th>
                    <th>Signature</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <!-- /thead -->
            <!-- tbody -->
            <tbody>
                @foreach ($data as $key => $pkwt)
                    <tr>
                        <td>
                            <input type="checkbox" wire:model="selectedIds" value="{{ $pkwt->id }}">
                        </td>
                        <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                        <td>
                            {{ $pkwt->agreement->addendum['title'] }} {{ $pkwt->agreement->addendum->site['description'] }}
                        <br>
                        <small>
                            {{ $pkwt->agreement->addendum->site->company['company'] ?? 'Tidak ada Data' }}
                        </small>
                        </td>
                        <td>
                            {{ $pkwt->user['name'] ?? 'Tidak ada Data' }}
                        <br>
                        <small>
                            APPLICANT - {{ str_pad($pkwt->user['id'] ?? 'Tidak ada Data', 5, '0', STR_PAD_LEFT) }}
                        </small>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-4">
                                    Employee
                                </div>
                                <div class="col-8">
                                    @if ($pkwt->user?->signature == null)
                                        : <span class="badge badge-danger">Belum Tertanda Tangan</span>
                                    @else
                                        : <span class="badge badge-success">Sudah Tertanda Tangan</span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-4">
                                    HRD
                                </div>
                                <div class="col-8">
                                    @if ($pkwt->signature_hrd == null)
                                        : <span class="badge badge-danger">Belum Tertanda Tangan</span>
                                    @else
                                        : <span class="badge badge-success">Sudah Tertanda Tangan</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <form action="{{ route('pkwts.update', $pkwt->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary">Approve</button>
                                </form>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <div class="dropdown-arrow"></div>
                                        <a class="dropdown-item"
                                            href="{{ route('pkwts.show', $pkwt->id) }}">Lihat Pkwt</a>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalAlertWarning{{ $pkwt->id }}">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr><!-- /tr -->
                    <div wire:ignore>
                    <div class="modal modal-alert fade" id="exampleModalAlertWarning{{ $pkwt->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalAlertWarningLabel{{ $pkwt->id }}" aria-hidden="true">
                        <!-- .modal-dialog -->
                        <div class="modal-dialog" role="document">
                          <!-- .modal-content -->
                          <div class="modal-content">
                            <!-- .modal-header -->
                            <div class="modal-header">
                              <h5 id="exampleModalAlertWarningLabel{{ $pkwt->id }}" class="modal-title">
                                <i class="fa fa-bullhorn text-danger mr-1"></i> Apakah anda yakin?</h5>
                            </div><!-- /.modal-header -->
                            <!-- .modal-body -->
                                <form action="{{ route('pkwts.destroy', $pkwt->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    @can('pkwt-delete')
                                    <div class="modal-body">
                                        Detail PKWT :
                                        <br>
                                        <br>
                                        Addendum :
                                         {{ $pkwt->agreement->addendum['title'] }} {{ $pkwt->agreement->addendum->site['description'] }}
                                         <br>
                                         Karyawan :
                                         {{ $pkwt->user['name'] ?? 'Tidak ada Data' }}
                                    </div><!-- /.modal-body -->
                                    <!-- .modal-footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button> <button type="submit" class="btn btn-danger">Hapus</button>
                                    </div><!-- /.modal-footer -->
                                    @endcan
                                </form>
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                    </div>
                @endforeach
            </tbody><!-- /tbody -->
        </table>
    </div>
    <ul class="pagination justify-content-center mt-4">
        {{ $data->links() }}
    </ul>
</div>

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@3.0.0/signature_pad.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var canvas = document.getElementById('signatureCanvas');
            var signaturePad = new SignaturePad(canvas);
            var saveButton = document.getElementById('saveButton');

            saveButton.addEventListener('click', function() {
                if (signaturePad.isEmpty()) {
                    alert('Tanda tangan kosong, silakan tanda tangan');
                } else {
                    if (!saveButton.disabled) {
                        saveButton.disabled = false; // Menonaktifkan tombol
                        var signatureDataUrl = signaturePad.toDataURL();
                        saveSignature(signatureDataUrl);
                    }
                }
            });

            function saveSignature(signatureDataUrl) {
                fetch('{{ url('esigns') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            signatureDataUrl: signatureDataUrl
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        signaturePad.clear();
                        // Mengarahkan ke dasbor jika tanda tangan berhasil disimpan
                        if (data.success) {
                            window.location.href = '{{ url('/pkwts') }}';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        });
    </script>
@endpush
