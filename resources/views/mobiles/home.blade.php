@extends('mobiles.layouts.master')

@section('title','Beranda | Intercipta Mobile')

@section('content')
    @if (Auth::user()->hasRole('employee') or Auth::user()->profile['department'])
        <div class="page-content">
            <div class="page-title page-title-small" style="margin-top: 50px">
                <h3>MOBILE</h3>
                <h6>Apps</h6>
            </div>

            <div class="card card-style" style="margin-top: 50px">
                <div class="d-flex content mb-1">
                    <!-- left side of profile -->
                    <div class="flex-grow-1">
                        <h1 class="font-700">{{ Auth::user()->name ?? 'Guest' }}</h1>
                        <p class="mb-2">
                            {{ Auth::user()->email ?? 'Guest' }}
                        </p>

                    </div>
                    <img src="{{ asset('') }}mobile/images/empty.png" data-src="{{ Storage::url(Auth::user() ? Auth::user()->profile?->avatar : '') }}" width="70" height="70" class="bg-highlight rounded-circle shadow-xl preload-img">
                </div>
                <div class="content">
                    <div class="row mb-0">
                        {{-- <div class="col-6">
                            <a href="{{ route('attendance') }}" class="btn btn-full btn-m rounded-s text-uppercase font-900 shadow-xl bg-highlight"><i class="fas fa-camera">&nbsp</i> IN / OUT</a>
                        </div> --}}
                        <div class="col-12">
                            <a href="{{ route('scan') }}" class="btn btn-full btn-border btn-m rounded-s text-uppercase font-900 shadow-l border-highlight color-highlight"><i class="fas fa-qrcode">&nbsp</i>Scan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card header-card shape-square" data-card-height="200">
                <div class="card-overlay bg-highlight opacity-95"></div>
                <div class="card-bg preload-img"></div>
            </div>
            <!-- Homepage Slider-->
            {{-- <div class="content">
                <p>
                    <h5 class="float-left font-16 font-600">Attendance</h5>&nbsp&nbsp&nbsp&nbsp<small><span class="badge badge-danger">coming soon</span></small>
                </p>
            </div>
            <div class="user-list-slider owl-carousel mt-1 mb-n1">
                <div class="icon-user" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <img src="https://img.icons8.com/color/48/hourglass.png" alt="" width="30px" style="margin-bottom: 5px;">
                    <div style="display: flex; align-items: center;">
                        <span>Overtime</span>
                    </div>
                </div>
                <div class="icon-user" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <img src="https://img.icons8.com/color/48/timeline-week.png" alt="" width="30px" style="margin-bottom: 5px;">
                    <div style="display: flex; align-items: center;">
                        <span>Log</span>
                    </div>
                </div>
                <div class="icon-user" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <img src="https://img.icons8.com/color/48/planner.png" alt="" width="30px" style="margin-bottom: 5px;">
                    <div style="display: flex; align-items: center;">
                        <span>Activity</span>
                    </div>
                </div>
                <div class="icon-user" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <img src="https://img.icons8.com/color/48/bonds.png" alt="" width="30px" style="margin-bottom: 5px;">
                    <div style="display: flex; align-items: center;">
                        <span>payslip</span>
                    </div>
                </div>
            </div> --}}
            <div class="content mb-2">
                <h5 class="float-left font-16 font-500">Fitur</h5>&nbsp&nbsp&nbsp&nbsp<small></small>
                <div class="clearfix"></div>
            </div>
            <div class="double-slider text-center owl-carousel owl-no-dots">
                {{-- <a href="{{ route('iform') }}">
                    <div class="item bg-theme rounded-m shadow-m" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                        <img src="https://img.icons8.com/color/48/saving-book.png" alt="" width="60px" style="margin-bottom: 5px; padding-top:30px;">
                        <h5 class="font-16 pt-1">Mo-Plan</h5>
                        <span class="badge badge-danger">soon</span>
                        <p class="line-height-s font-11">
                            Perencanaan<br>Kerja
                        </p>
                    </div>
                </a> --}}
                <a href="{{ route('iform') }}">
                    <div class="item bg-theme rounded-m shadow-m" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                        <img src="https://img.icons8.com/color/48/agreement.png" alt="" width="60px" style="margin-bottom: 5px; padding-top:30px;">
                        <h5 class="font-16 pt-1">Form</h5>
                        <p class="line-height-s font-11">
                            Formulir<br>elektronik
                        </p>
                    </div>
                </a>
                <a href="{{ route('warehouse') }}">
                    <div class="item bg-theme rounded-m shadow-m" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                        <img src="https://img.icons8.com/color/48/storage_1.png" alt="" width="60px" style="margin-bottom: 5px; padding-top:30px;">
                        <h5 class="font-16 pt-1">Warehouse</h5>
                        <p class="line-height-s font-11">
                            Sistem<br>Pergudangan
                        </p>
                    </div>
                </a>
                {{-- <a href="{{ route('iform') }}">
                    <div class="item bg-theme rounded-m shadow-m" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                        <img src="https://img.icons8.com/color/48/application-shield.png" alt="" width="60px" style="margin-bottom: 5px; padding-top:30px;">
                        <h5 class="font-16 pt-1">Mo-Patrol</h5>
                        <span class="badge badge-danger">soon</span>
                        <p class="line-height-s font-11">
                            Perencanaan<br>Kerja
                        </p>
                    </div>
                </a> --}}
            </div>
            <br>
            <div class="single-slider-boxed text-center owl-no-dots owl-carousel">
                <div class="card rounded-l shadow-l" data-card-height="150">
                    <div class="card-bg owl-lazy" data-src="{{ asset('') }}mobile/images/pictures/17m.jpg"></div>
                </div>
                <div class="card rounded-l shadow-l" data-card-height="150">
                    <div class="card-bg owl-lazy" data-src="{{ asset('') }}mobile/images/pictures/8m.jpg"></div>
                </div>
                <div class="card rounded-l shadow-l" data-card-height="150">
                    <div class="card-bg owl-lazy" data-src="{{ asset('') }}mobile/images/pictures/14m.jpg"></div>
                </div>
            </div>
            
            <div class="card card-style">
                <div class="content text-center">
                    <h2>Ready in 3 Steps</h2>
                    <p class="boxed-text-xl">
                        Our products are designed to simplify the way you code a page, with focus on easy, copy and paste.
                    </p>
                </div>
                <div class="divider divider-small mb-3 bg-highlight"></div>
                
                <div class="content">
                    <div class="d-flex mb-4 pb-3">
                        <div>
                            <i class="far fa-star color-yellow1-dark fa-3x pt-3 icon-size"></i>
                        </div>
                        <div>
                            <h5 class="font-16 font-600">Find your Style</h5>
                            <p>
                                We've included multiple styles you can choose to match your exact project needs.
                            </p>
                        </div>
                    </div>            
                    <div class="d-flex mb-4 pb-3">
                        <div>
                            <i class="fa fa-mobile-alt color-blue2-dark fa-3x pt-3 icon-size"></i>
                        </div>
                        <div>
                            <h5 class="font-16 font-600">Paste your Blocks</h5>
                            <p>
                                Just choose the blocks you like, copy and past them, add your text and that's it!
                            </p>
                        </div>
                    </div>            
                    <div class="d-flex mb-2">
                        <div>
                            <i class="far fa-check-circle color-green1-dark fa-3x pt-3 icon-size"></i>
                        </div>
                        <div>
                            <h5 class="font-16 font-600">Publish your Page</h5>
                            <p>
                                Done with copy pasting? Your mobile site is now ready! Publish it or create an app!
                            </p>
                        </div>
                    </div>            
                </div>
            </div>
            {{-- <div data-menu="ad-timed-3" data-timed-ad="5" data-auto-show-ad="3"></div>     --}}
        </div>
    @else
        <div class="page-content">    

            <div class="page-title page-title-small" style="margin-top: 50px">
                <h3>MOBILE</h3>
                <h6>Apps</h6>
            </div>

            <div class="card card-style" style="margin-top: 50px">
                <div class="d-flex content mb-1">
                    <!-- left side of profile -->
                    <div class="flex-grow-1">
                        <h1 class="font-700">{{ Auth::user()->name ?? 'Guest' }}</h1>
                        <p class="mb-2">
                            {{ Auth::user()->email ?? 'Guest' }}
                        </p>

                    </div>
                    <img src="{{ asset('') }}mobile/images/empty.png" data-src="{{ Storage::url(Auth::user() ? Auth::user()->profile?->avatar : '') }}" width="70" height="70" class="bg-highlight rounded-circle shadow-xl preload-img">
                </div>
                @if (Auth::user()->candidate == null)
                <div class="content">
                    <div class="row mb-0">
                        <div class="col-8">
                            <a href="#" class="btn btn-full btn-m rounded-s text-uppercase font-900 shadow-xl bg-highlight">Pelamar</a>
                        </div>
                        <div class="col-4">
                            <a href="#"  data-menu="menu-share-thumbs" class="btn btn-full btn-border btn-m rounded-s text-uppercase font-900 shadow-l border-highlight color-highlight"><i class="fas fa-qrcode">&nbsp</i>QR</a>
                        </div>
                    </div>
                </div>
                @else
                <div class="content">
                    <div class="row mb-0">
                        <div class="col-8">
                            <a href="#" class="btn btn-full btn-m rounded-s text-uppercase font-900 shadow-xl btn-primary">Kandidat</a>
                        </div>
                        <div class="col-4">
                            <a href="#"  data-menu="menu-share-thumbs" class="btn btn-full btn-border btn-m rounded-s text-uppercase font-900 shadow-l border-highlight color-highlight"><i class="fas fa-qrcode">&nbsp</i>QR</a>
                        </div>
                    </div>
                </div> 
                @endif  
                <br>
                {{-- END PELAMAR --}}
            </div>
            <div class="card header-card shape-square" data-card-height="200">
                <div class="card-overlay bg-highlight opacity-95"></div>
                <div class="card-bg preload-img"></div>
            </div>
            <!-- Homepage Slider-->
            <br>
            <div class="single-slider-boxed text-center owl-no-dots owl-carousel">
                <div class="card rounded-l shadow-l" data-card-height="150">
                    <div class="card-bg owl-lazy" data-src="{{ asset('') }}mobile/images/pictures/17m.jpg"></div>
                </div>
                <div class="card rounded-l shadow-l" data-card-height="150">
                    <div class="card-bg owl-lazy" data-src="{{ asset('') }}mobile/images/pictures/8m.jpg"></div>
                </div>
                <div class="card rounded-l shadow-l" data-card-height="150">
                    <div class="card-bg owl-lazy" data-src="{{ asset('') }}mobile/images/pictures/14m.jpg"></div>
                </div>
            </div>
            <div class="content mb-3">
                <h5 class="float-left font-16 font-500">Lowongan</h5>
                    <a class="float-right font-12 color-highlight mt-n1"  href="{{ route('jobportal') }}">Semua</a>
                <div class="clearfix"></div>
            </div>
            <div class="double-slider owl-carousel owl-no-dots text-center">
                @foreach ($careers as $item)
                <div class="item bg-theme pb-3 rounded-m shadow-l">
                    <div data-card-height="100" class="card">
                        <img src="https://karir-production.nos.jkt-1.neo.id/logos/72/3341172/download.png" alt="">
                        <h6 class="card-bottom color-white mb-2">{{ $item->jobname }}</h6>
                        <div class="card-overlay bg-gradient opacity-70"></div>
                    </div>  
                    <p>
                    <i class="fas fa-map-marker-alt"></i> {{ $item->location }}
                    </p>
                    <p>
                        <span class="badge badge-success">{{ $item->salary }}</span>
                    </p>
                    <a href="{{ route('jobportal-show', $item->id) }}" class="btn btn-xs bg-highlight btn-center-xs rounded-s shadow-s text-uppercase font-900">Lamar</a>
                </div>
                @endforeach
            </div>
            <div data-menu="ad-timed-4" data-timed-ad="5" data-auto-show-ad="3"></div>  
        </div>
    @endif
    <div id="ad-timed-3" class="menu menu-box-modal">
            <div class="card-top">
                <a href="#" class="close-menu ad-time-close bg-red2-dark"><i class="fa fa-times disabled"></i><span></span></a>
            </div>
            <img src="{{ asset('') }}images/announcement.png" width="300px" alt="">      
    </div>

    <div id="ad-timed-4" class="menu menu-box-modal">
        <div class="card-top">
            <a href="#" class="close-menu ad-time-close bg-red2-dark"><i class="fa fa-times disabled"></i><span></span></a>
        </div>
        <img src="{{ asset('') }}images/announcement.png" width="300px" alt="">      
    </div>
    <div id="menu-share-thumbs" 
        class="menu menu-box-modal menu-box-detached rounded-m" 
        data-menu-height="420" 
        data-menu-width="320">
        @if (Auth::user()->candidate == null)
        <h1 class="text-center font-700 mt-3 pt-2">APPLICANT - {{ str_pad(Auth::user()->id, 5, '0', STR_PAD_LEFT) }}</h1>
        <p class="boxed-text-xl under-heading mb-0" style="color: #FE2713">
            *Gunakan QR Code ini pada saat panggilan Interview dan Test
        </p>
        <div class="divider divider-margins"></div>
        <div class="row justify-content-center mr-3 ml-3 mb-5">
            {!! html_entity_decode(Auth::user()->qr_link ?? '') !!}
        </div>  
        @else
        <h1 class="text-center font-700 mt-3 pt-2">CANDIDATE - {{ str_pad(Auth::user()->id, 5, '0', STR_PAD_LEFT) }}</h1>
        <p class="boxed-text-xl under-heading mb-0" style="color: #FE2713">
            *Gunakan QR Code ini pada saat panggilan Interview dan Test
        </p>
        <div class="divider divider-margins"></div>
        <div class="row justify-content-center mr-3 ml-3 mb-5">
            {!! html_entity_decode(Auth::user()->candidate['qr_link'] ?? '') !!}
        </div> 
        @endif
    </div>
@endsection