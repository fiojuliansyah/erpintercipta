<html>

<head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <style type="text/css">
        ol {
            margin: 0;
            padding: 0
        }

        table td,
        table th {
            padding: 0
        }

        .c1 {
            color: #000000;
            font-weight: 400;
            text-decoration: none;
            vertical-align: baseline;
            font-size: 11pt;
            font-family: "Times New Roman", Times, serif;
            font-style: normal
        }

        .c0 {
            padding-top: 0pt;
            padding-bottom: 0pt;
            line-height: 1.15;
            orphans: 2;
            widows: 2;
            text-align: justify;
            height: 11pt
        }

        .c2 {
            background-color: #ffffff;
            max-width: 468pt;
            padding: 72pt 72pt 72pt 72pt
        }

        .title {
            padding-top: 0pt;
            color: #000000;
            font-size: 26pt;
            padding-bottom: 3pt;
            font-family: "Times New Roman", Times, serif;
            line-height: 1.15;
            page-break-after: avoid;
            orphans: 2;
            widows: 2;
            text-align: left
        }

        .subtitle {
            padding-top: 0pt;
            color: #666666;
            font-size: 15pt;
            padding-bottom: 16pt;
            font-family: "Times New Roman", Times, serif;
            line-height: 1.15;
            page-break-after: avoid;
            orphans: 2;
            widows: 2;
            text-align: left
        }

        li {
            color: #000000;
            font-size: 11pt;
            font-family: "Times New Roman", Times, serif
        }

        p {
            margin: 0;
            color: #000000;
            font-size: 11pt;
            font-family: "Times New Roman", Times, serif
        }

        h1 {
            padding-top: 20pt;
            color: #000000;
            font-size: 20pt;
            padding-bottom: 6pt;
            font-family: "Times New Roman", Times, serif;
            line-height: 1.15;
            page-break-after: avoid;
            orphans: 2;
            widows: 2;
            text-align: left
        }

        h2 {
            padding-top: 18pt;
            color: #000000;
            font-size: 16pt;
            padding-bottom: 6pt;
            font-family: "Times New Roman", Times, serif;
            line-height: 1.15;
            page-break-after: avoid;
            orphans: 2;
            widows: 2;
            text-align: left
        }

        h3 {
            padding-top: 16pt;
            color: #434343;
            font-size: 14pt;
            padding-bottom: 4pt;
            font-family: "Times New Roman", Times, serif;
            line-height: 1.15;
            page-break-after: avoid;
            orphans: 2;
            widows: 2;
            text-align: left
        }

        h4 {
            padding-top: 14pt;
            color: #666666;
            font-size: 12pt;
            padding-bottom: 4pt;
            font-family: "Times New Roman", Times, serif;
            line-height: 1.15;
            page-break-after: avoid;
            orphans: 2;
            widows: 2;
            text-align: left
        }

        h5 {
            padding-top: 12pt;
            color: #666666;
            font-size: 11pt;
            padding-bottom: 4pt;
            font-family: "Times New Roman", Times, serif;
            line-height: 1.15;
            page-break-after: avoid;
            orphans: 2;
            widows: 2;
            text-align: left
        }

        h6 {
            padding-top: 12pt;
            color: #666666;
            font-size: 11pt;
            padding-bottom: 4pt;
            font-family: "Times New Roman", Times, serif;
            line-height: 1.15;
            page-break-after: avoid;
            font-style: italic;
            orphans: 2;
            widows: 2;
            text-align: left
        }
    </style>
</head>

<body class="c2 doc-content">
    <p class="c0"><span class="c1">
        {!! $pkwt->agreement->addendum['addendum'] !!}
    </span></p>
    <br>
    <div class="row">
        <div class="col-md-6 mb-4 text-center">
            <p>PIHAK PERTAMA</p>
            <br>
            @if ($pkwt->user?->signature == null) 
              <br>   
              @else                         
              <img src="{{ Storage::url($pkwt->signature_hrd) }}" width="300" alt="">
            @endif
            <br>
            <p>( <u>{{ $pkwt->agreement->addendum['responsible'] }}</u> )</p>
            <p>Human Resource Development</p>
        </div>
        <div class="col-md-6 mb-4 text-center">
            <p>PIHAK KEDUA</p>
            <br>
            @if ($pkwt->user?->signature == null) 
            <br>   
            @else                         
            <img src="{{ Storage::url($pkwt->user?->signature['signatureDataUrl']) }}" width="300" alt="">
            @endif
            <br>
            {{-- <p>( <u>{{ $pkwt->user['name'] }}</u> )</p> --}}
            <p>Karyawan</p>
        </div>
        <br>
    </div>
    <br>
    <br>
    <p class="c0"><span class="c1">
        {!! $pkwt->agreement->addendum['attachment_1'] !!}
    </span></p>
    <div class="row">
        <div class="col-md-6 mb-4 text-center">
            <p>PIHAK PERTAMA</p>
            <br>
            @if ($pkwt->user?->signature == null) 
              <br>   
              @else                         
              <img src="{{ Storage::url($pkwt->signature_hrd) }}" width="300" alt="">
            @endif
            <br>
            <p>( <u>{{ $pkwt->agreement->addendum['responsible'] }}</u> )</p>
            <p>Human Resource Development</p>
        </div>
        <div class="col-md-6 mb-4 text-center">
            <p>PIHAK KEDUA</p>
            <br>
            @if ($pkwt->user?->signature == null) 
            <br>   
            @else                         
            <img src="{{ Storage::url($pkwt->user?->signature['signatureDataUrl']) }}" width="300" alt="">
            @endif
            <br>
            {{-- <p>( <u>{{ $pkwt->user['name'] }}</u> )</p> --}}
            <p>Karyawan</p>
        </div>
        <br>
    </div>
    <p class="c0"><span class="c1">
        {!! $pkwt->agreement->addendum['attachment_2'] !!}
    </span></p>
    <div class="row">
        <div class="col-md-6 mb-4 text-center">
            <p>PIHAK PERTAMA</p>
            <br>
            @if ($pkwt->user?->signature == null) 
              <br>   
              @else                         
              <img src="{{ Storage::url($pkwt->signature_hrd) }}" width="300" alt="">
            @endif
            <br>
            <p>( <u>{{ $pkwt->agreement->addendum['responsible'] }}</u> )</p>
            <p>Human Resource Development</p>
        </div>
        <div class="col-md-6 mb-4 text-center">
            <p>PIHAK KEDUA</p>
            <br>
            @if ($pkwt->user?->signature == null) 
            <br>   
            @else                         
            <img src="{{ Storage::url($pkwt->user?->signature['signatureDataUrl']) }}" width="300" alt="">
            @endif
            <br>
            {{-- <p>( <u>{{ $pkwt->user['name'] }}</u> )</p> --}}
            <p>Karyawan</p>
        </div>
        <br>
    </div>
    <script>
    // Ambil elemen yang mengandung teks yang akan diganti
    var element = document.getElementById('addendum');
    
    // Ganti teks dalam elemen tersebut
    if (element) {
        element.innerHTML = element.innerHTML
            .replace('{NO_SURAT}', '<b>No. {{ $pkwt->pkwt_number }}/{{ $pkwt->agreement->addendum?->company['cmpy'] }}/HR-{{ $pkwt->agreement->addendum['area'] }}/{{ $pkwt->agreement->addendum['romawi'] }}/{{ $pkwt->agreement->addendum['year'] }}</b>')
            .replace('{PENANGGUNG_JAWAB}', '{{ $pkwt->agreement->addendum['responsible'] }}')
            .replace('{PELAMAR}', '{{ $pkwt->user['name'] }}')
            .replace('{JENIS_KELAMIN}', '{{ $pkwt->user?->profile['gender'] }}')
            .replace('{TTL}', '{{ $pkwt->user?->profile['birth_place'] }}, {{ $pkwt->user?->profile['birth_date'] }}')
            .replace('{NIK}', '{{ $pkwt->user['nik_number'] }}')
            .replace('{ALAMAT}', '{{ $pkwt->user?->profile['address'] }}')
    }
    </script>
</body>

</html>
