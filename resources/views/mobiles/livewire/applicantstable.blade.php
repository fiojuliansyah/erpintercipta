<div>
    <div class="card card-style">
        <div class="content mb-0">        
            <h3>Cari Pelamar!</h3>
            <p>
                These boxes will react to them when you type or select a value.
            </p>
            <div class="input-style input-style-2">
                {{-- <em>(required)</em> --}}
                <input type="text" class="form-control" name="keyword" placeholder="Cari..." wire:model="search">
            </div>
        </div>
        <div class="content mb-0">
            <div class="content mt-0 mb-0">           
                <div class="list-group list-custom-small list-icon-0">
                    @foreach ($data as $key => $candidate)  
                        @if ($candidate->status == 0)
                            <a href="{{ route('candidates.show', $candidate->id) }}"><span>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}. </span><span>{{ $candidate->user['name'] ?? 'Tidak ada Data' }}</span><i class="fa fa-angle-right"></i></a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="pagination-demo">
        <ul class="pagination justify-content-center mt-4">
            {{ $data->links() }}
        </ul>
    </nav> 
</div>