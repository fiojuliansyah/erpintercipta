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
                    <th>Nama Project / Site</th>
                    <th>Show Document</th>
                    <th width="100px"></th>
                </tr>
            </thead>
            <!-- /thead -->
            <!-- tbody -->
            <tbody>
                @foreach ($data as $key => $site)
                    <tr>
                        <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                        <td>{{ $site->company['cmpy'] }} - {{ $site->name }}</td>
                        <td>
                            @if ($site->show_document == '1')
                                <span class="badge badge-success">Tampil</span>
                            @elseif ($site->show_document == null)
                            @endif
                        </td>
                        <td class="align-middle text-right">
                            <form action="{{ route('sites.destroy', $site->id) }}" method="POST">
                                <a href="{{ route('sites.edit', $site->id) }}"
                                    class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span
                                        class="sr-only">Edit</span></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-icon btn-secondary"><i
                                        class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></button>
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
