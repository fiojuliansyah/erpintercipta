@extends('layouts.master')

@section('title', 'PKWT & SKK Detail | InterCipta ERP Management')

@section('content')
    <main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
            <!-- .page -->
            <div class="page has-sidebar has-sidebar-expand-xl">
                <!-- .page-inner -->
                <div id="printable-content" class="wrapper">
                    <div class="page-inner">
                        <div class="card">
                            <!-- .card-body -->
                            <div class="card-body" style="background-color: white; color: black">
                                <span id="addendum">
                                    {!! $pkwt->agreement?->addendum['addendum'] !!}
                                </span>
                                <br>
                                <div class="row">
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
                            </div><!-- /.card-body -->
                        </div>
                        <div class="card">
                            <div class="card-body" style="background-color: white; color: black">
                                {!! $pkwt->agreement?->addendum['attachment_1'] !!}
                                <br>
                                <div class="row">
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
                            </div>
                        </div>
                        <div class="card">
                          <div class="card-body" style="background-color: white; color: black">
                              {!! $pkwt->agreement?->addendum['attachment_2'] !!}
                              <br>
                              <div class="row">
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
                          </div>
                      </div>
                    </div>
                    <!-- .page-sidebar -->
                    <div class="page-sidebar">
                        <!-- .card -->
                        <div class="card card-reflow">
                            <div class="card-body">
                                <h4 class="card-title"> Status Proses </h4>
                                <div class="progress progress-sm rounded-0 mb-1">
                                    @if ($pkwt->user?->signature == null)
                                        <div class="progress-bar bg-success w-75" role="progressbar" aria-valuenow="75"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    @else
                                        <div class="progress-bar bg-success w-100" role="progressbar" aria-valuenow="100"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    @endif
                                </div>
                                <p class="text-muted text-weight-bolder small"> Tanda Tangan PKWT </p>
                                <button class="btn btn-primary" onclick="printContent('printable-content')">Print
                                    PKWT</button>
                            </div><!-- .card-body -->
                            <div class="card-body border-top">
                                <h4 class="card-title"> History </h4><!-- .timeline -->
                                <ul class="timeline timeline-dashed-line">
                                    <li class="timeline-item">
                                        <!-- .timeline-figure -->
                                        <div class="timeline-figure">
                                            <span class="tile tile-circle tile-xs bg-success"><i
                                                    class="fa fa-check"></i></span>
                                        </div><!-- /.timeline-figure -->
                                        <!-- .timeline-body -->
                                        <div class="timeline-body">
                                            <h6 class="timeline-heading"> Cek Berkas </h6>
                                            {{-- <span class="timeline-date">08/18/2018 – 12:42 PM</span> --}}
                                        </div><!-- /.timeline-body -->
                                    </li>
                                    <li class="timeline-item">
                                        <!-- .timeline-figure -->
                                        <div class="timeline-figure">
                                            <span class="tile tile-circle tile-xs bg-success"><i
                                                    class="fa fa-check"></i></span>
                                        </div><!-- /.timeline-figure -->
                                        <!-- .timeline-body -->
                                        <div class="timeline-body">
                                            <h6 class="timeline-heading"> Interview </h6>
                                        </div><!-- /.timeline-body -->
                                    </li>
                                    <li class="timeline-item">
                                        <!-- .timeline-figure -->
                                        <div class="timeline-figure">
                                            <span class="tile tile-circle tile-xs bg-success"><i
                                                    class="fa fa-check"></i></span>
                                        </div><!-- /.timeline-figure -->
                                        <!-- .timeline-body -->
                                        <div class="timeline-body">
                                            <h6 class="timeline-heading"> Training </h6>
                                        </div><!-- /.timeline-body -->
                                    </li>
                                    <li class="timeline-item">
                                        <!-- .timeline-figure -->
                                        <div class="timeline-figure">
                                            <span class="tile tile-circle tile-xs bg-success"><i
                                                    class="fa fa-check"></i></span>
                                        </div><!-- /.timeline-figure -->
                                        <!-- .timeline-body -->
                                        <div class="timeline-body">
                                            <h6 class="timeline-heading"> NCC / BCC </h6>
                                        </div><!-- /.timeline-body -->
                                    </li>
                                    <li class="timeline-item">
                                        <!-- .timeline-figure -->
                                        <div class="timeline-figure">
                                            @if ($pkwt->user?->signature == null)
                                                <span class="tile tile-circle tile-xs"><i
                                                        class="fa fa-check d-none"></i></span>
                                            @else
                                                <span class="tile tile-circle tile-xs bg-success"><i
                                                        class="fa fa-check"></i></span>
                                            @endif
                                        </div><!-- /.timeline-figure -->
                                        <!-- .timeline-body -->
                                        <div class="timeline-body">
                                            <h6 class="timeline-heading"> Tanda Tangan PKWT </h6>
                                        </div><!-- /.timeline-body -->
                                    </li>
                                </ul><!-- /.timeline -->
                            </div><!-- /.card-body -->
                        </div><!-- /.card -->
                    </div><!-- /.page-sidebar -->
                </div><!-- /.page -->
            </div><!-- /.wrapper -->
    </main>
@section('print-styles')
    <style>
        /* Define print styles */
        @media print {
            body {
                font-size: 14pt;
                /* Adjust the font size for printing */
            }

            .wrapper {
                width: 210mm;
                /* Set the width of the printable area to fit A4 paper */
                margin: 0 auto;
                /* Center the content on the page */
                padding: 50px;
                /* Add padding to the content for better readability */
            }

            .card {
                page-break-after: always;
                /* Add a page break after each card (section) */
                background-color: white;
                /* Set a white background for cards */
                color: black;
                /* Set text color to black for cards */
                margin-bottom: 10px;
                /* Add space between cards */
            }
        }
    </style>
@endsection
@endsection

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
            .replace('{TANGGAL_MULAI}', '{{ $pkwt->agreement['start_date'] }}')
            .replace('{TANGGAL_MULAI}', '{{ $pkwt->agreement['start_date'] }}')
            .replace('{TANGGAL_MULAI}', '{{ $pkwt->agreement['start_date'] }}')
            .replace('{TANGGAL_BERAKHIR}', '{{ $pkwt->agreement['end_date'] }}')
            .replace('{JABATAN}', '{{ $pkwt->agreement['department'] }}')
            .replace('{GAJI}', '{{ $pkwt->agreement['salary'] }}')
            .replace('{PROJECT}', '{{ $pkwt->agreement->addendum->site['description'] }}')
            .replace('{AREA}', '{{ $pkwt->agreement['area'] }}')
            .replace('{TUNJANGAN_JABATAN}', '{{ $pkwt->agreement['department_allowance'] }}')
            .replace('{TUNJANGAN_KEHADIRAN}', '{{ $pkwt->agreement['attendance_allowance'] }}')
            .replace('{TUNJANGAN_KOMUNIKASI}', '{{ $pkwt->agreement['comunication_allowance'] }}')
            .replace('{TUNJANGAN_KECANTIKAN}', '{{ $pkwt->agreement['beauty_allowance'] }}')
            .replace('{TUNJANGAN_MAKAN}', '{{ $pkwt->agreement['food_allowance'] }}')
            .replace('{TUNJANGAN_TRANSPORT}', '{{ $pkwt->agreement['transport_allowance'] }}')
            .replace('{TUNJANGAN_LOKASI}', '{{ $pkwt->agreement['location_allowance'] }}')
            .replace('{OTHER_NON_FIX}', '{{ $pkwt->agreement['other_non_fix_allowance'] }}')
            .replace('{TEMPAT}', '{{ $pkwt->agreement['place'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{TTL}', '{{ $pkwt->user?->profile['birth_place'] }}, {{ $pkwt->user?->profile['birth_date'] }}')
            .replace('{NIK}', '{{ $pkwt->user['nik_number'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var canvas = document.getElementById('signatureCanvas');
        var signaturePad = new SignaturePad(canvas);
        var saveButton = document.getElementById('saveButton');

        saveButton.addEventListener('click', function() {
            if (signaturePad.isEmpty()) {
                alert('Tanda tangan kosong, silahkan tanda tangan');
            } else {
                var signatureDataUrl = signaturePad.toDataURL();
                saveSignature(signatureDataUrl);
            }
        });

        function saveSignature(signatureDataUrl) {
            fetch('{{ url('esigns') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        signatureDataUrl: signatureDataUrl
                    })
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    signaturePad.clear();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    });
</script>

<script>
    function printContent(elementId) {
        var originalContents = document.body.innerHTML;
        var printContents = document.getElementById(elementId).innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
@endpush
