<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Register Profile</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}mobile/styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}mobile/styles/style.css">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}mobile/fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="{{ asset('') }}_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('') }}mobile/app/icons/icon.png">
</head>

<body class="theme-light" data-highlight="yellow2">

    <div id="page">

        <!-- header and footer bar go here-->
        <div class="page-content">

            <div class="page-title page-title-small">
                <h2>Data Personal</h2>
            </div>
            <div class="card header-card shape-rounded" data-card-height="150">
                <div class="card-overlay bg-highlight opacity-95"></div>
                <div class="card-overlay dark-mode-tint"></div>
            </div>

            <a href="#" id="formLink" data-menu="instant-1" class="card card-style" data-card-height="150">
                <div class="card-center">
                    <h1 class="color-white pl-3">Identintas Diri</h1>
                    <p class="color-white pl-3 mt-n2 mb-0 opacity-60">Isi data diri anda dengan benar</p>
                </div>
                <div class="card-center" id="iconContainer">
                    <i id="icon" class="fa fa-user color-white font-24 float-right opacity-50 pr-3"></i>
                </div>
                <div class="card-overlay bg-dark opacity-90"></div>
            </a>

            <a href="#" data-menu="instant-2" class="card card-style" data-card-height="150">
                <div class="card-center">
                    <h1 class="color-white pl-3">Upload Dokumen</h1>
                    <p class="color-white pl-3 mt-n2 mb-0 opacity-60">Upload Dokumen</p>
                </div>
                <div class="card-center">
                    <i class="fa fa-file color-white font-24 float-right opacity-50 pr-3"></i>
                </div>
                <div class="card-overlay bg-dark opacity-90"></div>
            </a>

            <a href="#" data-menu="instant-3" class="card card-style" data-card-height="150">
                <div class="card-center">
                    <h1 class="color-white pl-3">Riwayat Pekerjaan</h1>
                    <p class="color-white pl-3 mt-n2 mb-0 opacity-60">Isi riwayat pekerjaan anda</p>
                </div>
                <div class="card-center">
                    <i class="fa fa-briefcase color-white font-24 float-right opacity-50 pr-3"></i>
                </div>
                <div class="card-overlay bg-dark opacity-90"></div>
            </a>

            <div class="col-12">
                <a href="#" data-menu="menu-confirm"
                    class="btn btn-xl btn-full bg-highlight rounded-50 text-uppercase font-900 mb-0">Daftar</a>
            </div>
        </div>

        <div id="menu-confirm" class="menu menu-box-modal rounded-m" data-menu-height="400" data-menu-width="330">
            <h1 class="text-center font-700 mt-3 pb-1">Apakah anda yakin?</h1>
            <p class="boxed-text-l">
                Isilah data diri Anda secara jujur, benar, dan lengkap. Saya menyatakan dengan sesungguhnya bahwa segala keterangan yang saya berikan dalam Formulir ini adalah benar adanya dan saya memahami jika saya memberikan keterangan yang tidak benar atau dipalsukan, maka saya bersedia mempertanggungjawabkannya di hadapan hukum.
            </p>
            <div class="row mr-3 ml-3 mb-0">
                <div class="col-6">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('register-profile').submit();"
                        class="close-menu btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-highlight">IYA</a>
                </div>
                <div class="col-6">
                    <a href="#"
                        class="close-menu btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-red1-dark">TIDAK</a>
                </div>
            </div>
        </div>

        <form id="register-profile" action="{{ url('profiles') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="instant-1" class="menu menu-box-right" data-menu-width="100%" data-menu-effect="menu-over">
                <div class="page-title page-title-small">
                    <h2><a href="#" class="close-menu"><i class="fa fa-arrow-left"></i></a></h2>
                </div>
                <div class="card header-card shape-rounded" data-card-height="90">
                    <div class="card-overlay bg-highlight opacity-95"></div>
                    <div class="card-overlay dark-mode-tint"></div>
                    <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg">
                    </div>
                </div>

                <div class="content">
                    <div class="card card-style">
                        <div class="content mb-0">
                            <h3>Upload Pas Foto</h3>
                            <p>*jpg,jpeg,png</p>
                            <div class="file-data">
                                <input type="file" name="avatar" id="avatar"
                                    class="upload-file bg-highlight shadow-s rounded-s " accept="image/*" required>
                                <p class="upload-file-text color-white">Upload Image</p>
                                <img src="{{ asset('') }}mobile/images/empty.png" id="avatarImage">
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="card card-style">
                        <div class="content mb-0">
                            <span>Nama Lengkap</span>
                            <div class="input-style has-icon input-style-1 input-required">
                                <i class="input-icon fa fa-user"></i>
                                <em>(wajib)</em>
                                <input type="name" value="{{ Auth::user()->name }}" disabled>
                            </div>
                            <br>
                            <span>Nama Panggilan</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="nickname" placeholder="Isi disini!" required>
                            </div>
                            <br>
                            <span>Alamat</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="address" placeholder="Isi disini!" required>
                            </div>
                            <br>
                            <span>Tempat Lahir</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="birth_place" placeholder="Isi disini!" required>
                            </div>
                            <br>
                            <span>Tanggal Lahir</span>
                            <div class="input-style input-style-1 input-required">
                                <em><i class="fa fa-angle-down"></i></em>
                                <input type="date" name="birth_date" required>
                            </div>
                            <br>
                            <span>Agama</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="religion" placeholder="Isi disini!" required>
                            </div>
                            <br>
                            <span>Status</span>
                            <div class="input-style input-style-1 input-required">
                                <em><i class="fa fa-angle-down"></i></em>
                                <select name="person_status" required>
                                    <option value="default" disabled selected>Pilih status perkawinan</option>
                                    <option value="TK-0"> TK-0 : Tidak Kawin (lajang/janda/duda) </option>
                                    <option value="TK-1"> TK-1 : Duda/Janda (punya anak 1) </option>
                                    <option value="TK-2"> TK-2 : Duda/Janda (punya anak 2) </option>
                                    <option value="TK-3"> TK-3 : Duda/Janda (punya anak 3) </option>
                                    <option value="K-0"> K-0 : Kawin </option>
                                    <option value="K-1"> K-1 : Kawin (punya anak 1) </option>
                                    <option value="K-2"> K-2 : Kawin (punya anak 2) </option>
                                    <option value="K-3"> K-3 : Kawin (punya anak 3) </option>
                                </select>
                            </div>
                            <br>
                            <span>Nama Ibu Kandung</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="mother_name" placeholder="Isi disini!" required>
                            </div>
                            <br>
                            <span>Tinggal Bersama</span>
                            <div class="input-style input-style-1 input-required">
                                <em><i class="fa fa-angle-down"></i></em>
                                <select name="stay_in" required>
                                    <option value="default" disabled selected>Pilih tinggal bersama</option>
                                    <option value="Rumah Sendiri"> Rumah Sendiri </option>
                                    <option value="Orang Tua"> Orang Tua </option>
                                    <option value="Saudara/Family"> Saudara/Family </option>
                                    <option value="KOS"> KOS </option>
                                </select>
                            </div>
                            <br>
                            <span>Nama Saudara/Family, KOS, Pemilik Rumah</span>
                            <div class="input-style input-style-1">
                                <em>(opsional)</em>
                                <input type="name" name="family_name" placeholder="Isi disini!">
                            </div>
                            <br>
                            <span>Alamat Saudara/Family, KOS, Pemilik Rumah</span>
                            <div class="input-style input-style-1">
                                <em>(opsional)</em>
                                <input type="name" name="family_address" placeholder="Isi disini!">
                            </div>
                            <br>
                            <span>Jenis Kelamin</span>
                            <div class="input-style input-style-1 input-required">
                                <em><i class="fa fa-angle-down"></i></em>
                                <select name="gender" required>
                                    <option value="default" disabled selected>Pilih jenis kelamin</option>
                                    <option value="Laki-laki"> Laki-Laki </option>
                                    <option value="Perempuan"> Perempuan </option>
                                </select>
                            </div>
                            <br>
                            <span>Berat Badan</span>
                            <div class="input-style input-style-1 input-required">
                                <em>Kg (wajib)</em>
                                <input type="name" name="weight" placeholder="Isi disini!" required>
                            </div>
                            <br>
                            <span>Tinggi Badan</span>
                            <div class="input-style input-style-1 input-required">
                                <em>Cm (wajib)</em>
                                <input type="name" name="height" placeholder="Isi disini!" required>
                            </div>
                            <br>
                            <span>Hobi</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="hobby" placeholder="Isi disini!" required>
                            </div>
                            <br>
                            <span>Nomor Rekening</span>
                            <p class="mb-0" style="color: red">beri tanda (-) jika tidak mempunyai No Rekening</p>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="bank_account" placeholder="Isi disini!" required>
                            </div>
                            <br>
                            <span>Nama Bank</span>
                            <div class="input-style input-style-1 input-required">
                                <em><i class="fa fa-angle-down"></i></em>
                                <select name="gender" required>
                                    <option value="default" disabled selected>Pilih BANK</option>
                                    <option value=""> Tidak Memiliki BANK </option>
                                    <option value="BCA"> BCA </option>
                                    <option value="BRI"> BRI </option>
                                    <option value="MANDIRI"> MANDIRI </option>
                                    <option value="CIMB NIAGA"> CIMB NIAGA </option>
                                    <option value="BNI"> BNI </option>
                                    <option value="DANAMON"> DANAMON </option>
                                    <option value="ARTHA GRAHA"> ARTHA GRAHA </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card card-style">
                        <div class="content mb-0">
                            <p>Informasi Referensi</p>
                            <span>Nama Referensi</span>
                            <div class="input-style input-style-1">
                                <em>(opsional)</em>
                                <input type="name" name="reference" placeholder="Isi disini!">
                            </div>
                            <br>
                            <span>Pekerjaan Referensi</span>
                            <div class="input-style input-style-1">
                                <em>(opsional)</em>
                                <input type="name" name="reference_job" placeholder="Isi disini!">
                            </div>
                            <br>
                            <span>Alamat Referensi</span>
                            <div class="input-style input-style-1">
                                <em>(opsional)</em>
                                <input type="name" name="reference_address" placeholder="Isi disini!">
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#"
                    class="close-menu btn btn-xl btn-full bg-highlight rounded-0 text-uppercase font-900 mb-0">Tutup
                    Data Diri</a>
            </div>
            <div id="instant-2" class="menu menu-box-right" data-menu-width="100%" data-menu-effect="menu-over">

                <div class="page-title page-title-small">
                    <h2><a href="#" class="close-menu"><i class="fa fa-arrow-left"></i></a></h2>
                </div>
                <div class="card header-card shape-rounded" data-card-height="90">
                    <div class="card-overlay bg-highlight opacity-95"></div>
                    <div class="card-overlay dark-mode-tint"></div>
                    <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg">
                    </div>
                </div>

                <div class="content">
                    <div class="card card-style">
                        <p style="color: red; text-align: center; margin-top: 30px;">Dokumen Wajib</p>
                        <div class="card card-style">
                            <div class="content mb-0">
                                <h3>Upload KTP</h3>
                                <p>*jpg,jpeg,png</p>
                                <div class="file-data">
                                    <input type="file" name="card_ktp" id="card_ktp"
                                        class="upload-file bg-highlight shadow-s rounded-s" accept="image/*" required>
                                    <p class="upload-file-text color-white">Upload KTP</p>
                                    <img src="{{ asset('') }}mobile/images/empty.png" id="ktpImage">
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="card card-style">
                            <div class="content mb-0">
                                <h3>Upload Ijazah</h3>
                                <p>*jpg,jpeg,png</p>
                                <div class="file-data">
                                    <input type="file" name="card_ijazah" id="card_ijazah"
                                        class="upload-file bg-highlight shadow-s rounded-s" accept="image/*" required>
                                    <p class="upload-file-text color-white">Upload Ijazah</p>
                                    <img src="{{ asset('') }}mobile/images/empty.png" id="ijazahImage">
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="card card-style">
                            <div class="content mb-0">
                                <h3>Upload Kartu Keluarga</h3>
                                <p>*jpg,jpeg,png</p>
                                <div class="file-data">
                                    <input type="file" name="card_family" id="card_family"
                                        class="upload-file bg-highlight shadow-s rounded-s" accept="image/*" required>
                                    <p class="upload-file-text color-white">Upload Kartu Keluarga</p>
                                    <img src="{{ asset('') }}mobile/images/empty.png" id="familyImage">
                                </div>
                                <span>No Kartu Keluarga</span>
                                <div class="input-style input-style-1 input-required">
                                    <em>(wajib)</em>
                                    <input type="tlp" name="family_number" placeholder="Isi disini!" required>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="card card-style">
                        <p style="color: gold; text-align: center; margin-top: 30px;">Dokumen Opsional</p>
                        <div class="card card-style">
                            <div class="content mb-0">
                                <h3>Upload SKCK</h3>
                                <p>*jpg,jpeg,png</p>
                                <div class="file-data">
                                    <input type="file" name="card_skck" id="card_skck"
                                        class="upload-file bg-highlight shadow-s rounded-s" accept="image/*">
                                    <p class="upload-file-text color-white">Upload SKCK</p>
                                    <img src="{{ asset('') }}mobile/images/empty.png" id="skckImage">
                                </div>
                                <span>Masa Aktif SKCK</span>
                                <div class="input-style input-style-1">
                                    <em>(wajib)</em>
                                    <input type="date" name="active_date">
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="card card-style">
                            <div class="content mb-0">
                                <h3>Upload NPWP</h3>
                                <p>*jpg,jpeg,png</p>
                                <div class="file-data">
                                    <input type="file" name="card_npwp" id="card_npwp"
                                        class="upload-file bg-highlight shadow-s rounded-s" accept="image/*">
                                    <p class="upload-file-text color-white">Upload NPWP</p>
                                    <img src="{{ asset('') }}mobile/images/empty.png" id="npwpImage">
                                </div>
                                <span>No NPWP</span>
                                <div class="input-style input-style-1">
                                    <em>(wajib)</em>
                                    <input type="tlp" name="npwp_number" placeholder="Isi disini!">
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="card card-style">
                            <div class="content mb-0">
                                <h3>Upload SIM</h3>
                                <p>*jpg,jpeg,png</p>
                                <div class="file-data">
                                    <input type="file" name="card_sim" id="card_sim"
                                        class="upload-file bg-highlight shadow-s rounded-s" accept="image/*">
                                    <p class="upload-file-text color-white">Upload SIM</p>
                                    <img src="{{ asset('') }}mobile/images/empty.png" id="simImage">
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="card card-style">
                            <div class="content mb-0">
                                <h3>Upload Sertifikat</h3>
                                <p>*jpg,jpeg,png</p>
                                <div class="file-data">
                                    <input type="file" name="card_certificate" id="card_certificate"
                                        class="upload-file bg-highlight shadow-s rounded-s" accept="image/*">
                                    <p class="upload-file-text color-white">Upload Sertifikat</p>
                                    <img src="{{ asset('') }}mobile/images/empty.png" id="certificateImage">
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="card card-style">
                        <p style="color: blue; text-align: center; margin-top: 30px;">Dokumen Tambahan</p>
                        <div class="card card-style">
                            <div class="content mb-0">
                                <h3>Upload Dokumen</h3>
                                <p>*jpg,jpeg,png</p>
                                <div class="file-data">
                                    <input type="file" name="add_document_a" id="add_document_a"
                                        class="upload-file bg-highlight shadow-s rounded-s" accept="image/*">
                                    <p class="upload-file-text color-white">Upload Dokumen</p>
                                    <img src="{{ asset('') }}mobile/images/empty.png" id="documentaImage">
                                </div>
                                <span>Nama Dokumen</span>
                                <div class="input-style input-style-1">
                                    <em>(wajib)</em>
                                    <input type="name" name="add_name_document_a">
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="card card-style">
                            <div class="content mb-0">
                                <h3>Upload Dokumen</h3>
                                <p>*jpg,jpeg,png</p>
                                <div class="file-data">
                                    <input type="file" name="add_document_b" id="add_document_b"
                                        class="upload-file bg-highlight shadow-s rounded-s" accept="image/*">
                                    <p class="upload-file-text color-white">Upload Dokumen</p>
                                    <img src="{{ asset('') }}mobile/images/empty.png" id="documentbImage">
                                </div>
                                <span>Nama Dokumen</span>
                                <div class="input-style input-style-1">
                                    <em>(wajib)</em>
                                    <input type="name" name="add_name_document_b">
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="card card-style">
                            <div class="content mb-0">
                                <h3>Upload Dokumen</h3>
                                <p>*jpg,jpeg,png</p>
                                <div class="file-data">
                                    <input type="file" name="add_document_c" id="add_document_c"
                                        class="upload-file bg-highlight shadow-s rounded-s" accept="image/*">
                                    <p class="upload-file-text color-white">Upload Dokumen</p>
                                    <img src="{{ asset('') }}mobile/images/empty.png" id="documentcImage">
                                </div>
                                <span>Nama Dokumen</span>
                                <div class="input-style input-style-1">
                                    <em>(wajib)</em>
                                    <input type="name" name="add_name_document_c">
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#"
                    class="close-menu btn btn-xl btn-full bg-highlight rounded-0 text-uppercase font-900 mb-0">Tutup
                    Upload Dokumen</a>
            </div>
            <div id="instant-3" class="menu menu-box-right" data-menu-width="100%" data-menu-effect="menu-over">
                <div class="page-title page-title-small">
                    <h2><a href="#" class="close-menu"><i class="fa fa-arrow-left"></i></a></h2>
                </div>
                <div class="card header-card shape-rounded" data-card-height="90">
                    <div class="card-overlay bg-highlight opacity-95"></div>
                    <div class="card-overlay dark-mode-tint"></div>
                    <div class="card-bg preload-img" data-src="{{ asset('') }}mobile/images/pictures/20s.jpg">
                    </div>
                </div>

                <div class="content">
                    <div class="card card-style">
                        <div class="content mb-0">
                            <span>Nama Perusahaan</span>
                            <div class="input-style has-icon input-style-1 input-required">
                                <i class="input-icon fa fa-user"></i>
                                <em>(wajib)</em>
                                <input type="name" name="company_name_a" placeholder="Isi disini!">
                            </div>
                            <br>
                            <span>Periode</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="period_a" placeholder="Isi disini!">
                            </div>
                            <br>
                            <span>Jabatan</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="position_a" placeholder="Isi disini!">
                            </div>
                            <br>
                            <span>Gaji</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="salary_a" placeholder="Isi disini!">
                            </div>
                        </div>
                    </div>
                    <div class="card card-style">
                        <div class="content mb-0">
                            <span>Nama Perusahaan</span>
                            <div class="input-style has-icon input-style-1 input-required">
                                <i class="input-icon fa fa-user"></i>
                                <em>(wajib)</em>
                                <input type="name" name="company_name_b" placeholder="Isi disini!">
                            </div>
                            <br>
                            <span>Periode</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="period_b" placeholder="Isi disini!">
                            </div>
                            <br>
                            <span>Jabatan</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="position_b" placeholder="Isi disini!">
                            </div>
                            <br>
                            <span>Gaji</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="salary_b" placeholder="Isi disini!">
                            </div>
                        </div>
                    </div>
                    <div class="card card-style">
                        <div class="content mb-0">
                            <span>Nama Perusahaan</span>
                            <div class="input-style has-icon input-style-1 input-required">
                                <i class="input-icon fa fa-user"></i>
                                <em>(wajib)</em>
                                <input type="name" name="company_name_c" placeholder="Isi disini!">
                            </div>
                            <br>
                            <span>Periode</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="period_c" placeholder="Isi disini!">
                            </div>
                            <br>
                            <span>Jabatan</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="position_c" placeholder="Isi disini!">
                            </div>
                            <br>
                            <span>Gaji</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="salary_c" placeholder="Isi disini!">
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#"
                    class="close-menu btn btn-xl btn-full bg-highlight rounded-0 text-uppercase font-900 mb-0">Tutup
                    Riwayat</a>
            </div>
        </form>

    </div>


    <script type="text/javascript" src="{{ asset('') }}mobile/scripts/jquery.js"></script>
    <script type="text/javascript" src="{{ asset('') }}mobile/scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('') }}mobile/scripts/custom.js"></script>
</body>
