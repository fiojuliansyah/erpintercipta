<div>
    <div class="card card-style">
        <div class="content mb-0">        
            <h3>Cari Lowongan!</h3>
            <p>
                These boxes will react to them when you type or select a value.
            </p>
            <div class="input-style input-style-2">
                {{-- <em>(required)</em> --}}
                <input type="text" class="form-control" name="keyword" placeholder="Cari..." wire:model="search">
            </div>
        </div>
    </div>
    @foreach ($data as $career)  
    <div class="card card-style">
        <div class="content">
            <div class="d-flex">
                {{-- <div class="text-center icon-size">
                    <img src="https://karir-production.nos.jkt-1.neo.id/logos/72/3341172/download.png" alt="">
                </div> --}}
                <div>
                    <h1 class="mb-0 font-600 font-22">{{ $career->jobname }}</h1>
                    <span class="pr-2 opacity-30">{{ $career->company['company'] }}</span>
                </div>
            </div>
            <p class="pt-3">
                <span class="badge badge-success">{{ $career->salary }}</span>
                <span class="badge badge-danger">{{ $career->graduate }}</span>
            </p>
            <a href="{{ route('jobportal-show', $career->id) }}" class="btn btn-full btn-m bg-yellow2-dark font-900 rounded-sm shadow-l text-uppercase">Lamar</a>
        </div>
    </div>
    @endforeach
    <nav aria-label="pagination-demo">
        <ul class="pagination justify-content-center mt-4">
            {{ $data->links() }}
        </ul>
    </nav> 
</div>