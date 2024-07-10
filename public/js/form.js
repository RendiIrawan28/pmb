$(document).ready(function() {
    // Fetch data on page load
    fetchData();

    // CSRF token setup for AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Fetch data function
    function fetchData() {
        $.ajax({
            url: '/pendaftaran',
            type: 'GET',
            success: function(response) {
                var rows = '';
                response.forEach(function(data) {
                    rows += '<tr>';
                    rows += '<td>' + data.id + '</td>';
                    rows += '<td>' + data.nama_lengkap + '</td>';
                    rows += '<td>' + data.nisn + '</td>';
                    rows += '<td>' + data.nik + '</td>';
                    rows += '<td>' + data.jenis_kelamin + '</td>';
                    rows += '<td>' + data.tempat_lahir + '</td>';
                    rows += '<td>' + data.tanggal_lahir + '</td>';
                    rows += '<td>' + data.agama + '</td>';
                    rows += '<td>' + data.domisili + '</td>';
                    rows += '<td>' + data.no_wa + '</td>';
                    rows += '<td>' + data.nama_orang_tua + '</td>';
                    rows += '<td>' + data.no_wa_ortu + '</td>';
                    rows += '<td>' + data.penghasilan_orang_tua + '</td>';
                    rows += '<td>' + data.asal_sekolah + '</td>';
                    rows += '<td>' + data.program_studi + '</td>';
                    rows += '<td>' + data.sumber_informasi + '</td>';
                    rows += '<td>' + data.rencana_tempat_tinggal + '</td>';
                    rows += '<td>' + data.jalur_pendaftaran + '</td>';
                    rows += '<td><button class="edit-btn" data-id="' + data.id + '">Edit</button></td>';
                    rows += '</tr>';
                });
                $('#pendaftaranTable tbody').html(rows);
            }
        });
    }

    // Form submit handler
    $('#pendaftaranForm').on('submit', function(event) {
        event.preventDefault();

        var formData = $(this).serialize();
        var id = $('#id').val();

        $.ajax({
            url: id ? '/pendaftaran/' + id : '/pendaftaran',
            type: id ? 'PUT' : 'POST',
            data: formData,
            success: function(response) {
                $('#messages').html('<div>Data berhasil disimpan!</div>');
                $('#pendaftaranForm')[0].reset();
                $('#id').val('');
                fetchData();
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

    // Edit button handler
    $(document).on('click', '.edit-btn', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '/pendaftaran/' + id,
            type: 'GET',
            success: function(response) {
                $('#id').val(response.id);
                $('#nama_lengkap').val(response.nama_lengkap);
                $('#nisn').val(response.nisn);
                $('#nik').val(response.nik);
                $('#jenis_kelamin').val(response.jenis_kelamin);
                $('#tempat_lahir').val(response.tempat_lahir);
                $('#tanggal_lahir').val(response.tanggal_lahir);
                $('#agama').val(response.agama);
                $('#domisili').val(response.domisili);
                $('#no_wa').val(response.no_wa);
                $('#nama_orang_tua').val(response.nama_orang_tua);
                $('#no_wa_ortu').val(response.no_wa_ortu);
                $('#penghasilan_orang_tua').val(response.penghasilan_orang_tua);
                $('#asal_sekolah').val(response.asal_sekolah);
                $('#program_studi').val(response.program_studi);
                $('#sumber_informasi').val(response.sumber_informasi);
                $('#rencana_tempat_tinggal').val(response.rencana_tempat_tinggal);
                $('#jalur_pendaftaran').val(response.jalur_pendaftaran);
            }
        });
    });
});
