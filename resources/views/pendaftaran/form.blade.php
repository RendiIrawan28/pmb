<!DOCTYPE html>
<html lang="en">

@include('partials.header')

<head>
    <title>Data Diri Mahasiswa</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>


<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
        @include('partials.sidebar')
        <div id="main">
            @include('partials.topbar')

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Formulir Pendaftaran Mahasiswa Baru</h3>
                            <!--<p class="text-subtitle text-muted">
                                Ini adalah page input data diri calon Mahasiswsa.
                            </p>-->
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    {{-- <li class="breadcrumb-item">
                                        <a href="">Dashboard</a>
                                    </li> --}}
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Data Diri
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <section id="basic-vertical-layouts">

                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
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
                                                <label for="nisn">NISN(Nomor Induk Siswa Nasional)</label>
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
                                                <label for="nik">NIK</label>
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
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <div class="position-relative">
                                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin"
                                                        required>
                                                        <option disabled selected>Jenis Kelamin</option>
                                                        <option>Laki-Laki</option>
                                                        <option>Perempuan</option>
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
                                                    name="tanggal_lahir" placeholder="dd/mm/yyyy" required>
                                            </div>
                                        </div>

                                        <script>
                                            // Initialize datepicker on the input field
                                            $('#tanggal_lahir').datepicker({
                                                format: 'dd/mm/yyyy',
                                                autoclose: true
                                            });
                                        </script>

                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="agama">Agama</label>
                                                <div class="position-relative">
                                                    <select class="form-control" name="agama" id="agama" required>
                                                        <option disabled selected>Agama</option>
                                                        <option>Islam</option>
                                                        <option>Kristen</option>
                                                        <option>Hindu</option>
                                                        <option>Buddha</option>
                                                        <option>Konghucu</option>
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
                                                <label for="penghasilan_orang_tua">Penghasilan Orang Tua</label>
                                                <div class="position-relative">
                                                    <select class="form-control" name="penghasilan_orang_tua"
                                                        id="penghasilan_orang_tua">
                                                        <option disabled selected>Penghasilan Orang Tua</option>
                                                        <option>
                                                            < Rp. 500.000</option>
                                                        <option> Rp. 500.000 - Rp. 1.000.000</option>
                                                        <option> Rp. 1.000.000 - Rp. 2.000.000</option>
                                                        <option> > Rp. 2.000.000</option>
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
                                                <label for="program_studi">Program Studi yang diinginkan</label>
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
                                                <label for="sumber_informasi">Sumber Informasi</label>
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
                                                <label for="rencana_tempat_tinggal">Rencana Tempat Tinggal</label>
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
                                                <label for="email-id-icon">Pilihan Jalur Pendaftaran</label>
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

                var formData = $(this).serializeArray();

                // Konversi nilai dropdown menjadi integer
                formData.forEach(function(item) {
                    if (['id_program_studi', 'id_sumber_informasi', 'id_jalur_pendaftaran','id_rencana_tempat_tinggal'].includes(item.name)) {
                        item.value = parseInt(item.value);
                    }
                });

                var id = $('#id').val();
                var url = id ? '{{ route('pendaftaran.update', '') }}/' + id :
                    '{{ route('pendaftaran.store') }}';
                var method = id ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    type: method,
                    data: $.param(formData),
                    success: function(response) {
                        $('#messages').html('<div>Data berhasil disimpan!</div>');
                        $('#pendaftaranForm')[0].reset();
                        $('#id').val('');
                        loadDataFromDatabase();
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        var errorMsg = '<ul>';
                        $.each(errors, function(key, value) {
                            errorMsg += '<li>' + value + '</li>';
                        });
                        errorMsg += '</ul>';
                        $('#messages').html('<div>' + errorMsg + '</div>');
                    }
                });
            });
        });

        function loadDataFromDatabase() {
            $.ajax({
                url: '{{ route('pendaftaran.show') }}',
                type: 'GET',
                success: function(response) {

                // Kosongkan dropdown terlebih dahulu
                $('#id_program_studi').empty();
                $('#id_sumber_informasi').empty();
                $('#id_jalur_pendaftaran').empty();
                $('#id_rencana_tempat_tinggal').empty();

                    // Isi dropdown untuk program studi, sumber informasi, jalur pendaftaran, dan rencana tempat tinggal
                    response.data.program_studi.forEach(function(item) {
                        $('#id_program_studi').append(
                            `<option value="${item.id_program_studi}">${item.nama_program_studi}</option>`
                            );
                    });
                    response.data.sumber_informasi.forEach(function(item) {
                        $('#id_sumber_informasi').append(
                            `<option value="${item.id_sumber_informasi}">${item.nama_sumber_informasi}</option>`
                            );
                    });
                    response.data.jalur_pendaftaran.forEach(function(item) {
                        $('#id_jalur_pendaftaran').append(
                            `<option value="${item.id_jalur_pendaftaran}">${item.nama_jalur_pendaftaran}</option>`
                            );
                    });
                    response.data.rencana_tempat_tinggal.forEach(function(item) {
                        $('#id_rencana_tempat_tinggal').append(
                            `<option value="${item.id_rencana_tempat_tinggal}">${item.nama_rencana_tempat_tinggal}</option>`
                            );
                    });

                    // Isi form jika ada data pendaftaran
                    if (response.pendaftaran.length > 0) {
                        var pendaftaran = response.pendaftaran[0];
                        $('#id').val(pendaftaran.id);
                        $('#nama_lengkap').val(pendaftaran.nama_lengkap);
                        $('#nisn').val(pendaftaran.nisn);
                        $('#nik').val(pendaftaran.nik);
                        $('#jenis_kelamin').val(pendaftaran.jenis_kelamin);
                        $('#tempat_lahir').val(pendaftaran.tempat_lahir);
                        $('#tanggal_lahir').val(pendaftaran.tanggal_lahir.split('-').reverse().join(
                        '/')); // Mengubah format tanggal
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
                    }
                },
                error: function(xhr) {
                    // Handle error jika ada
                    console.log('Error:', xhr.responseText);
                }
            });
        }
    </script>

</body>


</html>
