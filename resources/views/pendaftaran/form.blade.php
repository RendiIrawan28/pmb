<!DOCTYPE html>
<html lang="en">

@include('partials.header')

<head>
    <title>Data Diri Mahasiswa</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
    <div id="app">
        @include('partials.sidebar')
        <div id="main">
            @include('partials.topbar')
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Formulir Pendaftaran Mahasiswa Baru</h3>
                        </div>
                    </div>
                </div>
            </div>

            <section id="basic-vertical-layouts">

                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div id="success-message" class="alert alert-success" style="display:none;"></div>
                            <form id="pendaftaranForm">
                                @csrf
                                <input type="hidden" name="id" id="id">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>Input Data Diri</h4>
                                            <br>
                                            <div class="form-group has-icon-left">
                                                <label for="nama_lengkap">Nama Lengkap Sesuai Ijazah</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="nama_lengkap"
                                                        placeholder="Nama Lengkap Seusai Ijazah" id="nama_lengkap"
                                                        required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="nisn">NISN (Nomor Induk Siswa Nasional)</label>
                                                <div class="position-relative">
                                                    <input type="number" class="form-control" name="nisn"
                                                        placeholder="NISN" id="nisn" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-info-square"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="nik">NIK (Nomor Induk Kewarganegaraan)</label>
                                                <div class="position-relative">
                                                    <input type="number" class="form-control" name="nik"
                                                        placeholder="NIK" id="nik" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-info-square"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="id_jenis_kelamin">Jenis Kelamin</label>
                                                <div class="position-relative">
                                                    <select class="form-control" name="id_jenis_kelamin"
                                                        id="id_jenis_kelamin" required>
                                                        <option disabled selected>Jenis Kelamin</option>
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-info-square"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="tempat_lahir"
                                                        placeholder="Tempat Lahir" id="tempat_lahir" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-info-square"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Include Bootstrap CSS -->
                                        <link rel="stylesheet"
                                            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

                                        <!-- Include Bootstrap Datepicker CSS -->
                                        <link rel="stylesheet"
                                            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

                                        <div class="form-group" id="simple-date2">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                </div>
                                                <input type="text" class="form-control" id="tanggal_lahir"
                                                    name="tanggal_lahir" placeholder="Tanggal" required>
                                            </div>
                                        </div>

                                        <!-- Include jQuery and Bootstrap JS -->
                                        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Use full version of jQuery -->
                                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
                                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                                        <!-- Include Bootstrap Datepicker JS -->
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

                                        <script>
                                            // Initialize Datepicker
                                            $('#tanggal_lahir').datepicker({
                                                format: 'dd/mm/yyyy', // Format tanggal
                                                todayHighlight: true,
                                                autoclose: true
                                            });

                                            // Set default value to today's date
                                            const today = new Date();
                                            const dd = String(today.getDate()).padStart(2, '0'); // Day with leading zero
                                            const mm = String(today.getMonth() + 1).padStart(2, '0'); // Month with leading zero
                                            const yy = today.getFullYear().toString();
                                            const defaultDate = dd + '/' + mm + '/' + yy;
                                            $('#tanggal_lahir').val(defaultDate);
                                        </script>


                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="id_agama">Agama</label>
                                                <div class="position-relative">
                                                    <select class="form-control" name="id_agama" id="id_agama"
                                                        required>
                                                        <option disabled selected>Agama</option>
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-info-square"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="domisili">Domisili</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="domisili"
                                                        placeholder="Domisili" id="domisili" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-house-door"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="no_wa">Nomor Whatsapp Aktif</label>
                                                <div class="position-relative">
                                                    <input type="number" class="form-control" name="no_wa"
                                                        placeholder="Nomor Whatsapp Aktif" id="no_wa" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-chat-dots"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="nama_orang_tua">Nama Orang Tua</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="nama_orang_tua"
                                                        placeholder="Nama Orang Tua" id="nama_orang_tua">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="no_wa_ortu">Nomor Whatsapp Orang Tua</label>
                                                <div class="position-relative">
                                                    <input type="number" class="form-control" name="no_wa_ortu"
                                                        placeholder="Nomor Whatsapp Orang Tua" id="no_wa_ortu">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-chat-dots"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="id_penghasilan_orang_tua">Penghasilan Orang Tua</label>
                                                <div class="position-relative">
                                                    <select class="form-control" name="id_penghasilan_orang_tua"
                                                        id="id_penghasilan_orang_tua">
                                                        <option disabled selected>Penghasilan Orang Tua</option>
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-info-square"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="asal_sekolah">Asal Sekolah</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="asal_sekolah"
                                                        placeholder="Asal Sekolah" id="asal_sekolah">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-info-square"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="id_program_studi">Program Studi yang diinginkan</label>
                                                <div class="position-relative">
                                                    <select class="form-control" name="id_program_studi"
                                                        id="id_program_studi">
                                                        <option disabled selected>Program Studi</option>
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-info-square"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="id_sumber_informasi">Sumber Informasi</label>
                                                <div class="position-relative">
                                                    <select class="form-control" name="id_sumber_informasi"
                                                        id="id_sumber_informasi">
                                                        <option disabled selected>Sumber Informasi</option>
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-info-square"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="id_rencana_tempat_tinggal">Rencana Tempat Tinggal</label>
                                                <div class="position-relative">
                                                    <select class="form-control" name="id_rencana_tempat_tinggal"
                                                        id="id_rencana_tempat_tinggal" value="">
                                                        <option disabled selected>Rencana Tempat Tinggal
                                                        </option>

                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-info-square"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="id_jalur_pendaftaran">Pilihan Jalur Pendaftaran</label>
                                                <ol>
                                                    <li>Jalur beasiswa santri & tahfidz ditujukan untuk penghafal
                                                        Al-Qur'an minimal 1 juz dibuktikan dengan syahadah atau
                                                        bukti
                                                        mukim / ijazah santri / kartu tanda santri.</li>
                                                    <li>Jalur beasiswa kurang mampu berprestasi ditujukan untuk
                                                        calon
                                                        mahasiswa bukan santri dan memiliki prestasi dibuktikan
                                                        dengan
                                                        sertifikat.</li>
                                                    <li>Jalur beasiswa KIP (Kartu Indonesia Pintar) ditujukan untuk
                                                        calon mahasiswa yang memilki kartu indonesia pintar. </li>
                                                </ol>

                                                <div class="position-relative">
                                                    <select class="form-control" name="id_jalur_pendaftaran"
                                                        id="id_jalur_pendaftaran" value="">
                                                        <option disabled selected>Jalur Pendaftaran</option>
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-info-square"></i>
                                                    </div>
                                                </div>
                                                <div id="statusPendaftaran" class="position-relative">
                                                    <h3>Status Registrasi</h3>
                                                    <ol id="statusList">
                                                        <li id="status1">Lolos tahap dokumen</li>
                                                        <li id="status2">Lolos tahap ujian hafalan</li>
                                                        <li id="status3">Lolos tahap ujian tulis</li>
                                                        <li id="status4">Lolos tahap ujian wawancara</li>
                                                        <li id="status5">Daftar Ulang</li>
                                                        <li id="status6">Selamat Mahasiswa Baru</li>
                                                    </ol>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Simpan</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @include('partials.script')
    @include('partials.footer')


    <script>
        $(document).ready(function() {
            loadDataFromDatabase();

            $('#pendaftaranForm').on('submit', function(event) {
                event.preventDefault();

                var formData = new FormData(this); // Menggunakan FormData untuk form dengan file upload

                formData.forEach(function(value, key) {
                    if (['id_jenis_kelamin', 'id_agama', 'id_program_studi', 'id_sumber_informasi',
                            'id_jalur_pendaftaran',
                            'id_rencana_tempat_tinggal', 'id_penghasilan_orang_tua'
                        ].includes(key)) {
                        formData.set(key, parseInt(value)); // Pastikan nilai numerik dikonversi
                    }
                });

                var id = $('#id').val();
                var url = id ? '{{ route('pendaftaran.update', ':id') }}'.replace(':id', id) :
                    '{{ route('pendaftaran.store') }}';
                var method = id ? 'POST' : 'POST';

                if (id) {
                    formData.append('_method', 'PUT');
                }

                $.ajax({
                    url: url,
                    type: method,
                    data: formData,
                    contentType: false, // Menonaktifkan pengaturan default
                    processData: false, // Menonaktifkan pengaturan default
                    success: function(response) {
                        $('#success-message').text('File uploaded successfully!').show();
                        $('#pendaftaranForm')[0].reset();
                        $('#id').val('');
                        $('#pendaftaran_id').val(response
                            .id); // Set pendaftaran_id untuk form upload gambar
                        updateStatus(response.status);
                        loadDataFromDatabase();
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        var errorMsg = '<ul>';
                        $.each(errors, function(key, value) {
                            errorMsg += '<li>' + value + '</li>';
                        });
                        errorMsg += '</ul>';
                        $('#messages').html('<div class="alert alert-danger">' + errorMsg +
                            '</div>');
                    }
                });
            });

            function loadDataFromDatabase() {
                $.ajax({
                    url: '{{ route('pendaftaran.show') }}',
                    type: 'GET',
                    success: function(response) {
                        // Kosongkan dropdown terlebih dahulu
                        $('#id_jenis_kelamin, #id_agama, #id_penghasilan_orang_tua, #id_program_studi, #id_sumber_informasi, #id_jalur_pendaftaran, #id_rencana_tempat_tinggal')
                            .empty();

                        // Isi dropdown untuk program studi, sumber informasi, jalur pendaftaran, dan rencana tempat tinggal
                        populateDropdown(response.data.jenis_kelamin, '#id_jenis_kelamin',
                            'jenis_kelamin', 'id_jenis_kelamin');
                        populateDropdown(response.data.agama, '#id_agama', 'nama_agama', 'id_agama');
                        populateDropdown(response.data.penghasilan_orang_tua,
                            '#id_penghasilan_orang_tua', 'penghasilan_orang_tua',
                            'id_penghasilan_orang_tua');
                        populateDropdown(response.data.program_studi, '#id_program_studi',
                            'nama_program_studi', 'id_program_studi');
                        populateDropdown(response.data.sumber_informasi, '#id_sumber_informasi',
                            'nama_sumber_informasi', 'id_sumber_informasi');
                        populateDropdown(response.data.jalur_pendaftaran, '#id_jalur_pendaftaran',
                            'nama_jalur_pendaftaran', 'id_jalur_pendaftaran');
                        populateDropdown(response.data.rencana_tempat_tinggal,
                            '#id_rencana_tempat_tinggal', 'nama_rencana_tempat_tinggal',
                            'id_rencana_tempat_tinggal');

                        // Isi form jika ada data pendaftaran
                        if (response.pendaftaran.length > 0) {
                            var pendaftaran = response.pendaftaran[
                                0]; // Mengambil data pertama jika ada
                            $('#id').val(pendaftaran.id);
                            $('#nama_lengkap').val(pendaftaran.nama_lengkap);
                            $('#nisn').val(pendaftaran.nisn);
                            $('#nik').val(pendaftaran.nik);
                            $('#jenis_kelamin').val(pendaftaran.jenis_kelamin);
                            $('#tempat_lahir').val(pendaftaran.tempat_lahir);
                            $('#tanggal_lahir').val(pendaftaran.tanggal_lahir.split('-').reverse().join('/')); // Mengubah format tanggal
                            $('#agama').val(pendaftaran.agama);
                            $('#domisili').val(pendaftaran.domisili);
                            $('#no_wa').val(pendaftaran.no_wa);
                            $('#nama_orang_tua').val(pendaftaran.nama_orang_tua);
                            $('#no_wa_ortu').val(pendaftaran.no_wa_ortu);
                            $('#penghasilan_orang_tua').val(pendaftaran.penghasilan_orang_tua);
                            $('#asal_sekolah').val(pendaftaran.asal_sekolah);
                            $('#id_program_studi').val(pendaftaran.id_program_studi);
                            $('#id_sumber_informasi').val(pendaftaran.id_sumber_informasi);
                            $('#id_jalur_pendaftaran').val(pendaftaran.id_jalur_pendaftaran);
                            $('#id_rencana_tempat_tinggal').val(pendaftaran.id_rencana_tempat_tinggal);
                            updateStatus(pendaftaran.status);
                        }
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                    }
                });
            }

            function populateDropdown(data, selector, textKey, valueKey) {
                if (Array.isArray(data)) {
                    data.forEach(function(item) {
                        $(selector).append(`<option value="${item[valueKey]}">${item[textKey]}</option>`);
                    });
                } else {
                    console.error(`Data untuk ${selector} tidak berbentuk array atau undefined.`);
                }
            }

            function updateStatus(status) {
                $('#statusList li').removeClass('active');
                if (status >= 1) $('#status1').addClass('active');
                if (status >= 2) $('#status2').addClass('active');
                if (status >= 3) $('#status3').addClass('active');
                if (status >= 4) $('#status4').addClass('active');
                if (status >= 5) $('#status5').addClass('active');
                if (status >= 6) $('#status6').addClass('active');
            }
        });
    </script>


</body>


</html>
