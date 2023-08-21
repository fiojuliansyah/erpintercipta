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
              <div class="ml-auto">
                <button type="button" class="btn btn-primary">Tanda Tangan</button>
              </div>
            </div>
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="card">
            <!-- .card-body -->
            <div class="card-body">
                <h2 class="card-title text-center"><u>PERJANJIAN KERJA WAKTU TERTENTU</u></h2>
                <h2 class="card-title text-center"> {{ Auth::user()->pkwt?->reference_number }} </h2>
                <br>
                <p>Yang bertandatangan dibawah ini :</p>
                <div class="row">
                    <div class="col-md-1 mb-4">
                        <p>I.</p>
                    </div>
                    <div class="col-md-2 mb-4">
                        <p>Nama</p>
                        <p>Alamat</p>
                    </div>
                    <div class="col-md-0 mb-4">
                        <p>: {{ Auth::user()->name }}</p>
                        <p>: Graha Intercipta Pusat Bisnis Daan Mogot Baru Jl. Tampak Siring Blok KJF No.28-32, Kalideres, Jakarta Barat 11840.</p>
                    </div>
                </div>
                <br>
                <p>Dalam hal ini menjalankan jabatannya selaku <strong>HRD Manager</strong> mewakili direksi, bertindak untuk dan atas nama PT Intercipta Jasa Indonesia, sebuah perusahaan yang bergerak dalam bidang Penyedia Jasa Tenaga Kerja (PJTK) bagi Perusahaan Pemakai Jasa PIHAK PERTAMA, yang selanjutnya disebut sebagai PIHAK PERTAMA</p>
                <br>
                <div class="row">
                    <div class="col-md-1 mb-4">
                        <p>II.</p>
                    </div>
                    <div class="col-md-2 mb-4">
                        <p>Nama</p>
                        <p>Jenis Kelamin</p>
                        <p>Tempat Tanggal Lahir</p>
                        <p>No. KTP</p>
                        <p>Alamat KTP</p>
                    </div>
                    <div class="col-md-0 mb-4">
                        <p>: {{ Auth::user()->pkwt?->user['name'] }}</p>
                        <p>: {{ Auth::user()->profile['gender'] }}</p>
                        <p>: {{ Auth::user()->profile['birth_place'] }}, {{ Auth::user()->profile['birth_date'] }}</p>
                        <p>: {{ Auth::user()->profile['nik_number'] }}</p>
                        <p>: {{ Auth::user()->profile['address'] }}</p>
                    </div>
                </div>
                <p>Bertindak untuk dan atas namanya sendiri yang selanjutnya disebut sebagai PIHAK KEDUA</p>
                <br>
                <p>PIHAK PERTAMA dan PIHAK KEDUA secara bersama-sama selanjutnya disebut sebagai PARA PIHAK
                    Pada hari ini, tanggal <strong>{{ Auth::user()->pkwt?->date_abjad }}</strong> bulan <strong>{{ Auth::user()->pkwt?->month_abjad }}</strong> tahun <strong>{{ Auth::user()->pkwt?->year_abjad }}</strong>, PARA PIHAK sepakat menandatangani Perjanjian Kerja dengan ketentuan-ketentuan sebagai berikut :
                    </p>
                <br>
                <h2 class="card-title text-center">PASAL 1</h2>
                <h2 class="card-title text-center">KETENTUAN KERJA</h2>
                <br>
                <p>1. Bahwa PIHAK PERTAMA dengan ini telah menyetujui untuk mempekerjakan PIHAK KEDUA dengan tugas sebagaimana diatur dalam PERJANJIAN dengan jangka waktu tertentu selama --- (-----) bulan, terhitung sejak tanggal ----- bulan ----- tahun ------ (21-1-2023) sampai dengan tanggal ------ bulan ------ tahun ------- (29-2-2024).</p>
                <p>2. PIHAK PERTAMA menawarkan dan PIHAK KEDUA menerima/bersedia untuk bekerja sebagai <strong>Trainer</strong> pada proyek<strong> {{ Auth::user()->pkwt?->project }} area {{ Auth::user()->pkwt?->area }}</strong> selanjutnya disebut sebagai Pihak Pemakai Jasa PIHAK PERTAMA.</p>
                <p>3. PIHAK KEDUA mengetahui bahwa perjanjian kerja ini dapat berubah sewaktu-waktu apabila ada perubahan kesepakatan antara PIHAK PERTAMA dengan Pihak Pemakai Jasa/ Pemberi kerja. Perubahan yang dimaksud antara lain perubahan nilai kontrak, perubahan jumlah tenaga kerja, dan berakhirnya massa kontrak.</p>
                <p>4. PIHAK KEDUA bersedia memenuhi syarat-syarat yang ditetapkan oleh PIHAK PERTAMA atau Pemakai Jasa PIHAK PERTAMA, yaitu apabila PIHAK KEDUA tidak dapat menunjukkan hasil kerja sesuai yang ditetapkan oleh PIHAK PERTAMA atau Pemakai Jasa PIHAK PERTAMA, maka PIHAK PERTAMA dapat memutuskan hubungan kerja dengan atau tanpa alasan serta tanpa kewajiban apapun berkaitan dengan pemutusan kerja tersebut.</p>
                <p>5. Apabila pembatalan sebagaimana tersebut dalam poin 2 (dua) di atas terjadi, maka PIHAK KEDUA dengan ini menyatakan dan menyetujui untuk tidak melakukan penuntutan dalam bentuk apapun dan bagaimanapun juga.</p>
                <p>6. Apabila perjanjian antara PIHAK PERTAMA dan Pihak Pemakai Jasa PIHAK PERTAMA berakhir, maka otomatis Perjanjian Kerja PIHAK PERTAMA dan PIHAK KEDUA berakhir.</p>
                <p>7. Apabila PIHAK KEDUA ingin mengundurkan diri, harus mengajukan pengunduran diri paling lambat 30 hari. Jika kurang dari 30 hari sudah mengundurkan diri, maka PIHAK KEDUA akan dikenakan sanksi administrasi/penalty senilai Total Upah dari sisa masa periode perjanjian kerja.</p>
                <br>
                <h2 class="card-title text-center">PASAL 2</h2>
                <h2 class="card-title text-center">PENEMPATAN KERJA</h2>
                <br>
                <p>Bahwa PIHAK KEDUA bersedia untuk dipindahtugaskan ke bagian lain dalam lingkup perusahaan apabila diperlukan oleh PIHAK PERTAMA dan atau pihak Pemakai Jasa PIHAK PERTAMA, dan skema gaji, tunjangan dan upah lembur mengikuti lokasi yang baru.</p>
                <br>
                <h2 class="card-title text-center">PASAL 3</h2>
                <h2 class="card-title text-center">HAK DAN KEWAJIBAN</h2>
                <br>
                <p>1. PIHAK KEDUA wajib mengikuti pelatihan dan arahan kerja yang dilaksanakan baik selama masa training maupun selama masa kontrak.</p>
                <p>2. PIHAK PERTAMA berhak untuk melaksanakan penilaian kerja kepada PIHAK KEDUA, menyampaikan teguran dan peringatan atas pelanggaran Tata Tertib dan Ketentuan Perusahaan oleh PIHAK KEDUA.</p>
                <p>3. PIHAK KEDUA akan mendapatkan imbalan gaji pada akhir bulan kalender setiap bulannya sesuai dengan perhitungan perolehan berdasarkan hari kerja yang diberikan dan telah disepakati oleh PIHAK PERTAMA dan Pemakai Jasa PIHAK PERTAMA, dengan perincian :</p>
                <div class="row">
                    <div class="col-md-2 mb-4">
                        <p>- Gaji Pokok</p>
                        <p>- Tunjangan Jabatan</p>
                    </div>
                    <div class="col-md-2 mb-4">
                        <p>: Rp. {{ Auth::user()->pkwt?->salary }}</p>
                        <p>: Rp. {{ Auth::user()->pkwt?->allowance }}</p>
                    </div>
                </div>
                <p>Dengan ketentuan sebagai berikut:</p>
                <p>- Perhitungan gaji dilakukan berdasarkan hari kerja (no work no pay)</p>
                <p>Paket tersebut adalah paket untuk satu bulan dan sewaktu-waktu dapat berubah sesuai dengan paket yang diberikan Pihak Pemakai Jasa PIHAK PERTAMA.</p>
                <p>4. PIHAK KEDUA berkewajiban untuk :</p>
                <p>- Melaksanakan tugas dan tanggung jawab yang diberikan berdasarkan Job Description yang menjadi tanggung jawaban</p>
                <p>- Mematuhi segala peraturan yang berlaku dan ketentuan-ketentuan dalam peraturan perusahaan baik yang berlaku sekarang maupun yang akan ditentukan kemudian.</p>
                <p>- Mengundurkan diri dengan keinginan sendiri, apabila diketahui dikemudian hari melakukan penyelewengan dan penyimpangan yang sesuai dengan ketentuan hukum pidana.</p>
                <p>- Dalam hal masa kontrak berakhir atau mengundurkan diri maka PIHAK KEDUA wajib  untuk mengembalikan seluruh inventaris PIHAK PERTAMA dan Pemakai Jasa PIHAK PERTAMA yang digunakannya dan menyelesaikan kewajiban-kewajibannya yang belum dipenuhi kepada PIHAK PERTAMA dan Pemakai Jasa PIHAK PERTAMA.</p>
                <br>
                <h2 class="card-title text-center">PASAL 4</h2>
                <h2 class="card-title text-center">JAM KERJA RESMI dan ABSEN TIDAK MASUK KERJA</h2>
                <br>
                <p>1. Jam kerja resmi adalah 48 (empat puluh delapan) jam seminggu.</p>
                <p>2. PIHAK KEDUA melakukan pekerjaan diluar jam kerja resminya, atas persetujuan dari Pihak Pemakai Jasa PIHAK PERTAMA wajib mengisi form Surat Perintah Lembur (SPL).</p>
                <p>3. PIHAK KEDUA dapat dipanggil sewaktu-waktu kembali ke tempat kerja dalam keadaan darurat untuk menyelesaikan tugas yang sangat penting atau hal lainnya yang bersifat darurat.</p>
                <p>4. PIHAK KEDUA bersedia mengikuti ketentuan jam kerja yang diatur oleh Pihak Pemakai Jasa PIHAK PERTAMA. </p>
                <p>5. Apabila PIHAK KEDUA tidak dapat melaksanakan pekerjaannya selama 3 (tiga) hari kerja berturut – turut atau 5 (lima) hari kerja tidak secara berturut-turut dalam kurun waktu 1 (satu) bulan tanpa keterangan (alpa), maka PIHAK KEDUA dianggap telah mengundurkan diri, dan membebaskan PIHAK PERTAMA dari segala kewajibannya terhadap PIHAK KEDUA dari tuntutan pihak manapun juga.</p>
                <br>
                <h2 class="card-title text-center">PASAL 5</h2>
                <h2 class="card-title text-center">JAM KERJA RESMI dan ABSEN TIDAK MASUK KERJA</h2>
                <br>
                <p>1. PIHAK KEDUA berhak atas Badan Penyelenggara Jaminan Sosial (BPJS) meliputi :</p>
                <p>- Jaminan Hari Tua (JHT), Jaminan Kecelakaan Kerja (JKK), Jaminan Kematian (JKm), Jaminan Pensiun (JP), dan BPJS Kesehatan.</p>
                <p>- PIHAK PERTAMA berkewajiban memotong sebesar 2% (untuk JHT), dan 1% (untuk JP) dari Gaji pokok PIHAK KEDUA untuk pembayaran BPJS Ketenagakerjaan.</p>
                <p>- PIHAK PERTAMA berkewajiban memotong sebesar 1% untuk pembayaran BPJS Kesehatan.</p>
                <p>2. PIHAK KEDUA berhak atas Tunjangan Hari Raya (THR) dengan ketentuan jika masa kerja telah melewati 12 (dua belas) bulan, maka akan mendapatkan 1 (satu) kali Gaji Pokok. Jika masa kerja kurang dari 12 (dua belas) bulan, maka akan dibayarkan secara prorate sesuai masa kerja yang tertera di Perjanjian Kerja.</p>
                <br>
                <h2 class="card-title text-center">PASAL 6</h2>
                <h2 class="card-title text-center">PENGUPAHAN</h2>
                <br>
                <p>1. Sesuai dengan kesepakatan antara PIHAK PERTAMA dengan PIHAK KEDUA maka upah dibayar secara  bulanan dengan sistem penghitungan dari tanggal 21 s/d tanggal 20 dibulan berikutnya.</p>
                <p>2. Upah dibayarkan setiap tanggal 30 atau 31 dan atau jika pada tanggal yang telah ditentukan jatuh pada hari libur, maka upah akan dibayarkan setelah tanggal yang telah ditentukan oleh pihak keuangan perusahaan.</p>
                <p>3. Apabila PIHAK KEDUA mengundurkan diri sesuai prosedur maka gaji akan dibayarkan ditanggal 10 bulan berikutnya.</p>
                <p>4. Upah dibayarkan dengan cara mentransfer upah yang telah disepakati melalui rekening Bank yang telah ditunjuk oleh PIHAK PERTAMA. </p>
                <p>5. Upah dibayarkan berdasarkan jumlah hari kerja dan lembur dari PIHAK KEDUA, masuk kerja dan tercatat pada absensi yang disetujui oleh atasan secara langsung, serta pihak pengelola gedung.</p>
                <p>6. Bila PIHAK KEDUA tidak masuk karena sakit atau ijin harus disertakan dokumen pendukung yang sudah disetujui oleh Admin, Supervisor  atau Area Manager, apabila tidak ada maka dianggap alpa dan dikenakan tindakan disiplin dan administratif sesuai yang telah diatur sebelumya di pasal 3. </p>
                <p>7.	PIHAK PERTAMA berhak menangguhkan upah PIHAK KEDUA dalam waktu yang tidak dapat ditentukan, apabila Pihak Pemakai Jasa lalai dalam memenuhi tanggung jawab sesuai dengan perjanjian kerjasama antara PIHAK PERTAMA dengan Pihak Pemakai Jasa/ Pemberi kerja. Dan akan dibayarkan setelah Pihak Pemakai Jasa memenuhi seluruh kewajibannya kepada PIHAK PERTAMA. (Khususnya dalam hal ini Pihak Pemakai Jasa/ Pemberi kerja tidak melakukan pembayaran kontrak kepada PIHAK PERTAMA.</p>
                <br>
                <h2 class="card-title text-center">PASAL 7</h2>
                <h2 class="card-title text-center">PELANGGARAN</h2>
                <br>    
                <p>1. Dalam hal terjadi pelanggaran yang dapat merugikan PIHAK PERTAMA, maka PIHAK KEDUA bersedia mengganti kerugian tersebut kepada PIHAK PERTAMA.</p>
                <p>2. Untuk kasus pencurian ataupun penipuan yang baik terlibat secara langsung ataupun tidak maka akan dikenakan denda sebesar 10 kali lipat dari harga ataupun kerugian tersebut dan setelahnya akan diproses melalui jalur Hukum yang berlaku.</p>
                <p>3. Untuk pelanggaran asusila yang dilakukan dengan sengaja ataupun tidak sengaja maka akan di proses secara Hukum yang berlaku </p>
                <p>4. Dalam hal terjadi pelanggaran yang dimaksud dalam pasal VII ayat (1), adalah apabila PIHAK KEDUA melakukan perusakkan alat atau barang milik PIHAK PERTAMA atau milik Proyek (Klien) dimana PIHAK KEDUA ditempatkan yang mengakibat kerugian bagi PIHAK PERTAMA atau Proyek karena kelalaian PIHAK KEDUA, maka PIHAK KEDUA harus mengganti kerusakan dan atau kerugian tersebut.</p>
                <p>5. Dalam hal penggantian kerusakan dan atau kerugian tersebut, maka PIHAK KEDUA akan membayar dengan cara mencicil  50% dari gaji yang diterima oleh PIHAK KEDUA sampai lunas kepada PIHAK PERTAMA.</p>
                <p>6. Apabila PIHAK KEDUA  melakukan kesalahan atau tindakan yang merugikan PIHAK PERTAMA atau Pihak Pemakai Jasa maka PIHAK KEDUA akan dikenakan sanksi untuk mengganti seluruh kerugian yang di ditimbulkan oleh PIHAK KEDUA  dalam kurun waktu yang telah disepakati PIHAK PERTAMA dan PIHAK KEDUA.  PIHAK KEDUA  membebaskan PIHAK PERTAMA dari segala kewajiban (Pembayaran Gaji dan Tunjangan), termasuk biaya proses hukum kepolisian.</p>
                <br>
                <h2 class="card-title text-center">PENUTUP</h2>
                <br> 
                <p>1. PERJANJIAN KERJA ini berlaku dan mengikat secara sah setelah ditandatanganinya oleh PARA PIHAK.</p> 
                <p>2. PERJANJIAN KERJA beserta lampirannya merupakan satu kesatuan dan merupakan Perjanjian antara PARA PIHAK berkenaan dengan materi yang diperjanjikan. Tidak ada pernyataan, jaminan, ketentuan dan persyaratan, kesanggupan atau persetujuan timbal balik yang dinyatakan, disyaratkan atau diharuskan dalam perundang-undangan antara PARA PIHAK kecuali secara tegas dinyatakan dalam PERJANJIAN KERJA.</p>
                <p>3. Dalam hal terjadi perselisihan pendapat tentang PERJANJIAN KERJA ini, PARA PIHAK sepakat untuk pertama kalinya mengupayakan penyelesaian melalui musyawarah/mufakat. Bila ternyata upaya tersebut tidak berhasil mendapatkan penyelesaian, maka PARA PIHAK sepakat untul menyelesaikan masalahnya melalui instansi ketenagakerjaan setempat untuk dapat diselesaikan lebih lanjut.</p>
                <div class="row">
                    <div class="col-md-2 mb-4">
                        <p>Ditanda-tangani di</p>
                        <p>Pada Tanggal</p>
                    </div>
                    <div class="col-md-2 mb-4">
                        <p>: {{ Auth::user()->pkwt?->place }}</p>
                        <p>: {{ Auth::user()->pkwt?->update_at }}</p>
                    </div>
                </div>
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
                        <br>
                        <br>
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
                <h2 class="card-title text-center"><u>LAMPIRAN TAMBAHAN</u></h2>
                <br>
                <h2 class="card-title">A. DISIPLIN DAN FASILITAS KERJA</h2>
                <br>
                <h2 class="card-title">1. DISIPLIN KERJA</h2>
                <p>a. Semua staff harus hadir 45 menit sebelum briefing dimulai</p>
                <p>b. Absensi wajib diisi pada saat masuk dan pulang kantor dengan menggunakan Aplikasi Intertech.</p>
                <p>c. Waktu kerja diatur sesuai dengan peraturan yang berlaku di Proyek.</p>
                <br>
                <h2 class="card-title">2. KERAPIHAN KERJA</h2>
                <p>a. Selama jam kerja seragam, id card, sepatu wajib dipakai</p>
                <p>b. Bagi yang belum mendapatkan seragam beserta kelengkapannya, maka pakaian yang harus digunakan adalah kemeja putih dan celana panjang hitam atau sesuai peraturan proyek setempat.</p>
                <p>c. Selama berada di area / lingkungan Proyek, tidak diperkenankan merokok, makan, minum, tidur dll.</p>
                <h2 class="card-title">3. SURAT PERINGATAN</h2>
                <p>Perusahaan dapat memberikan Surat Peringatan tertulis kepada setiap pekerja yang melakukan pelanggaran tata tertib kerja Perusahaan, sbb :</p>
                <p>a. Surat Peringatan Pertama (SP I)</p>
                <p>b. Surat Peringatan Kedua (SP II)</p>
                <p>c. Surat Peringatan Ketiga (SP III)</p>
                <p>Surat Peringatan tidak perlu diberikan menurut urut-urutannya, tetapi dapat dinilai dari besar kecilnya bobot kesalahan yang dilakukan oleh pekerja.</p>
                <h2 class="card-title">4. KETENTUAN TAMBAHAN</h2>
                <p>a. Apabila Tenaga Kerja baru mengalami resiko (kecelakaan kerja atau meninggal dunia), tidak dapat meng-klaim ke BPJS Ketenagakerjaan maupun ke perusahaan selama proses pendaftaran ke BPJS Ketenagakerjaan berlangsung (selama satu bulan dua minggu) terhitung dari mulai join, dan pemotongan gaji untuk pembayaran BPJS Ketenagakerjaan akan dilakukan jika Tenaga Kerja telah menerima gaji penuh (tidak prorata).</p>
                <p>b. Fasilitas BPJS Kesehatan akan diterima Tenaga Kerja apabila Tenaga Kerja telah dinyatakan lolos secara administrasi atau tidak tertolak oleh sistem BPJS Kesehatan karena berbagai alasan. Proses pendaftaran berlangsung selama satu bulan terhitung sejak Tenaga Kerja memenuhi persyaratan pendafatarn dengan lengkap. Apabila terjadi resiko (sakit) selama proses pendaftaran (selama satu bulan), Tenaga Kerja tidak ditanggung oleh BPJS Kesehatan maupun Perusahaan. Pemotongan gaji untuk pembayaran BPJS Kesehatan akan dilakukan setelah Tenaga Kerja dinyatakan lolos administrasi sistem BPJS Kesehatan</p>
                <p>c. Tenaga kerja mendapatkan fasilitas seragam sebanyak 2 (dua) pasang untuk masa pemakaian selama 1 (satu) tahun.</p>
                <p>d. Sanksi administrasi berupa denda apabila seragam rusak atau hilang sebelum masa pemakaian habis (sebelum satu tahun) sesuai ketentuan yang berlaku di Perusahaan.</p>
                <br>
                <h2 class="card-title">B. BEBERAPA KEWAJIBAN TENAGA KERJA</h2>
                <br>
                <p>1. Tenaga kerja wajib melaksanakan seluruh tugas dan kewajiban yang diberikan kepadanya oleh Perusahaan dengan baik dan bertanggung jawab.</p>
                <p>2. Tenaga kerja wajib berada/hadir ditempat tugasnya tepat pada waktu yang telah ditentukan.</p>
                <p>3. Tenaga kerja yang bermaksud datang terlambat ketempat kerjanya atau meninggalkan pekerjaannya lebih awal dari jam kerja biasanya, maka terlebih dahulu harus mendapatkan persetujuan dari Area Manager atau atasan langsung.</p>
                <p>4. Tenaga kerja yang tidak hadir karena sakit harus melapor kepada bagian Manager Operasional atau atasan langsung pada hari yang sama.</p>
                <p>5. Kehadiran/absensi tenaga kerja tidak dapat diwakilkan pada tenaga kerja lain dengan alasan apapun juga.</p>
                <p>6. Tenaga kerja wajib mematuhi/mengikuti petunjuk-petunjuk atau instruksi-instruksi yang diberikan oleh perusahaan dan/atau proyek.</p>
                <p>7. Tenaga kerja wajib menjaga serta memelihara dengan baik semua harta milik perusahaan (peralatan kebersihan dll) lebih-lebih bila mengetahui adanya hal-hal yang dapat menimbulkan bahaya atau kerugian bagi perusahaan.</p>
                <p>8. Tenaga kerja wajib memelihara dan memegang teguh rahasia terhadap siapapun mengenai sesuatu yang diketahuinya mengenai perusahaan.</p>
                <p>9. Tenaga kerja wajib melaporkan pada Pejabat Perusahaan yang berwenang apabila ada perubahan-perubahan mengenai status dirinya, susunan keluarganya, perubahan alamat/tempat tinggalnya.</p>
                <p>10. Tenaga kerja wajib memeriksa/memelihara semua alat-alat kerja, mesin-mesin dan sebagainya sebelum mulai bekerja atau akan meninggalkan pekerjaan.</p>
                <p>11. Tenaga kerja wajib mematuhi semua peraturan yang berlaku yang ditetapkan oleh perusahaan dan/atau proyek.</p>
                <br>
                <h2 class="card-title">C. PERBUATAN / TINDAKAN TERCELA TENAGA KERJA YANG MENGAKIBATKAN BERAKHIRNYA PERJANJIAN KERJA</h2>
                <br>
                <p>1. Melakukan dan/atau terlibat langsung maupun tidak langsung dalam suatu penipuan dan/atau pencurian dan/atau penggelapan barang dan/atau uang milik Perusahaan dan/atau Proyek.</p>
                <p>2. Memberikan keterangan palsu atau yang dipalsukan.</p>
                <p>3. Mabuk, minum-minuman keras yang memabukan, memakai dan/atau mengedarkan narkotika, psikotropika dan/atau zat adiktif lainnya dilingkungan kerja.</p>
                <p>4. Melakukan perbuatan asusila dan/atau perjudian ditempat kerja dan/atau dilingkungan milik perusahaan lainnya.</p>
                <p>5. Mengancam, mengintimidasi, menyerang, menganiaya, teman kerja dan/atau keluarga Pimpinan Perusahaan/Proyek dan/atau keluarga, pemilik Perusahaan/Proyek dan/atau keluarganya.</p>
                <p>6. Membujuk teman kerja atau Pimpinan Perusaan/Proyek atau Pemilik Perusahaan/Proyek untuk melakukan sesuatu yang bertentangan dengan peraturan perundang-undangan.</p>
                <p>7. Kecerobohan yang mengakibatkan barang milik Perusahaan/Proyek rusak atau membiarkan dalam keadaan bahaya barang milik Perusahaan/Proyek.</p>
                <p>8. Ceroboh atau membiarkan diri atau teman sekerja dalam keadaan bahaya.</p>
                <p>9. Tanpa alasan yang sah dan izin PIHAK PERTAMA memberikan keterangan-keterangan kepada pihak ketiga manapun baik perseorangan maupun Perusahaan mengenai hal-hal yang sepatutnya diketahui oleh PIHAK KEDUA bersifat rahasia, termasuk tentang Pimpinan Perusahaan/Proyek, pemilik Perusahaan/Proyek, segala sesuatu tentang tenaga kerja dan lain-lain yang bersifat rahasia, baik tentang usaha, operasi, informasi maupun data atau dokumen-dokumen, temuan-temuan, relasi-relasi, hubungan-hubungan usaha, keuangan.</p>
                <p>10. Melakukan perbuatan yang dapat menimbulkan pertentangan SARA (Suku, Agama, Ras dan Antar Golongan).</p>
                <p>11. Mencemarkan nama Perusahaan/Proyek, teman kerja, Pimpinan Perusahaan/Proyek, pemilik Perusahaan/Proyek termasuk keluarganya.</p>
                <p>12. Berkelahi dengan sesama teman kerja didalam lingkungan kerja maupun diluar lingkungan kerja.</p>
                <p>13. Menggelapkan uang milik Perusahaan, menerima uang pemberian dari pihak lain karena hasil kerja tenaga kerja</p>
                <p>14. Melakukan dan/atau terlibat dalam suatu tindakan pidana</p>
                <p>15. Tidak menunjukan perbaikan meskipun telah diberi peringatan terakhir.</p>
                <p>16. Terikat bekerja untuk kepentingan pihak lain, baik secara formal maupun informal, langsung maupun tidak langsung, perseorangan maupun perseroan.</p>
                <p>17. Mangkir bekerja jika tidak dapat melaksanakan pekerjaannya selama 3 (tiga) hari kerja berturut – turut atau 5 (lima) hari kerja tidak secara berturut-turut dalam kurun waktu 1 (satu) bulan tanpa keterangan (alpa).</p>
                <p>Disetujui :</p>
                <br>
                <div class="row">
                    <div class="col-md-6 mb-4 text-center">
                        <p>PIHAK PERTAMA</p>
                        <strong>{{ Auth::user()->pkwt?->company['company'] }}</strong>
                        <br>
                        <br>
                        <br>
                        <p>( <u>{{ Auth::user()->name }}</u> )</p>
                        <p>Human Resource Development</p>
                    </div>
                    <div class="col-md-6 mb-4 text-center">
                        <p>PIHAK KEDUA</p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p>( <u>{{ Auth::user()->pkwt?->user['name'] }}</u> )</p>
                        <p>Karyawan</p>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        </div><!-- /.page-inner -->
        <!-- .page-sidebar -->
        <div class="page-sidebar">
          <!-- .card -->
          <div class="card card-reflow">
            <div class="card-body">
              <h4 class="card-title"> Payments </h4>
              <div class="progress progress-sm rounded-0 mb-1">
                <div class="progress-bar bg-success w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <p class="text-muted text-weight-bolder small"> $2,322 of $3,076 </p>
            </div><!-- .card-body -->
            <div class="card-body border-top">
              <h4 class="card-title"> History </h4><!-- .timeline -->
              <ul class="timeline timeline-dashed-line">
                <!-- .timeline-item -->
                <li class="timeline-item">
                  <!-- .timeline-figure -->
                  <div class="timeline-figure">
                    <span class="tile tile-circle tile-xs bg-success"><i class="fa fa-check"></i></span>
                  </div><!-- /.timeline-figure -->
                  <!-- .timeline-body -->
                  <div class="timeline-body">
                    <h6 class="timeline-heading"> Invoice created </h6><span class="timeline-date">08/18/2018 – 12:42 PM</span>
                  </div><!-- /.timeline-body -->
                </li><!-- /.timeline-item -->
                <!-- .timeline-item -->
                <li class="timeline-item">
                  <!-- .timeline-figure -->
                  <div class="timeline-figure">
                    <span class="tile tile-circle tile-xs bg-success"><i class="fa fa-check"></i></span>
                  </div><!-- /.timeline-figure -->
                  <!-- .timeline-body -->
                  <div class="timeline-body">
                    <h6 class="timeline-heading"> Invoice sent <a href="#" class="text-muted"><small>details</small></a>
                    </h6><span class="timeline-date">08/18/2018 – 12:42 PM</span>
                  </div><!-- /.timeline-body -->
                </li><!-- /.timeline-item -->
                <!-- .timeline-item -->
                <li class="timeline-item">
                  <!-- .timeline-figure -->
                  <div class="timeline-figure">
                    <span class="tile tile-circle tile-xs bg-success"><i class="fa fa-check"></i></span>
                  </div><!-- /.timeline-figure -->
                  <!-- .timeline-body -->
                  <div class="timeline-body">
                    <h6 class="timeline-heading"> Invoice viewed </h6><span class="timeline-date">08/19/2018 – 09:11 AM</span>
                  </div><!-- /.timeline-body -->
                </li><!-- /.timeline-item -->
                <!-- .timeline-item -->
                <li class="timeline-item">
                  <!-- .timeline-figure -->
                  <div class="timeline-figure">
                    <span class="tile tile-circle tile-xs bg-success"><i class="fa fa-check"></i></span>
                  </div><!-- /.timeline-figure -->
                  <!-- .timeline-body -->
                  <div class="timeline-body">
                    <h6 class="timeline-heading"> Invoice partial paid <a href="#" class="text-muted"><small>details</small></a>
                    </h6><span class="timeline-date">08/19/2018 – 10:36 AM</span>
                  </div><!-- /.timeline-body -->
                </li><!-- /.timeline-item -->
                <!-- .timeline-item -->
                <li class="timeline-item">
                  <!-- .timeline-figure -->
                  <div class="timeline-figure">
                    <span class="tile tile-circle tile-xs bg-success"><i class="fa fa-check"></i></span>
                  </div><!-- /.timeline-figure -->
                  <!-- .timeline-body -->
                  <div class="timeline-body">
                    <h6 class="timeline-heading"> Invoice sent <a href="#" class="text-muted"><small>details</small></a>
                    </h6><span class="timeline-date">12/21/2018 – 12:42 PM</span>
                  </div><!-- /.timeline-body -->
                </li><!-- /.timeline-item -->
                <!-- .timeline-item -->
                <li class="timeline-item">
                  <!-- .timeline-figure -->
                  <div class="timeline-figure">
                    <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                  </div><!-- /.timeline-figure -->
                  <!-- .timeline-body -->
                  <div class="timeline-body">
                    <h6 class="timeline-heading"> Invoice viewed </h6>
                  </div><!-- /.timeline-body -->
                </li><!-- /.timeline-item -->
                <!-- .timeline-item -->
                <li class="timeline-item">
                  <!-- .timeline-figure -->
                  <div class="timeline-figure">
                    <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                  </div><!-- /.timeline-figure -->
                  <!-- .timeline-body -->
                  <div class="timeline-body">
                    <h6 class="timeline-heading"> Invoice fully paid </h6>
                  </div><!-- /.timeline-body -->
                </li><!-- /.timeline-item -->
              </ul><!-- /.timeline -->
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.page-sidebar -->
      </div><!-- /.page -->
    </div><!-- /.wrapper -->
  </main><!-- /.app-main -->
  @endif
@endsection