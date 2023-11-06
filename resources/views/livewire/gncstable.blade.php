<div>
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto"> GNC List </h1><!-- .btn-toolbar -->
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
                    <th>Nama</th>
                    <th>Site / Project</th>
                    <th>Berkas</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <!-- /thead -->
            <!-- tbody -->
            <tbody>
                @foreach ($data as $key => $training)
                @if ($training->status == 2)
                    <tr>
                        <td>
                            <input type="checkbox" wire:model="selectedIds" value="{{ $training->id }}">
                        </td>
                        {{-- <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td> --}}
                        <td>USER - {{ str_pad($training->user['id'], 5, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $training->user['name'] }}</td>
                        <td>{{ $training->site['name'] }}</td>         
                        <td><a class="btn btn-primary" href="{{ route('trainings.show', $training->id) }}">Print</a></td>               
                        <td>
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <a href="https://google.com">
                                    <button type="button" class="btn btn-primary">Menu</button>
                                </a>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <div class="dropdown-arrow"></div>
                                        <form action="{{ route('trainings.destroy', $training->id) }}" method="POST">
                                            <a class="dropdown-item"
                                                href="{{ route('trainings.edit', $training->id) }}">Edit
                                                Status</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">Hapus</button>
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
