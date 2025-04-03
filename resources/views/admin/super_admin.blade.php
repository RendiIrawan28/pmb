<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Super Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('partials.header')
</head>

<body>
    <div id="app">
        @include('partials.sidebar')
        <div id="main">
            @include('partials.topbar')
            <section id="input-file-browser">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Super Admin</h4>
                            </div>
                            <section class="section">
                                <div class="card-body">
                                    <div id="messages" class="alert alert-success" style="display:none;"></div>
                                    <div id="error-message" class="alert alert-danger" style="display:none;"></div>
                                    <form id="inputadmin">
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="company-column">Nama</label>
                                                <input type="text" id="name" class="form-control" name="name"
                                                    placeholder="Masukan Nama" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="company-column">Email</label>
                                            <input type="text" id="email" class="form-control" name="email"
                                                placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company-column">Password</label>
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company-column">Password</label>
                                            <input id="password_confirmation" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="Confirm Pass" />
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" id="success"
                                                class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </section>
                            <section>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="admin">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Data akan dimuat di sini -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function loadDataFromDatabase() {
                $.ajax({
                    url: '{{ route('s_admin.admin') }}',
                    type: 'GET',
                    success: function(response) {
                        var tbody = $('#admin tbody');
                        tbody.empty(); // Kosongkan isi tabel sebelum menambahkan baris baru

                        $.each(response.data_admin, function(key, item) {
                            var status = item.id_role == 2 ? 'Admin' :
                                'Unknown'; // Menentukan status berdasarkan id_role

                            var rows = '<tr>';
                            rows += '<td>' + item.name + '</td>';
                            rows += '<td>' + item.email + '</td>';
                            rows += '<td>' + status +
                                '</td>'; // Menggunakan status yang ditentukan
                            rows += '<td><button class="btn btn-danger delete-btn" data-id="' +
                                item.id + '">Hapus</button></td>';
                            rows += '</tr>';

                            tbody.append(rows);
                        });
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                    }
                });
            }

            $('#inputadmin').on('submit', function(event) {
                event.preventDefault();

                var formData = $(this).serialize();
                var id = $('#id').val();

                $.ajax({
                    url: '{{ route('s_admin.store') }}',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#messages').text('File uploaded successfully!').show();
                        $('#inputadmin')[0].reset();
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
                        $('#messages').html('<div class="alert alert-danger">' + errorMsg +
                            '</div>');
                    }
                });
            });

            // Delete button handler
            $(document).on('click', '.delete-btn', function() {
                var id = $(this).data('id');
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    $.ajax({
                        url: '{{ route('s_admin.destroy', '') }}/' + id,
                        type: 'DELETE',
                        success: function(response) {
                            loadDataFromDatabase();
                            $('#messages').text('Data berhasil Dihapus').show();
                            $('#alumniTable')[0].reset();
                        },
                        error: function(xhr) {
                            console.log('Error:', xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
