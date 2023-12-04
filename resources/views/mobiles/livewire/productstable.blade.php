<div>
    <div class="card card-style">
        <div class="content">        
            <h3>Cari Produk!</h3>
            <div class="input-style input-style-2">
                {{-- <em>(required)</em> --}}
                <input type="text" class="form-control" name="keyword" placeholder="Cari..." wire:model="search">
            </div>
        </div>
    </div>
    <div class="card card-style">
        <div class="content mb-2">
            <table class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
                <thead>
                    <tr class="bg-gray1-dark">
                        <th scope="col" class="color-theme">ID</th>
                        <th scope="col" class="color-theme">Nama Produk</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $product)  
                    <tr>
                        <th scope="row">{{ $product->floor }}-{{ $product->corridor }}-{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}-{{ $product->accurate_id }}</th>
                        <td class="color-theme">{{ $product->name }}</td>
                        <td><a href="{{ route('products.show', $product->id) }}  class="btn btn-full btn-m bg-yellow2-dark font-900 rounded-sm shadow-l text-uppercase"">lihat</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <nav aria-label="pagination-demo">
        <ul class="pagination justify-content-center mt-4">
            {{ $data->links() }}
        </ul>
    </nav> 
</div>