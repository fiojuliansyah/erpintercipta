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
                <div style="position: fixed; top: 20px; right: 20px; z-index: 1000; width: 300px;">
                    @foreach(['nickname', 'address', 'birth_place', 'birth_date', 'religion', 'person_status', 'mother_name', 'stay_in', 'family_address', 'gender', 'weight', 'height', 'hobby', 'bank_account', 'bank_name', 'family_number', 'avatar', 'card_ktp', 'card_ijazah', 'card_family'] as $field)
                        @error($field)
                            <div class="show-business-opened mb-4">
                                <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-red1-dark" role="alert">
                                    <span><i class="fas fa-exclamation-triangle"></i></span>
                                    <strong>{{ $message }}</strong>
                                    <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
                                </div>
                            </div>
                        @enderror
                    @endforeach
                </div>
                <h2>Data Personal</h2>
            </div>
            <div class="card header-card shape-rounded" data-card-height="150">
                <div class="card-overlay bg-highlight opacity-95"></div>
                <div class="card-overlay dark-mode-tint"></div>
            </div>
            <form id="register-profile" action="{{ url('profiles') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="content">
                    <div class="card card-style">
                        <div class="content mb-0">
                            <h3>Upload Pas Foto</h3>
                            <p>*jpg,jpeg,png</p>
                            <div class="file-data">
                                <input type="file" name="avatar" id="avatar"
                                    class="upload-file bg-highlight shadow-s rounded-s" accept="image/*" required>
                                <p class="upload-file-text color-white">Upload Image</p>
                                <img src="{{ $existingAvatar ? Storage::url($existingAvatar) : asset('mobile/images/empty.png') }}" class="img-fluid rounded-xs mt-4" id="avatarImage">                            </div>
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
                                <input type="name" name="nickname" value="{{ old('nickname', $user->profile['nickname'] ?? '') }}" placeholder="Isi disini!" required>
                            </div>
                            <br>
                            <span>Alamat</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="address" value="{{ old('address', $user->profile['address'] ?? '') }}" placeholder="Isi disini!" required>
                            </div>
                            <br>
                            <span>Tempat Lahir</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="birth_place" value="{{ old('birth_place', $user->profile['birth_place'] ?? '') }}" placeholder="Isi disini!" required>
                            </div>
                            <br>
                            <span>Tanggal Lahir</span>
                            <div class="input-style input-style-1 input-required">
                                <em><i class="fa fa-angle-down"></i></em>
                                <input type="date" name="birth_date" value="{{ old('birth_date', $user->profile['birth_date'] ?? '') }}" required>
                            </div>
                            <br>
                            <span>Agama</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="religion" value="{{ old('religion', $user->profile['religion'] ?? '') }}" placeholder="Isi disini!" required>
                            </div>
                            <br>
                            <span>Status</span>
                            <div class="input-style input-style-1 input-required">
                                <em><i class="fa fa-angle-down"></i></em>
                                <select name="person_status" required>
                                    <option value="default" disabled selected>Pilih status perkawinan</option>
                                    <option value="TK-0" {{ old('person_status', $user->profile['person_status'] ?? '') == 'TK-0' ? 'selected' : '' }}>TK-0 : Tidak Kawin (lajang/janda/duda)</option>
                                    <option value="TK-1" {{ old('person_status', $user->profile['person_status'] ?? '') == 'TK-1' ? 'selected' : '' }}>TK-1 : Duda/Janda (punya anak 1)</option>
                                    <option value="TK-2" {{ old('person_status', $user->profile['person_status'] ?? '') == 'TK-2' ? 'selected' : '' }}>TK-2 : Duda/Janda (punya anak 2)</option>
                                    <option value="TK-3" {{ old('person_status', $user->profile['person_status'] ?? '') == 'TK-3' ? 'selected' : '' }}>TK-3 : Duda/Janda (punya anak 3)</option>
                                    <option value="K-0" {{ old('person_status', $user->profile['person_status'] ?? '') == 'K-0' ? 'selected' : '' }}>K-0 : Kawin</option>
                                    <option value="K-1" {{ old('person_status', $user->profile['person_status'] ?? '') == 'K-1' ? 'selected' : '' }}>K-1 : Kawin (punya anak 1)</option>
                                    <option value="K-2" {{ old('person_status', $user->profile['person_status'] ?? '') == 'K-2' ? 'selected' : '' }}>K-2 : Kawin (punya anak 2)</option>
                                    <option value="K-3" {{ old('person_status', $user->profile['person_status'] ?? '') == 'K-3' ? 'selected' : '' }}>K-3 : Kawin (punya anak 3)</option>
                                </select>
                            </div>
                            <br>
                            <span>Nama Ibu Kandung</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="mother_name" value="{{ old('mother_name', $user->profile['mother_name'] ?? '') }}" placeholder="Isi disini!" required>
                            </div>
                            <br>
                            <span>Tinggal Bersama</span>
                            <div class="input-style input-style-1 input-required">
                                <em><i class="fa fa-angle-down"></i></em>
                                <select name="stay_in" required>
                                    <option value="default" disabled selected>Pilih tinggal bersama</option>
                                    <option value="Rumah Sendiri" {{ old('stay_in', $user->profile['stay_in'] ?? '') == 'Rumah Sendiri' ? 'selected' : '' }}>Rumah Sendiri</option>
                                    <option value="Orang Tua" {{ old('stay_in', $user->profile['stay_in'] ?? '') == 'Orang Tua' ? 'selected' : '' }}>Orang Tua</option>
                                    <option value="Saudara/Family" {{ old('stay_in', $user->profile['stay_in'] ?? '') == 'Saudara/Family' ? 'selected' : '' }}>Saudara/Family</option>
                                    <option value="KOS" {{ old('stay_in', $user->profile['stay_in'] ?? '') == 'KOS' ? 'selected' : '' }}>KOS</option>
                                </select>
                            </div>
                            <br>
                            <span>Nama Saudara/Family, KOS, Pemilik Rumah</span>
                            <div class="input-style input-style-1">
                                <em>(opsional)</em>
                                <input type="name" name="family_name" value="{{ old('family_name', $user->profile['family_name'] ?? '') }}" placeholder="Isi disini!">
                            </div>
                            <br>
                            <span>Alamat Sekarang</span>
                            <div class="input-style input-style-1">
                                <em>(opsional)</em>
                                <input type="name" name="family_address" value="{{ old('family_address', $user->profile['family_address'] ?? '') }}" placeholder="Isi disini!">
                            </div>
                            <br>
                            <span>Jenis Kelamin</span>
                            <div class="input-style input-style-1 input-required">
                                <em><i class="fa fa-angle-down"></i></em>
                                <select name="gender" required>
                                    <option value="default" disabled selected>Pilih jenis kelamin</option>
                                    <option value="Laki-laki" {{ old('gender', $user->profile['gender'] ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ old('gender', $user->profile['gender'] ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <br>
                            <span>Berat Badan</span>
                            <div class="input-style input-style-1 input-required">
                                <em>Kg (wajib)</em>
                                <input type="tel" name="weight" value="{{ old('weight', $user->profile['weight'] ?? '') }}" placeholder="Isi disini!" required>
                            </div>
                            <br>
                            <span>Tinggi Badan</span>
                            <div class="input-style input-style-1 input-required">
                                <em>Cm (wajib)</em>
                                <input type="tel" name="height" value="{{ old('height', $user->profile['height'] ?? '') }}" placeholder="Isi disini!" required>
                            </div>
                            <br>
                            <span>Hobi</span>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="hobby" value="{{ old('hobby', $user->profile['hobby'] ?? '') }}" placeholder="Isi disini!" required>
                            </div>
                            <br>
                            <span>Nomor Rekening</span>
                            <p class="mb-0" style="color: red">beri tanda (-) jika tidak mempunyai No Rekening</p>
                            <div class="input-style input-style-1 input-required">
                                <em>(wajib)</em>
                                <input type="name" name="bank_account" value="{{ old('bank_account', $user->profile['bank_account'] ?? '') }}" placeholder="Isi disini!" required>
                            </div>
                            <br>
                            <span>Nama Bank</span>
                            <div class="input-style input-style-1 input-required">
                                <em><i class="fa fa-angle-down"></i></em>
                                <select name="bank_name" required>
                                    <option value="default" disabled selected>Pilih BANK</option>
                                    <option value="" {{ old('bank_name', $user->profile['bank_name'] ?? '') == '-' ? 'selected' : '' }}>Tidak Memiliki BANK</option>
                                    <option value="BCA" {{ old('bank_name', $user->profile['bank_name'] ?? '') == 'BCA' ? 'selected' : '' }}>BCA</option>
                                    <option value="BRI" {{ old('bank_name', $user->profile['bank_name'] ?? '') == 'BRI' ? 'selected' : '' }}>BRI</option>
                                    <option value="MANDIRI" {{ old('bank_name', $user->profile['bank_name'] ?? '') == 'MANDIRI' ? 'selected' : '' }}>MANDIRI</option>
                                    <option value="CIMB NIAGA" {{ old('bank_name', $user->profile['bank_name'] ?? '') == 'CIMB NIAGA' ? 'selected' : '' }}>CIMB NIAGA</option>
                                    <option value="BNI" {{ old('bank_name', $user->profile['bank_name'] ?? '') == 'BNI' ? 'selected' : '' }}>BNI</option>
                                    <option value="DANAMON" {{ old('bank_name', $user->profile['bank_name'] ?? '') == 'DANAMON' ? 'selected' : '' }}>DANAMON</option>
                                    <option value="ARTHA GRAHA" {{ old('bank_name', $user->profile['bank_name'] ?? '') == 'ARTHA GRAHA' ? 'selected' : '' }}>ARTHA GRAHA</option>
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
                                <input type="name" name="reference" value="{{ old('reference', $user->profile['reference'] ?? '') }}" placeholder="Isi disini!">
                            </div>
                            <br>
                            <span>Pekerjaan Referensi</span>
                            <div class="input-style input-style-1">
                                <em>(opsional)</em>
                                <input type="name" name="reference_job" value="{{ old('reference_job', $user->profile['reference_job'] ?? '') }}" placeholder="Isi disini!">
                            </div>
                            <br>
                            <span>Alamat Referensi</span>
                            <div class="input-style input-style-1">
                                <em>(opsional)</em>
                                <input type="name" name="reference_address" value="{{ old('reference_address', $user->profile['reference_address'] ?? '') }}" placeholder="Isi disini!">
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="card card-style" data-card-height="150">
                    <div class="card-center">
                        <p class="pl-3 mt-n2 mb-0 opacity-60">Dengan mengisi Formulir diatas, saya menyatakan bahwa Pengrekrutan di Intercipta Corporation dengan tegas tidak dipungut Biaya Apapun</p>
                    </div>
                    <span class="badges bg-danger" style="text-align: center">Pernyataan</span>
                </a>
            </form>
        </div>
        <div class="col-12">
            <a href="#" data-menu="menu-confirm"
                class="btn btn-xl btn-full bg-highlight rounded-50 text-uppercase font-900 mb-0">Daftar</a>
        </div>
        <div id="menu-confirm" class="menu menu-box-modal rounded-m" data-menu-height="400" data-menu-width="330">
            <h1 class="text-center font-700 mt-3 pb-1">Apakah anda yakin?</h1>
            <p class="boxed-text-l">
                Isilah data diri Anda secara jujur, benar, dan lengkap. Saya menyatakan dengan sesungguhnya bahwa segala keterangan yang saya berikan dalam Formulir ini adalah benar adanya dan saya memahami jika saya memberikan keterangan yang tidak benar atau dipalsukan, maka saya bersedia mempertanggungjawabkannya di hadapan hukum.
            </p>
            <div class="row mr-3 ml-3 mb-0">
                <div class="col-6">
                    <a href="#"  data-toast="toast-1" onclick="event.preventDefault(); document.getElementById('register-profile').submit();"
                        class="close-menu btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-highlight">IYA</a>
                </div>
                <div class="col-6">
                    <a href="#"
                        class="close-menu btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-red1-dark">TIDAK</a>
                </div>
            </div>
        </div>
        <div id="toast-1" class="toast toast-tiny toast-top bg-yellow2-dark" data-delay="100000" data-autohide="true"><i class="fa fa-sync fa-spin mr-3"></i>Proses Input Data ...</div> 
    </div>

    <script type="text/javascript" src="{{ asset('') }}mobile/scripts/jquery.js"></script>
    <script type="text/javascript" src="{{ asset('') }}mobile/scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('') }}mobile/scripts/custom.js"></script>
    <script>
        function showToast(event) {
            event.preventDefault();
            document.getElementById('register-profile').submit();
    
            // Show the toast notification
            var toastId = event.target.getAttribute('data-toast');
            var toast = document.getElementById(toastId);
            if (toast) {
                toast.classList.add('show');
                setTimeout(function() {
                    toast.classList.remove('show');
                }, parseInt(toast.getAttribute('data-delay'), 10));
            }
        }
    </script>
</body>
