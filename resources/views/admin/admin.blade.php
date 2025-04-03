<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('partials.header')
</head>

<body>
    <div id="app">
        @include('partials.sidebar')
        <div id="main">
            @include('partials.topbar')
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Mahasiswa</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="datamahasiswa">
                            <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>Hasil Upload</th>
                                    <th>Berkas</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- data mahasiswa --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.script')
    @include('partials.footer')
    <script>
        $(document).ready(function() {

            loadDataFromDatabase();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Load data dari database
            function loadDataFromDatabase() {
                $.ajax({
                    url: '{{ route('admin.pedaftaran') }}',
                    type: 'GET',
                    success: function(response) {
                        $.each(response.pendaftaran, function(key, item) {
                            var rows = '<tr>';
                            rows += '<td>' + item.nama_lengkap + '</td>';
                            rows += '<td colspan="5"><div class="table-buttons">';
                            rows += '<button class="btn btn-info hasilUpload" data-id="' + item
                                .id + '">Show</button>';
                            rows += '<button class="btn btn-info berkas" data-id="' + item
                                .user_id + '">Show</button>';
                            rows += '<button class="btn btn-info buktipembayaran" data-id="' +
                                item.user_id + '">Show</button>';
                            rows += '<select class="btn btn-info status" data-id="' + item.id +
                                '">Show</select>';
                            rows += '<button class="btn btn-info keterangan" data-id="' + item
                                .id + '">Show</button>';
                            rows += '</div></td>';
                            rows += '</tr>';
                            $('#datamahasiswa tbody').append(rows);
                        });
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                    }
                });
            }
            //hasilUpload button
            $(document).on('click', '.hasilUpload', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '{{ route('admin.index', '') }}/' + id,
                    type: 'GET',
                    success: function(response) {
                        var pendaftaran = response.pendaftaran;
                        var data = response.data;

                        $('#hasilUpload').modal('show');

                        // Isi data ke modal
                        $('#modal-nama-lengkap').text(pendaftaran.nama_lengkap);
                        $('#modal-nisn').text(pendaftaran.nisn);
                        $('#modal-nik').text(pendaftaran.nik);
                        $('#modal-jenis-kelamin').text(getNamaById(data.jenis_kelamin, pendaftaran.id_jenis_kelamin,'id_jenis_kelamin', 'jenis_kelamin'));
                        $('#modal-tempat-lahir').text(pendaftaran.tempat_lahir);
                        $('#modal-tanggal-lahir').text(pendaftaran.tanggal_lahir.split('-').reverse().join('-'));
                        $('#modal-agama').text(getNamaById(data.agama, pendaftaran.id_agama,'id_agama','nama_agama'));
                        $('#modal-domisili').text(pendaftaran.domisili);
                        $('#modal-no-wa').text(pendaftaran.no_wa);
                        $('#modal-nama-ortu').text(pendaftaran.nama_orang_tua);
                        $('#modal-no-wa-ortu').text(pendaftaran.no_wa_ortu);
                        $('#modal-penghasilan-ortu').text(getNamaById(data.penghasilan_orang_tua, pendaftaran.id_penghasilan_orang_tua, 'id_penghasilan_orang_tua', 'penghasilan_orang_tua'));
                        $('#modal-asal-sekolah').text(pendaftaran.asal_sekolah);
                        $('#modal-program-studi').text(getNamaById(data.program_studi,pendaftaran.id_program_studi, 'id_program_studi', 'nama_program_studi'));
                        $('#modal-sumber-informasi').text(getNamaById(data.sumber_informasi,pendaftaran.id_sumber_informasi,'id_sumber_informasi', 'nama_sumber_informasi'));
                        $('#modal-jalur-pendaftaran').text(getNamaById(data.jalur_pendaftaran,pendaftaran.id_jalur_pendaftaran,'id_jalur_pendaftaran', 'nama_jalur_pendaftaran'));
                        $('#modal-tempat-tinggal').text(getNamaById(data.rencana_tempat_tinggal,pendaftaran.id_rencana_tempat_tinggal,'id_rencana_tempat_tinggal','nama_rencana_tempat_tinggal'));
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                    }
                });

                // Fungsi untuk mendapatkan nama berdasarkan ID
                function getNamaById(array, id, keyId, field) {
                    var item = array.find(function(el) {
                        return el[keyId] === id;
                    });
                    return item ? item[field] : 'Tidak Ditemukan';
                }
            });
            //berkas button
            $(document).on('click', '.berkas', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '{{ route('admin.image', '') }}/' + id,
                    type: 'GET',
                    success: function(response) {
                        var berkas = response.berkas;
                        var jenisBerkas = response.data.jenis_berkas;
                        $('#berkas').modal('show');

                        // Clear the image container before loading new content
                        $('#image-container').empty();

                        // Check if any images are returned
                        if (berkas.length > 0) {
                            berkas.forEach(function(item) {
                                var jenis = jenisBerkas.find(function(jenisItem) {
                                    return jenisItem.id_ref_berkas === item
                                        .id_ref_berkas;
                                });

                                var jenisBerkasName = jenis ? jenis.jenis_berkas :
                                    'Jenis tidak diketahui';
                                var img = $('<img />', {
                                    src: '/storage/' + item.path,
                                    alt: 'Gambar Mahasiswa',
                                    style: 'max-width: 100%; margin-bottom: 10px;'
                                });

                                // Create an element for the jenis berkas name
                                var jenisLabel = $('<p />', {
                                    text: 'Jenis Berkas: ' + jenisBerkasName
                                });

                                // Append each image to the container
                                $('#image-container').append(jenisLabel).append(img);
                            });
                        } else {
                            // If no images found, show message
                            $('#image-container').html(
                                '<p>Tidak ada berkas gambar yang ditemukan.</p>');
                        }
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan saat memuat berkas.');
                    }
                });
            });
            //bukti pembayarn button
            $(document).on('click', '.buktipembayaran', function() {
                var id = $(this).data('id');
                $.ajax({
                    // url: '{{ route('admin.index', '') }}/' + id,
                    // type: 'GET',
                    success: function(response) {
                        $('#buktipembayaran').modal('show');

                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                    }
                });
            });
            //keterangan button
            $(document).on('click', '.keterangan', function() {
                var id = $(this).data('id');
                $.ajax({
                    // url: '{{ route('admin.index', '') }}/' + id,
                    // type: 'GET',
                    success: function(response) {
                        $('#keterangan').modal('show');

                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                    }
                });
            });
        });
    </script>

    @include('modal.Modal_H_Upload')
    @include('modal.Modal_Berkas')
    @include('modal.Modal_B_Pembayaran')
    @include('modal.Modal_Keterangan')

</body>

</html>
