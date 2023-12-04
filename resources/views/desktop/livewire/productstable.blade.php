<div>
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto"> List Produk </h1><!-- .btn-toolbar -->
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
                            <h5 id="exampleModalScrollableLabel" class="modal-title"> Upload Produk </h5>
                        </div><!-- /.modal-header -->
                        <!-- .modal-body -->
                        {{-- <div class="modal-body">
                            <form action="{{ route('import-product') }}" method="POST" enctype="multipart/form-data">
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
                                    <a href="{{ asset('/admin/format_import/format_import_product.xlsx') }}"
                                        class="dropdown-item"><img
                                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Microsoft_Excel_2013-2019_logo.svg/2170px-Microsoft_Excel_2013-2019_logo.svg.png"
                                            width="20" alt="">&nbsp;&nbsp;Download Format Excel</a>
                                    <button type="submit" class="btn btn-success">Import Data</button>
                                </div>
                            </form>
                        </div><!-- /.modal-body --> --}}
                        <!-- .modal-footer -->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <div class="dropdown">
                <button type="button" class="btn btn-light" data-toggle="dropdown"><i
                        class="oi oi-data-transfer-download"></i> <span>Export</span> <span
                        class="fa fa-caret-down"></span></button>
                <div class="dropdown-menu dropdown-menu-right">
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
                    <th width="50px"></th>
                    <th>No</th>
                    <th>Accurate ID</th>
                    <th>Nama Produk</th>
                    <th>Unit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <!-- /thead -->
            <!-- tbody -->
            <tbody>
                @foreach ($data as $key => $product)
                    <tr>
                        <td>
                            <input type="checkbox" wire:model="selectedIds" value="{{ $product->id }}">
                        </td>
                        <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                        <td>{{ $product->accurate_id ?? '' }}</td>
                        <td>{{ $product->name ?? '' }}</td>
                        <td>{{ $product->unit ?? '' }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <button class="btn btn-primary">Menu</button>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <div class="dropdown-arrow"></div>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            <a class="dropdown-item"
                                                href="{{ route('products.show', $product->id) }}">Lihat Product</a>
                                            @csrf
                                            @method('DELETE')
                                            @can('product-delete')
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
