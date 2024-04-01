@extends('mobiles.layouts.master')

@section('title','Request Item | Intercipta Mobile')
@section('content')
<div id="page">
    <div class="page-content" style="min-height:60vh!important">
        <div class="page-title page-title-small">
            <h2><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>Inputs</h2>
        </div>
        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
        </div>
        
        <div class="card card-style">
            <p class="card-body">
                Input fileds for text, email, password, website, text area, range sliders and much more.
            </p>
        </div>

        <div class="card card-style">
            <form method="POST" action="{{ route('import-user') }}"> <!-- Form untuk POST -->
                <div class="content">        
                    @csrf
                    <div class="row">
                        
                    </div>
                </div>
                <span id="tambahBtn" class="btn btn-full btn-margins bg-primary rounded-sm shadow-xl btn-m text-uppercase font-900">+ tambah item</span>
                    <button type="submit" class="btn btn-full btn-margins bg-highlight rounded-sm shadow-xl btn-m text-uppercase font-900">SUBMIT</button>
            </form>
        </div>
    </div> 
</div>
@endsection

@push('js')
<script>
    document.getElementById('tambahBtn').addEventListener('click', function() {
        // Buat elemen baris baru
        var newRow = document.createElement('div');
        newRow.classList.add('row');

        // Isi elemen baris baru dengan elemen kolom sesuai kebutuhan
        newRow.innerHTML = `
            <div class="col-9">
                <div class="input-style input-style-1 input-required">
                    <select name="product_id[]" class="form-control">
                        <option value="default" disabled selected>Pilih Barang</option>
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} ({{ $product->accurate_id }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="input-style input-style-1 input-required">
                    <input name="qty[]" class="form-control" type="name" placeholder="qty">
                </div>         
            </div>
        `;

        // Masukkan elemen baris baru ke dalam elemen dengan class "content"
        document.querySelector('.content').appendChild(newRow);
    });
</script> 
@endpush
