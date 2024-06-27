@extends('mobiles.layouts.master')

@section('title', 'Show Document | Intercipta Mobile')

@section('content')
    <div id="printable-content" class="page-content">

        <div class="page-title page-title-small">
            <h2><a href="#" data-back-button></a>Dokumen</h2>
        </div>
        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
        </div>

        <div class="card card-style">
            <div class="content" id="addendum">
                {!! Auth::user()->pkwt->agreement->addendum['addendum'] !!}
            </div>
        </div>

        <div class="card card-style">
            <div class="content" id="attachment_1">
                {!! Auth::user()->pkwt->agreement->addendum['attachment_1'] !!}
            </div>
        </div>

        <div class="card card-style">
            <div class="content" id="attachment_2">
                {!! Auth::user()->pkwt->agreement->addendum['attachment_2'] !!}
            </div>
        </div>

        <button class="btn btn-full btn-margins  bg-highlight btn-m text-uppercase font-900 rounded-s shadow-xl"
            onclick="printContent('printable-content')">Download
            Document</button>
    </div>
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
                .replace('{TTL}',
                    '{{ Auth::user()->profile['birth_place'] }}, {{ Auth::user()->profile['birth_date'] }}')
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
                .replace('{TTL}',
                    '{{ Auth::user()->profile['birth_place'] }}, {{ Auth::user()->profile['birth_date'] }}')
                .replace('{NIK}', '{{ Auth::user()->nik_number }}')
                .replace('{ALAMAT}', '{{ Auth::user()->profile['address'] }}')
                .replace('{NIK_KARYAWAN}', '{{ Auth::user()->employee_nik }}')
        }
    </script>
    <script>
        function printContent(elementId) {
            var content = document.getElementById(elementId).innerHTML;
            var myWindow = window.open('', '', 'width=800,height=600');
            myWindow.document.write('<html><head><title>Print Document</title>');
            myWindow.document.write('</head><body>');
            myWindow.document.write(content);
            myWindow.document.write('</body></html>');

            myWindow.document.close(); // necessary for IE >= 10
            myWindow.focus(); // necessary for IE >= 10

            myWindow.print();
            myWindow.close();

            return true;
        }
    </script>
@endpush
