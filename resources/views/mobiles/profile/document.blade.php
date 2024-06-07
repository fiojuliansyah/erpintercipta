@extends('mobiles.layouts.master')

@section('title','Document | Intercipta Mobile')

@section('content')
<div class="page-content">
        
    <div class="page-title page-title-small">
        <h2><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>Document</h2>
    </div>
    <div class="card header-card shape-rounded" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg"></div>
    </div>

    <br>
    <div class="row">
        @foreach ($documents as $doc) 
        <div class="col-6">
            <a href="#">
                <div class="card card-style">
                    <div class="content">
                        <h1 class="mb-0 font-600 font-22">{{ $doc->type }}</h1>
                        <span class="pr-2 opacity-30">{{  $doc->title }}</span>
                        <p class="pt-3">
                            <span class="badge badge-danger">{{ $doc->expired }}</span>
                        </p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <a href="#" data-menu="buat-document"
        class="btn btn-full btn-center-m bg-blue2-dark rounded-sm shadow-xl btn-m text-uppercase font-900">Berkas</a>
</div>
@endsection

@section('modal')
<div id="buat-document" class="menu menu-box-modal rounded-m" data-menu-height="500" data-menu-width="350">
    <div class="content mb-0">
        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card card-style">
                <div class="content mb-0">
                    <h3>Upload Pas Foto</h3>
                    <p>*jpg,jpeg,png</p>
                    <input type="file" id="fileInput" class="form-control form-control-solid">
                    <div id="result" style="margin-top: 50px; display: none">
                        <div style="display: flex; flex-wrap: wrap;" id="results">
                            <div style="display: none;">
                            <h3>Original image</h3>
                            <img id="orig" />
                            </div>
                            <div id="highlighted" style="display: none;">
                            <h3>Highlighted Paper</h3>
                            </div>
                            <div id="extracted">
                            </div>
                            <div id="cornerPts" style="display: none;">
                            <h3>Corner Points</h3>
                            <pre style="font-family: monospace"></pre>
                            </div>
                        </div>
                    </div>
                    <input type="file" name="file" id="resultExtracted" style="display: none">
                </div>
            </div>
            <div class="card card-style">
                <div class="content mb-0">
                    <span>Status</span>
                    <div class="input-style input-style-1 input-required">
                        <em><i class="fa fa-angle-down"></i></em>
                        <select name="type" required>
                            <option value="default" disabled selected>Pilih Document</option>
                            <option value="KTP">KTP</option>
                            <option value="IJAZAH">IJAZAH</option>
                            <option value="NPWP">NPWP</option>
                            <option value="CERTIFICATE">SERTIFIKAT</option>
                            <option value="SIM">SIM</option>
                            <option value="PAKLARING">PAKLARING</option>
                        </select>
                    </div>
                    <br>
                    <span>Title</span>
                    <em>(wajib)</em>
                    <input type="name" name="title" class="form-control">
                    <br>
                    <span>Expired</span>
                    <em>(wajib)</em>
                    <input type="date" name="expired" class="form-control">
                    <br>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-s button-s btn-center-s shadow-l rounded-s text-uppercase font-900 bg-blue1-light">Submit</button>
                </div>
                <div class="col">
                    <a href="#"
                        class="close-menu btn btn-s button-s btn-center-s shadow-l rounded-s text-uppercase font-900 bg-red1-light">Close</a>                     
                </div>
            </div>
            <br>
        </form>
    </div>
</div>
@endsection
@push('js')
<script src="https://docs.opencv.org/4.7.0/opencv.js" async></script>
<script src="https://cdn.jsdelivr.net/gh/ColonelParrot/jscanify@master/src/jscanify.min.js"></script>
<script>
    window.addEventListener("load", function () {
      const scanner = new jscanify();
      fileInput.addEventListener("change", function (e) {
        if (e.target.files.length) {
          const image = e.target.files[0];
          orig.src = URL.createObjectURL(image);
          clearData();
          result.style.display = "block";

          orig.onload = function () {
            const highlightedCanvas = scanner.highlightPaper(orig);
            highlighted.appendChild(highlightedCanvas);

            const extractedCanvas = scanner.extractPaper(orig, 350, 350);
            extracted.appendChild(extractedCanvas);

            const contour = scanner.findPaperContour(cv.imread(orig));
            const cornerPoints = scanner.getCornerPoints(contour);
            cornerPts.querySelector("pre").textContent = JSON.stringify(
              cornerPoints,
              null,
              4
            );

            // Convert extracted canvas to Blob and set it to resultExtracted input
            extractedCanvas.toBlob(function(blob) {
              const file = new File([blob], "document.png", { type: "image/png" });
              const dataTransfer = new DataTransfer();
              dataTransfer.items.add(file);
              document.querySelector("#resultExtracted").files = dataTransfer.files;
            }, "image/png");
          };
        }
      });
    });

    function clearData() {
      highlighted.querySelector("canvas")?.remove();
      extracted.querySelector("canvas")?.remove();
      cornerPts.querySelector("pre").textContent = "";
    }
</script>    
@endpush