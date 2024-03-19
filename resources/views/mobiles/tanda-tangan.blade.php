@extends('mobiles.layouts.master')

@section('title','Tanda Tangan | Intercipta Mobile')

@section('content')
@if (Auth::user()->pkwt == null)
<div class="page-content">  
    <div class="page-title page-title-small">
        <h2><a href="#" data-back-button></a>PKWT</h2>
    </div>
    <div class="card header-card shape-rounded" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
    </div>
    <div data-card-height="cover-card" class="card card-style bg-17">
        <div class="card-center text-center">
            <i class="fa fa-lock fa-9x color-highlight mb-5"></i>
            <h1 class="font-36 font-700 color-white mb-2 text-uppercase">DOKUMEN</h1>
            <p class="text-uppercase font-15 color-highlight mt-n2 font-800">belum tersedia</p>
            <p class="boxed-text-xl opacity-70 color-white">
                Silahkan kontak admin, jika ada kekeliruan.
            </p>
            <div class="row mb-0">
                <div class="col-6">
                    <a href="#" class="btn btn-m bg-highlight btn-center-m rounded-sm bg-highlight font-900 text-uppercase float-right">Back Home</a>
                </div>
                <div class="col-6">
                    <a href="#" class="btn btn-m bg-highlight btn-center-m rounded-sm bg-highlight font-900 text-uppercase float-left">Contact</a>
                </div>
            </div>
        </div>
        <div class="card-overlay bg-black opacity-90"></div>
    </div>
</div>
@elseif (Auth::user()->signature)
<div class="page-content">  
    <div class="page-title page-title-small">
        <h2><a href="#" data-back-button></a>PKWT</h2>
    </div>
    <div class="card header-card shape-rounded" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
    </div>
    <div data-card-height="cover-card" class="card card-style bg-17">
        <div class="card-center text-center">
            <i class="fa fa-check-circle fa-9x color-highlight mb-5"></i>
            <h1 class="font-36 font-700 color-white mb-2 text-uppercase">DOKUMEN</h1>
            <p class="text-uppercase font-15 color-highlight mt-n2 font-800">sudah di tanda tangan</p>
            <p class="boxed-text-xl opacity-70 color-white">
                PKWT sudah di tanda tangan, jika ada bantuan hubungi admin!
            </p>
        </div>
        <div class="card-overlay bg-black opacity-90"></div>
    </div>
</div>
@else
<div class="page-content">
        
    <div class="page-title page-title-small">
        <h2><a href="#" data-back-button></a>PKWT</h2>
    </div>
    <div class="card header-card shape-rounded" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
    </div>
    
    <div class="card card-style">
        <div class="content"  id="addendum">                
            {!! Auth::user()->pkwt->agreement->addendum['addendum'] !!}
        </div>                        
    </div>

    <div class="card card-style">
        <div class="content"  id="attachment_1">                
            {!! Auth::user()->pkwt->agreement->addendum['attachment_1'] !!}
        </div>                        
    </div>

    <div class="card card-style">
        <div class="content"  id="attachment_2">                
            {!! Auth::user()->pkwt->agreement->addendum['attachment_2'] !!}
        </div>                        
    </div>
    
    <a href="#" data-menu="menu-confirm" class="btn btn-full btn-margins  bg-highlight btn-m text-uppercase font-900 rounded-s shadow-xl">Tanda Tangan</a>
    <div id="menu-confirm" class="menu menu-box-modal rounded-m" 
         data-menu-height="470" 
         data-menu-width="330">
        <h1 class="text-center font-700 mt-3 pb-1">Apakah yakin?</h1>
        <p class="boxed-text-l">
            Baca dokumen dengan teliti, sebelum melakukan tanda tangan digital!
        </p>
        <form id="signatureForm" enctype="multipart/form-data">
            <div class="modal-body">
                <canvas id="signatureCanvas" width="500" height="200"></canvas>
            </div>
            <div class="row mr-3 ml-3 mb-0">
                <div class="col-6">
                    <a id="saveButton" data-menu="menu-success-2" class="btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-green1-dark">Simpan</a>
                </div>
                <div class="col-6">
                    <a href="#" class="close-menu btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-red1-dark">Keluar</a>
                </div>
            </div>
        </form>
    </div>
    <div id="menu-success-2" class="menu menu-box-modal rounded-m" 
         data-menu-height="300" 
         data-menu-width="310">
        <h1 class="text-center mt-3 pt-1"><i class="fa fa-3x fa-check-circle color-green1-dark shadow-xl rounded-circle"></i></h1>
        <h1 class="text-center mt-3 font-700">Berhasil</h1>
        <p class="boxed-text-l">
             Pkwt anda berhasil di tanda tangan.<br> akan dialihkan ke beranda.
        </p>
        <a href="#" class="close-menu btn btn-m btn-center-m button-s shadow-l rounded-s text-uppercase font-900 bg-green1-light">Great</a>
    </div> 
</div>
@endif
@endsection

@push('js')
    <script>
        // Ambil elemen yang mengandung teks yang akan diganti
        var element = document.getElementById('addendum');
    
        // Ganti teks dalam elemen tersebut
        if (element) {
            element.innerHTML = element.innerHTML
                .replace('{NO_SURAT}',
                    '<b>No. {{ Auth::user()->pkwt?->pkwt_number }}/{{ Auth::user()->pkwt?->agreement->addendum->site->company['cmpy'] }}/HR-{{ Auth::user()->pkwt?->agreement['area'] }}/{{ Auth::user()->pkwt?->agreement['romawi'] }}/{{ Auth::user()->pkwt?->agreement['year'] }}</b>'
                    )
                .replace('{PENANGGUNG_JAWAB}', '{{ Auth::user()->pkwt?->agreement['responsible'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{PENALTY}', '{{ Auth::user()->pkwt?->agreement['penalty'] }}')
                .replace('{PENALTY}', '{{ Auth::user()->pkwt?->agreement['penalty'] }}')
                .replace('{PENALTY}', '{{ Auth::user()->pkwt?->agreement['penalty'] }}')
                .replace('{LAMA_BEKERJA}', '{{ Auth::user()->pkwt?->agreement['length_of_work'] }}')
                .replace('{GAJI}', '{{ Auth::user()->pkwt?->agreement['salary'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{TUNJANGAN_JABATAN}', '{{ Auth::user()->pkwt?->agreement['department_allowance'] }}')
                .replace('{TUNJANGAN_KEHADIRAN}', '{{ Auth::user()->pkwt?->agreement['attendance_allowance'] }}')
                .replace('{TUNJANGAN_KOMUNIKASI}', '{{ Auth::user()->pkwt?->agreement['comunication_allowance'] }}')
                .replace('{TUNJANGAN_KECANTIKAN}', '{{ Auth::user()->pkwt?->agreement['beauty_allowance'] }}')
                .replace('{TUNJANGAN_MAKAN}', '{{ Auth::user()->pkwt?->agreement['food_allowance'] }}')
                .replace('{TUNJANGAN_TRANSPORT}', '{{ Auth::user()->pkwt?->agreement['transport_allowance'] }}')
                .replace('{TUNJANGAN_LOKASI}', '{{ Auth::user()->pkwt?->agreement['location_allowance'] }}')
                .replace('{OTHER_NON_FIX}', '{{ Auth::user()->pkwt?->agreement['other_non_fix_allowance'] }}')
                .replace('{TEMPAT}', '{{ Auth::user()->pkwt?->agreement['place'] }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{JENIS_KELAMIN}', '{{ Auth::user()->profile['gender'] }}')
                .replace('{JENIS_KELAMIN}', '{{ Auth::user()->profile['gender'] }}')
                .replace('{JENIS_KELAMIN}', '{{ Auth::user()->profile['gender'] }}')
                .replace('{JENIS_KELAMIN}', '{{ Auth::user()->profile['gender'] }}')
                .replace('{TTL}', '{{ Auth::user()->profile['birth_place'] }}, {{ Auth::user()->profile['birth_date'] }}')
                .replace('{NIK}', '{{ Auth::user()->nik_number }}')
                .replace('{ALAMAT}', '{{ Auth::user()->profile['address'] }}')
                .replace('{NIK_KARYAWAN}', '{{ Auth::user()->employee_nik }}')
        }
    </script>
    <script>
        // Ambil elemen yang mengandung teks yang akan diganti
        var element = document.getElementById('attachment_1');
    
        // Ganti teks dalam elemen tersebut
        if (element) {
            element.innerHTML = element.innerHTML
                .replace('{NO_SURAT}',
                    '<b>No. {{ Auth::user()->pkwt?->pkwt_number }}/{{ Auth::user()->pkwt?->agreement->addendum->site->company['cmpy'] }}/HR-{{ Auth::user()->pkwt?->agreement['area'] }}/{{ Auth::user()->pkwt?->agreement['romawi'] }}/{{ Auth::user()->pkwt?->agreement['year'] }}</b>'
                    )
                .replace('{PENANGGUNG_JAWAB}', '{{ Auth::user()->pkwt?->agreement['responsible'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{PENALTY}', '{{ Auth::user()->pkwt?->agreement['penalty'] }}')
                .replace('{PENALTY}', '{{ Auth::user()->pkwt?->agreement['penalty'] }}')
                .replace('{PENALTY}', '{{ Auth::user()->pkwt?->agreement['penalty'] }}')
                .replace('{LAMA_BEKERJA}', '{{ Auth::user()->pkwt?->agreement['length_of_work'] }}')
                .replace('{GAJI}', '{{ Auth::user()->pkwt?->agreement['salary'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{TUNJANGAN_JABATAN}', '{{ Auth::user()->pkwt?->agreement['department_allowance'] }}')
                .replace('{TUNJANGAN_KEHADIRAN}', '{{ Auth::user()->pkwt?->agreement['attendance_allowance'] }}')
                .replace('{TUNJANGAN_KOMUNIKASI}', '{{ Auth::user()->pkwt?->agreement['comunication_allowance'] }}')
                .replace('{TUNJANGAN_KECANTIKAN}', '{{ Auth::user()->pkwt?->agreement['beauty_allowance'] }}')
                .replace('{TUNJANGAN_MAKAN}', '{{ Auth::user()->pkwt?->agreement['food_allowance'] }}')
                .replace('{TUNJANGAN_TRANSPORT}', '{{ Auth::user()->pkwt?->agreement['transport_allowance'] }}')
                .replace('{TUNJANGAN_LOKASI}', '{{ Auth::user()->pkwt?->agreement['location_allowance'] }}')
                .replace('{OTHER_NON_FIX}', '{{ Auth::user()->pkwt?->agreement['other_non_fix_allowance'] }}')
                .replace('{TEMPAT}', '{{ Auth::user()->pkwt?->agreement['place'] }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{JENIS_KELAMIN}', '{{ Auth::user()->profile['gender'] }}')
                .replace('{JENIS_KELAMIN}', '{{ Auth::user()->profile['gender'] }}')
                .replace('{JENIS_KELAMIN}', '{{ Auth::user()->profile['gender'] }}')
                .replace('{JENIS_KELAMIN}', '{{ Auth::user()->profile['gender'] }}')
                .replace('{TTL}', '{{ Auth::user()->profile['birth_place'] }}, {{ Auth::user()->profile['birth_date'] }}')
                .replace('{NIK}', '{{ Auth::user()->nik_number }}')
                .replace('{ALAMAT}', '{{ Auth::user()->profile['address'] }}')
                .replace('{NIK_KARYAWAN}', '{{ Auth::user()->employee_nik }}')
        }
    </script>
    <script>
        // Ambil elemen yang mengandung teks yang akan diganti
        var element = document.getElementById('attachment_2');
    
        // Ganti teks dalam elemen tersebut
        if (element) {
            element.innerHTML = element.innerHTML
                .replace('{NO_SURAT}',
                    '<b>No. {{ Auth::user()->pkwt?->pkwt_number }}/{{ Auth::user()->pkwt?->agreement->addendum->site->company['cmpy'] }}/HR-{{ Auth::user()->pkwt?->agreement['area'] }}/{{ Auth::user()->pkwt?->agreement['romawi'] }}/{{ Auth::user()->pkwt?->agreement['year'] }}</b>'
                    )
                .replace('{PENANGGUNG_JAWAB}', '{{ Auth::user()->pkwt?->agreement['responsible'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_MULAI}', '{{ Auth::user()->pkwt?->agreement['start_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{TANGGAL_BERAKHIR}', '{{ Auth::user()->pkwt?->agreement['end_date'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{JABATAN}', '{{ Auth::user()->pkwt?->agreement['department'] }}')
                .replace('{PENALTY}', '{{ Auth::user()->pkwt?->agreement['penalty'] }}')
                .replace('{PENALTY}', '{{ Auth::user()->pkwt?->agreement['penalty'] }}')
                .replace('{PENALTY}', '{{ Auth::user()->pkwt?->agreement['penalty'] }}')
                .replace('{LAMA_BEKERJA}', '{{ Auth::user()->pkwt?->agreement['length_of_work'] }}')
                .replace('{GAJI}', '{{ Auth::user()->pkwt?->agreement['salary'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{PROJECT}', '{{ Auth::user()->pkwt?->agreement->addendum->site['description'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{AREA}', '{{ Auth::user()->pkwt?->agreement['area'] }}')
                .replace('{TUNJANGAN_JABATAN}', '{{ Auth::user()->pkwt?->agreement['department_allowance'] }}')
                .replace('{TUNJANGAN_KEHADIRAN}', '{{ Auth::user()->pkwt?->agreement['attendance_allowance'] }}')
                .replace('{TUNJANGAN_KOMUNIKASI}', '{{ Auth::user()->pkwt?->agreement['comunication_allowance'] }}')
                .replace('{TUNJANGAN_KECANTIKAN}', '{{ Auth::user()->pkwt?->agreement['beauty_allowance'] }}')
                .replace('{TUNJANGAN_MAKAN}', '{{ Auth::user()->pkwt?->agreement['food_allowance'] }}')
                .replace('{TUNJANGAN_TRANSPORT}', '{{ Auth::user()->pkwt?->agreement['transport_allowance'] }}')
                .replace('{TUNJANGAN_LOKASI}', '{{ Auth::user()->pkwt?->agreement['location_allowance'] }}')
                .replace('{OTHER_NON_FIX}', '{{ Auth::user()->pkwt?->agreement['other_non_fix_allowance'] }}')
                .replace('{TEMPAT}', '{{ Auth::user()->pkwt?->agreement['place'] }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{PELAMAR}', '{{ Auth::user()->name }}')
                .replace('{JENIS_KELAMIN}', '{{ Auth::user()->profile['gender'] }}')
                .replace('{JENIS_KELAMIN}', '{{ Auth::user()->profile['gender'] }}')
                .replace('{JENIS_KELAMIN}', '{{ Auth::user()->profile['gender'] }}')
                .replace('{JENIS_KELAMIN}', '{{ Auth::user()->profile['gender'] }}')
                .replace('{TTL}', '{{ Auth::user()->profile['birth_place'] }}, {{ Auth::user()->profile['birth_date'] }}')
                .replace('{NIK}', '{{ Auth::user()->nik_number }}')
                .replace('{ALAMAT}', '{{ Auth::user()->profile['address'] }}')
                .replace('{NIK_KARYAWAN}', '{{ Auth::user()->employee_nik }}')
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@3.0.0/signature_pad.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var canvas = document.getElementById('signatureCanvas');
            var signaturePad = new SignaturePad(canvas);
            var saveButton = document.getElementById('saveButton');

            saveButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default form submission behavior

                if (signaturePad.isEmpty()) {
                    alert('Tanda tangan kosong, silakan tanda tangan');
                } else {
                    if (!saveButton.disabled) {
                        saveButton.disabled = true; // Disable button to prevent multiple submissions

                        var signatureDataUrl = signaturePad.toDataURL();
                        saveSignature(signatureDataUrl);
                    }
                }
            });

            function saveSignature(signatureDataUrl) {
                fetch('{{ route('signatures.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        signatureDataUrl: signatureDataUrl
                    })
                })
                .then(() => {
                    signaturePad.clear();

                    // Show success modal
                    var successModal = document.getElementById('menu-success-2');
                    successModal.classList.add('menu-active');

                    // Redirect to the dashboard after 4 seconds
                    setTimeout(function() {
                        window.location.href = '/dashboard'; // Replace '/dashboard' with your actual dashboard URL
                    }, 2000);
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menyimpan tanda tangan.');
                    saveButton.disabled = false; // Enable button in case of an error
                });
            }
        });
    </script>
@endpush