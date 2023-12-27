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
          <a class="nav-link" data-toggle="tab" href="#interview">INTERVIEW</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#bko">BKO</a>
        </li>
      </ul><!-- /.nav-tabs -->
    </div><!-- /.card-header -->
    <!-- .card-body -->
    <div class="card-body">
      <!-- .tab-content -->
      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active show" id="pkwt">
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
                        <th>Addindum ID</th>
                        <th>Tipe Surat</th>
                        <th>Perusahaan</th>
                        <th>Site</th>
                        <th width="100px"></th>
                    </tr>
                  </thead>
                  <!-- /thead -->
                  <!-- tbody -->
                  <tbody>
                    @foreach ($data as $key => $addendum)
                    @if ($addendum->title == 'pkwt')
                    <tr>
                        <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                        <td>ADDINDUM - {{ str_pad($addendum->id, 5, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $addendum->title ?? 'Tidak ada Data' }}</td>
                        <td>{{ $addendum->site?->company['company'] ?? 'Tidak ada Data' }}</td>
                        <td>{{ $addendum->site['name'] ?? 'Tidak ada Data' }}</td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                  <button type="submit" class="btn btn-primary">Menu</button>
                              <div class="btn-group" role="group">
                                  <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                      <div class="dropdown-arrow"></div>
                                      <form action="{{ route('addendums.destroy', $addendum->id) }}" method="POST">
                                          <a class="dropdown-item"
                                              href="{{ route('addendums.edit', $addendum->id) }}">Lihat Addendum</a>
                                          @csrf
                                          @method('DELETE')
                                          @can('addendum-delete')
                                              <button type="submit" class="dropdown-item">Hapus</button>
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
                        <th>Addindum ID</th>
                        <th>Tipe Surat</th>
                        <th>Perusahaan</th>
                        <th>Site</th>
                        <th width="100px"></th>
                    </tr>
                  </thead>
                  <!-- /thead -->
                  <!-- tbody -->
                  <tbody>
                    @foreach ($data as $key => $addendum)
                    @if ($addendum->title == 'perjanjian kerja')
                    <tr>
                        <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                        <td>ADDINDUM - {{ str_pad($addendum->id, 5, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $addendum->title ?? 'Tidak ada Data' }}</td>
                        <td>{{ $addendum->site?->company['company'] ?? 'Tidak ada Data' }}</td>
                        <td>{{ $addendum->site['name'] ?? 'Tidak ada Data' }}</td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                  <button type="submit" class="btn btn-primary">Menu</button>
                              <div class="btn-group" role="group">
                                  <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                      <div class="dropdown-arrow"></div>
                                      <form action="{{ route('addendums.destroy', $addendum->id) }}" method="POST">
                                          <a class="dropdown-item"
                                              href="{{ route('addendums.edit', $addendum->id) }}">Lihat Addendum</a>
                                          @csrf
                                          @method('DELETE')
                                          @can('addendum-delete')
                                              <button type="submit" class="dropdown-item">Hapus</button>
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
                        <th>Addindum ID</th>
                        <th>Tipe Surat</th>
                        <th>Perusahaan</th>
                        <th>Site</th>
                        <th width="100px"></th>
                    </tr>
                  </thead>
                  <!-- /thead -->
                  <!-- tbody -->
                  <tbody>
                    @foreach ($data as $key => $addendum)
                    @if ($addendum->title == 'penempatan')
                    <tr>
                        <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                        <td>ADDINDUM - {{ str_pad($addendum->id, 5, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $addendum->title ?? 'Tidak ada Data' }}</td>
                        <td>{{ $addendum->site?->company['company'] ?? 'Tidak ada Data' }}</td>
                        <td>{{ $addendum->site['name'] ?? 'Tidak ada Data' }}</td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                  <button type="submit" class="btn btn-primary">Menu</button>
                              <div class="btn-group" role="group">
                                  <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                      <div class="dropdown-arrow"></div>
                                      <form action="{{ route('addendums.destroy', $addendum->id) }}" method="POST">
                                          <a class="dropdown-item"
                                              href="{{ route('addendums.edit', $addendum->id) }}">Lihat Addendum</a>
                                          @csrf
                                          @method('DELETE')
                                          @can('addendum-delete')
                                              <button type="submit" class="dropdown-item">Hapus</button>
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
                        <th>Addindum ID</th>
                        <th>Tipe Surat</th>
                        <th>Perusahaan</th>
                        <th>Site</th>
                        <th width="100px"></th>
                    </tr>
                  </thead>
                  <!-- /thead -->
                  <!-- tbody -->
                  <tbody>
                    @foreach ($data as $key => $addendum)
                    @if ($addendum->title == 'interview user')
                    <tr>
                        <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                        <td>ADDINDUM - {{ str_pad($addendum->id, 5, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $addendum->title ?? 'Tidak ada Data' }}</td>
                        <td>{{ $addendum->site?->company['company'] ?? 'Tidak ada Data' }}</td>
                        <td>{{ $addendum->site['name'] ?? 'Tidak ada Data' }}</td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                  <button type="submit" class="btn btn-primary">Menu</button>
                              <div class="btn-group" role="group">
                                  <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                      <div class="dropdown-arrow"></div>
                                      <form action="{{ route('addendums.destroy', $addendum->id) }}" method="POST">
                                          <a class="dropdown-item"
                                              href="{{ route('addendums.edit', $addendum->id) }}">Lihat Addendum</a>
                                          @csrf
                                          @method('DELETE')
                                          @can('addendum-delete')
                                              <button type="submit" class="dropdown-item">Hapus</button>
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
                        <th>Addindum ID</th>
                        <th>Tipe Surat</th>
                        <th>Perusahaan</th>
                        <th>Site</th>
                        <th width="100px"></th>
                    </tr>
                  </thead>
                  <!-- /thead -->
                  <!-- tbody -->
                  <tbody>
                    @foreach ($data as $key => $addendum)
                    @if ($addendum->title == 'bko')
                    <tr>
                        <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                        <td>ADDINDUM - {{ str_pad($addendum->id, 5, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $addendum->title ?? 'Tidak ada Data' }}</td>
                        <td>{{ $addendum->site?->company['company'] ?? 'Tidak ada Data' }}</td>
                        <td>{{ $addendum->site['name'] ?? 'Tidak ada Data' }}</td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                  <button type="submit" class="btn btn-primary">Menu</button>
                              <div class="btn-group" role="group">
                                  <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                      <div class="dropdown-arrow"></div>
                                      <form action="{{ route('addendums.destroy', $addendum->id) }}" method="POST">
                                          <a class="dropdown-item"
                                              href="{{ route('addendums.edit', $addendum->id) }}">Lihat Addendum</a>
                                          @csrf
                                          @method('DELETE')
                                          @can('addendum-delete')
                                              <button type="submit" class="dropdown-item">Hapus</button>
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
