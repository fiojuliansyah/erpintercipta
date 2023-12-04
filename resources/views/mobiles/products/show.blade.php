@extends('mobiles.layouts.master')

@section('title','Product Show | Intercipta Mobile')

@section('content')
<div class="page-content">
    <div class="page-title page-title-small">
        <h2><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a></h2>
    </div>
    <div class="card header-card shape-rounded" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-overlay dark-mode-tint"></div>
        <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
    </div>

    <div class="card card-style bg-theme pb-0">
        <div class="content">
            <div class="tab-controls tabs-round tab-animated tabs-small tabs-rounded shadow-xl" 
                 data-tab-items="4" 
                 data-tab-active="bg-highlight activated color-white">
                <a href="#" data-tab-active data-tab="tab-1">Informasi</a>
                <a href="#" data-tab="tab-2">Tambah</a>
                <a href="#" data-tab="tab-3">Opname</a>
                <a href="#" data-tab="tab-4">In & Out</a>
            </div>
            <div class="clearfix mb-3"></div>
            <div class="tab-content" id="tab-1">
                <div class="content">
                    <div class="d-flex">
                        <div>
                            <h1>QR Code</h1>
                        </div>
                        <div class="ml-auto">
                        </div>
                    </div>
                    <div class="mt-2 mb-2" style="text-align: center">
                        {!! html_entity_decode($product->qr_link) !!}
                    </div>
                    <div class="divider mt-3 mb-3"></div>
                    <div class="row mb-0">
                        <div class="col-4">
                            <p class="color-theme font-700">Produk</p>
                        </div>
                        <div class="col-8">
                            <p class="font-400">{{ $product->name }}</p>
                        </div>
        
                        <div class="col-4">
                            <p class="color-theme font-700">ID</p>
                        </div>
                        <div class="col-8">
                            <p class="font-400 color-highlight">{{ $product->floor }}-{{ $product->corridor }}-{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}-{{ $product->accurate_id }}</p>
                        </div>
                        
                        <div class="col-4">
                            <p class="color-theme font-700">QTY</p>
                        </div>
                        <div class="col-8">
                            <p class="font-400">{{ $selisih }}</p>
                        </div>
        
                        <div class="col-4">
                            <p class="color-theme font-700">Satuan</p>
                        </div>
                        <div class="col-8">
                            <p class="font-400">{{ $product->unit }}</p>
                        </div>
        
                        <div class="col-4">
                            <p class="color-theme font-700">Dibuat</p>
                        </div>
                        <div class="col-8">
                            <p class="font-400">{{ $product->created_at->format('d-m-Y') }}</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="tab-content" id="tab-2">
                <div class="content">
                    <div class="d-flex">
                        <div>
                            <h1>Tambah Stock</h1>
                        </div>
                        <div class="ml-auto">
                        </div>
                    </div>
                    <div class="divider mt-3 mb-3"></div>
                    <div class="row mb-0">
                        <div class="col-4">
                            <p class="color-theme font-700">Produk</p>
                        </div>
                        <div class="col-8">
                            <p class="font-400">{{ $product->name }}</p>
                        </div>
        
                        <div class="col-4">
                            <p class="color-theme font-700">ID</p>
                        </div>
                        <div class="col-8">
                            <p class="font-400 color-highlight">{{ $product->floor }}-{{ $product->corridor }}-{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}-{{ $product->accurate_id }}</p>
                        </div>
                        
                        <div class="col-4">
                            <p class="color-theme font-700">QTY</p>
                        </div>
                        <div class="col-8">
                            <p class="font-400">{{ $selisih }}</p>
                        </div>
        
                        <div class="col-4">
                            <p class="color-theme font-700">Satuan</p>
                        </div>
                        <div class="col-8">
                            <p class="font-400">{{ $product->unit }}</p>
                        </div>
        
                        <div class="col-4">
                            <p class="color-theme font-700">Dibuat</p>
                        </div>
                        <div class="col-8">
                            <p class="font-400">{{ $product->created_at->format('d-m-Y') }}</p>
                        </div>
                    </div>
                    
                </div>
                <div class="content">
                    <div class="divider mt-3 mb-3"></div>
                    <form id="add-stock" action="{{ route('quantities.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="input-style input-style-2 input-required">
                            <span class="color-highlight">Tambah Stock</span>
                            <em>(required)</em>
                            <input class="form-control" type="tel" name="in">
                        </div>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('add-stock').submit();" class="btn btn-full btn-margins  bg-highlight btn-m text-uppercase font-900 rounded-s shadow-xl">Update</a>
                    </form>
                </div>
            </div>
            <div class="tab-content" id="tab-3">    
                <div class="content">
                    <div class="d-flex">
                        <div>
                            <h1>Opname</h1>
                        </div>
                        <div class="ml-auto">
                        </div>
                    </div>
                    <div class="divider mt-3 mb-3"></div>
                    <div class="row mb-0">
                        <div class="col-4">
                            <p class="color-theme font-700">Produk</p>
                        </div>
                        <div class="col-8">
                            <p class="font-400">{{ $product->name }}</p>
                        </div>
        
                        <div class="col-4">
                            <p class="color-theme font-700">ID</p>
                        </div>
                        <div class="col-8">
                            <p class="font-400 color-highlight">{{ $product->floor }}-{{ $product->corridor }}-{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}-{{ $product->accurate_id }}</p>
                        </div>
                        
                        <div class="col-4">
                            <p class="color-theme font-700">QTY</p>
                        </div>
                        <div class="col-8">
                            <p class="font-400">{{ $selisih }}</p>
                        </div>
        
                        <div class="col-4">
                            <p class="color-theme font-700">Satuan</p>
                        </div>
                        <div class="col-8">
                            <p class="font-400">{{ $product->unit }}</p>
                        </div>
        
                        <div class="col-4">
                            <p class="color-theme font-700">Dibuat</p>
                        </div>
                        <div class="col-8">
                            <p class="font-400">{{ $product->created_at->format('d-m-Y') }}</p>
                        </div>
                    </div>
                    
                </div>
                <div class="content">
                    <div class="divider mt-3 mb-3"></div>
                    <form id="add-opname" action="{{ route('quantities.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="opname" value="1">
                        <input type="hidden" name="description" value="opname">
                        <div class="input-style input-style-2 input-required">
                            <span class="color-highlight">Opname</span>
                            <em>(required)</em>
                            <input class="form-control" type="tel" name="in">
                        </div>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('add-opname').submit();" class="btn btn-full btn-margins  bg-highlight btn-m text-uppercase font-900 rounded-s shadow-xl">Update</a>
                    </form>
                </div>
            </div>
            <div class="tab-content" id="tab-4">
                <div class="content">                    
                    <h4 class="mb-n1">History</h4>
                    <p>
                        Ini adalah History Quantity In & Out
                    </p>
                    <div class="content mb-2">
                        <table class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
                            <thead>
                                <tr class="bg-gray1-dark">
                                    <th scope="col" class="color-theme">Tanggal</th>
                                    <th scope="col" class="color-theme">In</th>
                                    <th scope="col" class="color-theme">Out</th>
                                    <th scope="col" class="color-theme">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quantities as $quantity)  
                                <tr>
                                    <th scope="row">{{ $quantity->created_at->format('d-m-y') }}</th>
                                    @if($quantity->opname == 1)
                                        <td class="color-yellow1-dark">{{ $quantity->in ?? '' }}</td>
                                    @else
                                        <td class="color-green1-dark">{{ $quantity->in ?? '' }}</td>
                                    @endif 
                                    <td class="color-red1-dark">{{ $quantity->out ?? '' }}</td>
                                    @if($quantity->opname == 1)
                                        <td class="color-yellow1-dark">{{ $quantity->description ?? '' }}</td>
                                    @else
                                        <td class="color-theme">{{ $quantity->description ?? '' }}</td>
                                    @endif 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="content mb-2">
                        <table class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
                            <thead>
                                <tr class="bg-gray1-dark">
                                    <th class="color-theme">Summary</th>
                                    <th class="color-theme"></th>
                                    <th class="color-theme"></th>
                                    <th class="color-theme"></th>
                                </tr>
                            </thead>
                            <thead>
                                <tr class="bg-gray1-dark">
                                    <th scope="col" class="color-theme">Ket</th>
                                    <th scope="col" class="color-theme">In</th>
                                    <th scope="col" class="color-theme">Out</th>
                                    <th scope="col" class="color-theme">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td  class="color-theme">Total Qty :</td>
                                    <td  class="color-theme">{{ $totalIn }}</td>
                                    <td  class="color-theme">{{ $totalOut }}</td>
                                    <td  class="color-theme">{{ $selisihQty }}</td>
                                </tr>
                                <tr>
                                    <td  class="color-theme"> last Opname:</td>
                                    <td  class="color-theme">{{ $opnameIn }}</td>
                                </tr
                                <tr>
                                    <td  class="color-theme">Final:</td>
                                    <td  class="color-theme">{{ $selisih }}</td>
                                </tr
                            </tbody>
                        </table>
                    </div>
                </div>  
            </div>
        </div>
    </div>   
</div> 
@endsection