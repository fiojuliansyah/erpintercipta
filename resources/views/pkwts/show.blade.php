@extends('layouts.master')

@section('title', 'PKWT & SKK Detail | InterCipta ERP Management')

@section('content')
  <!-- .app-main -->
  @if ( Auth::user()->pkwt == null )
  <main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
      <!-- .empty-state -->
      <div id="notfound-state" class="empty-state">
        <!-- .empty-state-container -->
        <div class="empty-state-container">
          <div class="state-figure">
            <img class="img-fluid" src="{{ asset('') }}admin/images/illustration/img-6.svg" alt="" style="max-width: 300px">
          </div>
          <h3 class="state-header"> Mohon Maaf </h3>
          <p class="state-description lead text-muted"> Kamu tidak dalam proses PERJANJIAN KERJA WAKTU TERTENTU </p>
        </div><!-- /.empty-state-container -->
      </div><!-- /.empty-state -->
    </div><!-- /.wrapper -->
  </main>    
  @else   
  <main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
      <!-- .page -->
      <div class="page has-sidebar has-sidebar-expand-xl">
        <!-- .page-inner -->
        <div class="page-inner">
          <!-- .page-title-bar -->
          <header class="page-title-bar">
            <div class="d-md-flex">
              <h1 class="page-title"> {{ Auth::user()->pkwt?->reference_number }} </h1>
            </div>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
              <!-- .modal-dialog -->
              <div class="modal-dialog modal-dialog-centered" role="document">
                <!-- .modal-content -->
                <div class="modal-content">
                  <!-- .modal-header -->
                  <div class="modal-header">
                    <h5 id="exampleModalCenterLabel" class="modal-title"> Tanda Tangan </h5>
                  </div><!-- /.modal-header -->
                  <!-- .modal-body -->
                  <form action="{{ url('signatures') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <canvas id="signatureCanvas" width="500" height="200"></canvas>           
                    </div><!-- /.modal-body -->
                    <!-- .modal-footer -->
                    <div class="modal-footer">
                        <button id="clearButton" class="btn btn-warning">Hapus TTD</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                        <button id="saveButton" class="btn btn-primary">Simpan</button>
                    </div><!-- /.modal-footer -->
                </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="card">
            <!-- .card-body -->
            <div class="card-body">
                <span id="addendum">
                  {!! Auth::user()->pkwt?->addendum['addendum'] !!}
                </span>
                <br>
                <div class="row">
                    <div class="col-md-6 mb-4 text-center">
                        <p>PIHAK PERTAMA</p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p>( <u>{{ Auth::user()->name }}</u> )</p>
                        <p>Human Resource Development</p>
                    </div>
                    <div class="col-md-6 mb-4 text-center">
                        <p>PIHAK KEDUA</p>
                        <br>
                        @if (Auth::user()->signature == null) 
                        <br>   
                        @else                         
                        <img src="{{ Storage::url(Auth::user()->signature['signatureDataUrl']) }}" width="300" alt="">
                        @endif
                        <br>
                        <p>( <u>{{ Auth::user()->pkwt?->user['name'] }}</u> )</p>
                        <p>Karyawan</p>
                    </div>
                    <br>
                </div>
            </div><!-- /.card-body -->
        </div>
        <div class="card">
            <div class="card-body">
                {!! html_entity_decode(Auth::user()->pkwt?->addendum['skk']) !!}
                <br>
                <div class="row">
                    <div class="col-md-6 mb-4 text-center">
                        <p>PIHAK PERTAMA</p>
                        <strong>{{ Auth::user()->pkwt->addendum?->company['company'] }}</strong>
                        <br>
                        <br>
                        <br>
                        <p>( <u>{{ Auth::user()->name }}</u> )</p>
                        <p>Human Resource Development</p>
                    </div>
                    <div class="col-md-6 mb-4 text-center">
                      <p>PIHAK KEDUA</p>
                      <br>
                      @if (Auth::user()->signature == null) 
                        <br>   
                        @else                         
                        <img src="{{ Storage::url(Auth::user()->signature['signatureDataUrl']) }}" width="300" alt="">
                        @endif
                      <br>
                      <p>( <u>{{ Auth::user()->pkwt?->user['name'] }}</u> )</p>
                      <p>Karyawan</p>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <div class="d-md-flex">
          @if (Auth::user()->signature == null)   
          <div class="ml-auto">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Tanda Tangan</button>
          </div>
          @else   
          @endif
        </div>
        </div><!-- /.page-inner -->
        <!-- .page-sidebar -->
        <div class="page-sidebar">
          <!-- .card -->
          <div class="card card-reflow">
            <div class="card-body">
              <h4 class="card-title"> Status Proses </h4>
              <div class="progress progress-sm rounded-0 mb-1">
                @if (Auth::user()->signature == null) 
                <div class="progress-bar bg-success w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>                    
                @else
                <div class="progress-bar bg-success w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                @endif
              </div>
              <p class="text-muted text-weight-bolder small"> Tanda Tangan PKWT </p>
            </div><!-- .card-body -->
            <div class="card-body border-top">
              <h4 class="card-title"> History </h4><!-- .timeline -->
              <ul class="timeline timeline-dashed-line">
                <li class="timeline-item">
                  <!-- .timeline-figure -->
                  <div class="timeline-figure">
                    <span class="tile tile-circle tile-xs bg-success"><i class="fa fa-check"></i></span>
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
                    <span class="tile tile-circle tile-xs bg-success"><i class="fa fa-check"></i></span>
                  </div><!-- /.timeline-figure -->
                  <!-- .timeline-body -->
                  <div class="timeline-body">
                    <h6 class="timeline-heading"> Interview </h6>
                  </div><!-- /.timeline-body -->
                </li>
                <li class="timeline-item">
                  <!-- .timeline-figure -->
                  <div class="timeline-figure">
                    <span class="tile tile-circle tile-xs bg-success"><i class="fa fa-check"></i></span>
                  </div><!-- /.timeline-figure -->
                  <!-- .timeline-body -->
                  <div class="timeline-body">
                    <h6 class="timeline-heading"> Training </h6>
                  </div><!-- /.timeline-body -->
                </li>
                <li class="timeline-item">
                  <!-- .timeline-figure -->
                  <div class="timeline-figure">
                    <span class="tile tile-circle tile-xs bg-success"><i class="fa fa-check"></i></span>
                  </div><!-- /.timeline-figure -->
                  <!-- .timeline-body -->
                  <div class="timeline-body">
                    <h6 class="timeline-heading"> NCC / BCC </h6>
                  </div><!-- /.timeline-body -->
                </li>
                <li class="timeline-item">
                  <!-- .timeline-figure -->
                  <div class="timeline-figure">
                    @if (Auth::user()->signature == null)  
                      <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                    @else
                      <span class="tile tile-circle tile-xs bg-success"><i class="fa fa-check"></i></span>
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
  </main><!-- /.app-main -->
  @endif
@endsection

@push('js')
<script>
  // Ambil elemen yang mengandung teks yang akan diganti
  var element = document.getElementById('addendum');
  
  // Ganti teks dalam elemen tersebut
  if (element) {
      element.innerHTML = element.innerHTML
          .replace('{REFERENCE_NUMBER}', '{{ Auth::user()->pkwt?->addendum['reference_number'] }}')
          .replace('{USER_NAME}', '{{ Auth::user()->name }}')
          .replace('{USER_GENDER}', '{{ Auth::user()->profile['gender'] }}')
          .replace('{USER_BIRTH}', '{{ Auth::user()->profile['birth_place'] }}, {{ Auth::user()->profile['birth_date'] }}')
          .replace('{USER_NIK}', '{{ Auth::user()->profile['nik_number'] }}')
          .replace('{USER_ADDRESS}', '{{ Auth::user()->profile['address'] }}')
          .replace('{DATE_ABJAD}', '{{ Auth::user()->pkwt?->addendum['date_abjad'] }}')
          .replace('{MONTH_ABJAD}', '{{ Auth::user()->pkwt?->addendum['month_abjad'] }}')
          .replace('{YEAR_ABJAD}', '{{ Auth::user()->pkwt?->addendum['year_abjad'] }}')
          .replace('{CAREER}', '{{ Auth::user()->applicant?->career['jobname'] }}')
          .replace('{PROJECT}', '{{ Auth::user()->pkwt?->addendum['project'] }}')
          .replace('{AREA}', '{{ Auth::user()->pkwt?->addendum['area'] }}')
          .replace('{SALARY}', '{{ Auth::user()->pkwt?->addendum['salary'] }}')
          .replace('{ALLOWANCE}', '{{ Auth::user()->pkwt?->addendum['allowance'] }}')
          .replace('{DATE}', '{{ Auth::user()->pkwt?->addendum['created_at'] }}')
          .replace('{PLACE}', '{{ Auth::user()->pkwt?->addendum['place'] }}');
  }
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
      var canvas = document.getElementById('signatureCanvas');
      var signaturePad = new SignaturePad(canvas);
      var saveButton = document.getElementById('saveButton');
      var clearButton = document.getElementById('clearButton');

      saveButton.addEventListener('click', function() {
          if (signaturePad.isEmpty()) {
              alert('Tanda tangan kosong, silahkan tanda tangan');
          } else {
              var signatureDataUrl = signaturePad.toDataURL();
              saveSignature(signatureDataUrl);
          }
      });

      clearButton.addEventListener('click', function() {
          signaturePad.clear();
      });

      function saveSignature(signatureDataUrl) {
          fetch('{{ url('signatures') }}', {
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
@endpush