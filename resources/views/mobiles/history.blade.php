@extends('mobiles.layouts.master')

@section('title', 'History | InterCipta ERP Management')

@section('content')
    <div class="page-content">

        <div class="page-title page-title-small">
            <div style="position: fixed; top: 20px; right: 20px; z-index: 1000; width: 300px;">
                @if(session('success'))
                    <div class="show-business-opened mb-4">
                        <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-green1-dark" role="alert">
                            <span><i class="fa fa-check"></i></span>
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
                        </div>
                    </div>
                @endif
                @if(session('error'))
                    <div class="show-business-opened mb-4">
                        <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-red1-dark" role="alert">
                            <span><i class="fas fa-exclamation-triangle"></i></span>
                            <strong>{{ session('error') }}</strong>
                            <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
                        </div>
                    </div>
                @endif
            </div>
            <h2>Histori</h2>
        </div>
        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
        </div>

        @foreach ($candidates as $candidate)
            <div class="card card-style">
                <div class="content">
                    <h4>{{ $candidate->career['jobname'] }}</h4>
                    <p class="mb-n1 font-600 color-highlight">{{ $candidate->career['location'] }}</p>
                    <br>
                    <a href="#" class="d-flex" data-menu="menu-share-list">
                        <div class="align-self-center mr-2">
                            @if ($candidate->status == '0')
                                <h4 class="btn-warning color-white rounded-sm shadow-l font-12 font-400 p-1 px-2 mt-0 mb-3">
                                    Cek Berkas</h4>
                            @elseif ($candidate->status == '1')
                                <h4 class="btn-primary color-white rounded-sm shadow-l font-12 font-400 p-1 px-2 mt-0 mb-3">
                                    Pending</h4>
                            @elseif ($candidate->status == '2')
                                <h4 class="btn-success color-white rounded-sm shadow-l font-12 font-400 p-1 px-2 mt-0 mb-3">
                                    NCC</h4>
                            @elseif ($candidate->status == '3')
                                <h4 class="btn-success color-white rounded-sm shadow-l font-12 font-400 p-1 px-2 mt-0 mb-3">
                                    GNC</h4>
                            @elseif ($candidate->status == '4')
                                <h4 class="btn-primary color-white rounded-sm shadow-l font-12 font-400 p-1 px-2 mt-0 mb-3">
                                    Interview User</h4>
                            @elseif ($candidate->status == '5')
                                <h4 class="btn-danger color-white rounded-sm shadow-l font-12 font-400 p-1 px-2 mt-0 mb-3">
                                    Ditolak</h4>
                            @endif
                        </div>
                        <div>
                            <h6 class="align-self-center mb-n2 mt-0">
                                {{ Carbon\Carbon::parse($candidate->updated_at)->format('h:i') }}</h6>
                            <span
                                class="d-block mb-0 font-11">{{ Carbon\Carbon::parse($candidate->updated_at)->format('d F Y') }}</span>
                        </div>
                        <div class="align-self-center ml-auto">
                            <h6 class="text-right mb-n1 mt-n2">{{ $candidate->career['graduate'] }}</h6>
                            <span
                                class="color-green1-dark d-block mt-n2 font-10 text-right">{{ $candidate->career['experience'] }}</span>
                        </div>
                    </a>

                </div>
            </div>
        @endforeach
        <div id="menu-share-list" class="menu menu-box-modal menu-box-detached rounded-m" data-menu-height="360"
            data-menu-width="320" data-menu-effect="menu-over">
            <h1 class="text-center font-700 mt-3 pt-2">Histori</h1>
            <div class="list-group list-custom-small pl-1 pr-3">
                @foreach ($statories as $item)
                    <a href="#">
                        @if ($item->status == '0')
                            <p>{{ Carbon\Carbon::parse($item->created_at)->format('h:i') }} 
                                <span class="font-13">&nbsp;Cek Berkas</span>
                                <i class="fa fa-date"> {{ Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</i>
                            </p>
                        @elseif ($item->status == '1')
                            <p>{{ Carbon\Carbon::parse($item->created_at)->format('h:i') }} 
                                <span class="font-13">&nbsp;Pending</span>
                                <i class="fa fa-date"> {{ Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</i>
                            </p>
                        @elseif ($item->status == '2')
                            <p>{{ Carbon\Carbon::parse($item->created_at)->format('h:i') }} 
                                <span class="font-13">&nbsp;Training NCC</span>
                                <i class="fa fa-date"> {{ Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</i>
                            </p>
                        @elseif ($item->status == '3')
                            <p>{{ Carbon\Carbon::parse($item->created_at)->format('h:i') }} 
                                <span class="font-13">&nbsp;Training GNC</span>
                                <i class="fa fa-date"> {{ Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</i>
                            </p>
                        @elseif ($item->status == '4')
                            <p>{{ Carbon\Carbon::parse($item->created_at)->format('h:i') }} 
                                <span class="font-13">&nbsp;Interview User</span>
                                <i class="fa fa-date"> {{ Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</i>
                            </p>
                        @elseif ($item->status == '5')
                            <p>{{ Carbon\Carbon::parse($item->created_at)->format('h:i') }} 
                                <span class="font-13">&nbsp;di Tolak</span>
                                <i class="fa fa-date"> {{ Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</i>
                            </p>
                        @endif
                    </a>
                @endforeach
                @if (isset($candidate) && ($candidate->status == '2' || $candidate->status == '3'))
                    <p class="boxed-text-l">
                    </p>
                    <a href="{{ route('document-print', $candidate->id) }}"
                        class="btn btn-center-m btn-sm shadow-l rounded-s text-uppercase font-900 bg-green1-dark">Unduh</a>
                    <p class="text-center font-10 mb-0">Unduh dokumen ini untuk bukti bahwa anda lolos seleksi</p>
                @elseif (isset($candidate) && $candidate->status == '4')
                    <p class="boxed-text-l">
                    </p>
                    <a href="{{ route('document-print', $candidate->id) }}"
                        class="btn btn-center-m btn-sm shadow-l rounded-s text-uppercase font-900 bg-blue1-dark">Unduh</a>
                    <p class="text-center font-10 mb-0">Unduh dokumen ini untuk bukti bahwa anda lolos seleksi</p>
                @elseif (isset($candidate) && $candidate->status == '5')
                <p class="boxed-text-l">
                </p>
                <i class="fas fa-frown text-center" style="font-size: 50px; color: #DC3545;"></i>
                <p class="text-center" style="font-size: 10px; color: #DC3545;">{{ $candidate->description_user }}</p>

                @endif
            </div>
        </div>
    </div>
@endsection
