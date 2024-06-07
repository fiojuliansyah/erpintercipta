<div id="printable-content" class="wrapper">
    <div class="page-inner">
        <div class="card">
            <!-- .card-body -->
            <div class="card-body" style="background-color: white; color: black">
                <span id="addendum" class="printable-text">
                    {!! $pkwt->agreement?->addendum['addendum'] !!}
                    <br>
                    <div class="row" style="display: flex; justify-content: center; align-items: center;">
                        <div class="col-md-6 mb-4 text-center">
                            <p>PIHAK PERTAMA</p>
                            <br>
                            @if ($pkwt->user?->signature == null)
                                <br>
                            @else
                                <img src="{{ Storage::url($pkwt->signature_hrd) }}" width="300"
                                    alt="">
                            @endif
                            <br>
                            <p>( <u>{{ $pkwt->agreement['responsible'] }}</u> )</p>
                            <p>Human Resource Development</p>
                        </div>
                        <div class="col-md-6 mb-4 text-center">
                            <p>PIHAK KEDUA</p>
                            <br>
                            @if ($pkwt->user?->signature == null)
                                <br>
                            @else
                                <img src="{{ Storage::url($pkwt->user?->signature['signatureDataUrl']) }}"
                                    width="300" alt="">
                            @endif
                            <br>
                            <p>( <u>{{ $pkwt->user['name'] }}</u> )</p>
                            <p>Karyawan</p>
                        </div>
                        <br>
                    </div>
                </span>
            </div><!-- /.card-body -->
        </div>
        <div class="card">
            <div class="card-body" style="background-color: white; color: black">
                <span id="attachment_1" class="printable-text">
                    {!! $pkwt->agreement?->addendum['attachment_1'] !!}
                    <br>
                    <div class="row" style="display: flex; justify-content: center; align-items: center;">
                        <div class="col-md-6 mb-4 text-center">
                            <p>PIHAK PERTAMA</p>
                            <strong>{{ $pkwt->agreement->addendum->site->company['company'] }}</strong>
                            <br>
                            @if ($pkwt->user?->signature == null)
                                <br>
                            @else
                                <img src="{{ Storage::url($pkwt->signature_hrd) }}" width="300"
                                    alt="">
                            @endif
                            <br>
                            <p>( <u>{{ $pkwt->agreement['responsible'] }}</u> )</p>
                            <p>Human Resource Development</p>
                        </div>
                        <div class="col-md-6 mb-4 text-center">
                            <p>PIHAK KEDUA</p>
                            <br>
                            @if ($pkwt->user?->signature == null)
                                <br>
                            @else
                                <img src="{{ Storage::url($pkwt->user?->signature['signatureDataUrl']) }}"
                                    width="300" alt="">
                            @endif
                            <br>
                            <p>( <u>{{ $pkwt->user['name'] }}</u> )</p>
                            <p>Karyawan</p>
                        </div>
                        <br>
                    </div>
                </span>
            </div>
        </div>
        <div class="card">
          <div class="card-body" style="background-color: white; color: black">
            <span id="attachment_2" class="printable-text">
                {!! $pkwt->agreement?->addendum['attachment_2'] !!}
                <br>
                <div class="row" style="display: flex; justify-content: center; align-items: center;">
                    <div class="col-md-6 mb-4 text-center">
                        <br>
                        @if ($pkwt->user?->signature == null)
                            <br>
                        @else
                            <img src="{{ Storage::url($pkwt->user?->signature['signatureDataUrl']) }}"
                                width="300" alt="">
                        @endif
                        <br>
                        <p>( <u>{{ $pkwt->user['name'] }}</u> )</p>
                        <p>Karyawan</p>
                    </div>
                    <br>
                </div>
            </span>
          </div>
      </div>
    </div>
</div>
@push('js')
<script>
    // Ambil elemen yang mengandung teks yang akan diganti
    var element = document.getElementById('addendum');

    // Ganti teks dalam elemen tersebut
    if (element) {
        element.innerHTML = element.innerHTML
            .replace('{NO_SURAT}',
                '<b>No. {{ $pkwt->pkwt_number }}/{{ $pkwt->agreement->addendum->site->company['cmpy'] }}/HR-{{ $pkwt->agreement['area'] }}/{{ $pkwt->agreement['romawi'] }}/{{ $pkwt->agreement['year'] }}</b>'
                )
            .replace('{PENANGGUNG_JAWAB}', '{{ $pkwt->agreement['responsible'] }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d F Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d F Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{PENALTY}', '{{ $pkwt->agreement['penalty'] }}')
            .replace('{LAMA_BEKERJA}', '{{ $pkwt->agreement['length_of_work'] }}')
            .replace('{GAJI}', '@currency($pkwt->agreement['salary'])')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{TUNJANGAN_JABATAN}', '@currency($pkwt->agreement['department_allowance'])')
            .replace('{TUNJANGAN_KEHADIRAN}', '@currency($pkwt->agreement['attendance_allowance'])')
            .replace('{TUNJANGAN_KOMUNIKASI}', '@currency($pkwt->agreement['comunication_allowance'])')
            .replace('{TUNJANGAN_KECANTIKAN}', '@currency($pkwt->agreement['beauty_allowance'])')
            .replace('{TUNJANGAN_MAKAN}', '@currency($pkwt->agreement['food_allowance'])')
            .replace('{TUNJANGAN_TRANSPORT}', '@currency($pkwt->agreement['transport_allowance'])')
            .replace('{TUNJANGAN_LOKASI}', '@currency($pkwt->agreement['location_allowance'])')
            .replace('{OTHER_NON_FIX}', '@currency($pkwt->agreement['other_non_fix_allowance'])')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{TTL}', '{{ $pkwt->user?->profile['birth_place'] }}, {{ Carbon\Carbon::parse($pkwt->user?->profile['birth_date'])->format('d F Y') }}')
            .replace('{NIK}', '{{ $pkwt->user['nik_number'] }}')
            .replace('{NIK}', '{{ $pkwt->user['nik_number'] }}')
            .replace('{NIK}', '{{ $pkwt->user['nik_number'] }}')
            .replace('{NIK}', '{{ $pkwt->user['nik_number'] }}')
            .replace('{NIK}', '{{ $pkwt->user['nik_number'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
            .replace('{NIK_KARYAWAN}', '{{ $pkwt->user?->profile['employee_nik'] }}')
            .replace('{NIK_KARYAWAN}', '{{ $pkwt->user?->profile['employee_nik'] }}')
            .replace('{NIK_KARYAWAN}', '{{ $pkwt->user?->profile['employee_nik'] }}')
            .replace('{NIK_KARYAWAN}', '{{ $pkwt->user?->profile['employee_nik'] }}')
            .replace('{NIK_KARYAWAN}', '{{ $pkwt->user?->profile['employee_nik'] }}')
    }
</script>
<script>
    // Ambil elemen yang mengandung teks yang akan diganti
    var element = document.getElementById('attachment_1');

    // Ganti teks dalam elemen tersebut
    if (element) {
        element.innerHTML = element.innerHTML
            .replace('{NO_SURAT}',
                '<b>No. {{ $pkwt->pkwt_number }}/{{ $pkwt->agreement->addendum->site->company['cmpy'] }}/HR-{{ $pkwt->agreement['area'] }}/{{ $pkwt->agreement['romawi'] }}/{{ $pkwt->agreement['year'] }}</b>'
                )
            .replace('{PENANGGUNG_JAWAB}', '{{ $pkwt->agreement['responsible'] }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d F Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d F Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{PENALTY}', '{{ $pkwt->agreement['penalty'] }}')
            .replace('{LAMA_BEKERJA}', '{{ $pkwt->agreement['length_of_work'] }}')
            .replace('{GAJI}', '@currency($pkwt->agreement['salary'])')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{TUNJANGAN_JABATAN}', '@currency($pkwt->agreement['department_allowance'])')
            .replace('{TUNJANGAN_KEHADIRAN}', '@currency($pkwt->agreement['attendance_allowance'])')
            .replace('{TUNJANGAN_KOMUNIKASI}', '@currency($pkwt->agreement['comunication_allowance'])')
            .replace('{TUNJANGAN_KECANTIKAN}', '@currency($pkwt->agreement['beauty_allowance'])')
            .replace('{TUNJANGAN_MAKAN}', '@currency($pkwt->agreement['food_allowance'])')
            .replace('{TUNJANGAN_TRANSPORT}', '@currency($pkwt->agreement['transport_allowance'])')
            .replace('{TUNJANGAN_LOKASI}', '@currency($pkwt->agreement['location_allowance'])')
            .replace('{OTHER_NON_FIX}', '@currency($pkwt->agreement['other_non_fix_allowance'])')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{TTL}', '{{ $pkwt->user?->profile['birth_place'] }}, {{ Carbon\Carbon::parse($pkwt->user?->profile['birth_date'])->format('d F Y') }}')
            .replace('{NIK}', '{{ $pkwt->user['nik_number'] }}')
            .replace('{NIK}', '{{ $pkwt->user['nik_number'] }}')
            .replace('{NIK}', '{{ $pkwt->user['nik_number'] }}')
            .replace('{NIK}', '{{ $pkwt->user['nik_number'] }}')
            .replace('{NIK}', '{{ $pkwt->user['nik_number'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
            .replace('{NIK_KARYAWAN}', '{{ $pkwt->user?->profile['employee_nik'] }}')
            .replace('{NIK_KARYAWAN}', '{{ $pkwt->user?->profile['employee_nik'] }}')
            .replace('{NIK_KARYAWAN}', '{{ $pkwt->user?->profile['employee_nik'] }}')
            .replace('{NIK_KARYAWAN}', '{{ $pkwt->user?->profile['employee_nik'] }}')
            .replace('{NIK_KARYAWAN}', '{{ $pkwt->user?->profile['employee_nik'] }}')
    }
</script>

<script>
    // Ambil elemen yang mengandung teks yang akan diganti
    var element = document.getElementById('attachment_2');

    // Ganti teks dalam elemen tersebut
    if (element) {
        element.innerHTML = element.innerHTML
            .replace('{NO_SURAT}',
                '<b>No. {{ $pkwt->pkwt_number }}/{{ $pkwt->agreement->addendum->site->company['cmpy'] }}/HR-{{ $pkwt->agreement['area'] }}/{{ $pkwt->agreement['romawi'] }}/{{ $pkwt->agreement['year'] }}</b>'
                )
            .replace('{PENANGGUNG_JAWAB}', '{{ $pkwt->agreement['responsible'] }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d F Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d F Y') }}')
            .replace('{TANGGAL_MULAI}', '{{ Carbon\Carbon::parse($pkwt->agreement['start_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ Carbon\Carbon::parse($pkwt->agreement['end_date'])->format('d-m-Y') }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{PENALTY}', '{{ $pkwt->agreement['penalty'] }}')
            .replace('{LAMA_BEKERJA}', '{{ $pkwt->agreement['length_of_work'] }}')
            .replace('{GAJI}', '@currency($pkwt->agreement['salary'])')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{TUNJANGAN_JABATAN}', '@currency($pkwt->agreement['department_allowance'])')
            .replace('{TUNJANGAN_KEHADIRAN}', '@currency($pkwt->agreement['attendance_allowance'])')
            .replace('{TUNJANGAN_KOMUNIKASI}', '@currency($pkwt->agreement['comunication_allowance'])')
            .replace('{TUNJANGAN_KECANTIKAN}', '@currency($pkwt->agreement['beauty_allowance'])')
            .replace('{TUNJANGAN_MAKAN}', '@currency($pkwt->agreement['food_allowance'])')
            .replace('{TUNJANGAN_TRANSPORT}', '@currency($pkwt->agreement['transport_allowance'])')
            .replace('{TUNJANGAN_LOKASI}', '@currency($pkwt->agreement['location_allowance'])')
            .replace('{OTHER_NON_FIX}', '@currency($pkwt->agreement['other_non_fix_allowance'])')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{TTL}', '{{ $pkwt->user?->profile['birth_place'] }}, {{ Carbon\Carbon::parse($pkwt->user?->profile['birth_date'])->format('d F Y') }}')
            .replace('{NIK}', '{{ $pkwt->user['nik_number'] }}')
            .replace('{NIK}', '{{ $pkwt->user['nik_number'] }}')
            .replace('{NIK}', '{{ $pkwt->user['nik_number'] }}')
            .replace('{NIK}', '{{ $pkwt->user['nik_number'] }}')
            .replace('{NIK}', '{{ $pkwt->user['nik_number'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
            .replace('{NIK_KARYAWAN}', '{{ $pkwt->user?->profile['employee_nik'] }}')
            .replace('{NIK_KARYAWAN}', '{{ $pkwt->user?->profile['employee_nik'] }}')
            .replace('{NIK_KARYAWAN}', '{{ $pkwt->user?->profile['employee_nik'] }}')
            .replace('{NIK_KARYAWAN}', '{{ $pkwt->user?->profile['employee_nik'] }}')
            .replace('{NIK_KARYAWAN}', '{{ $pkwt->user?->profile['employee_nik'] }}')
    }
</script>
@endpush