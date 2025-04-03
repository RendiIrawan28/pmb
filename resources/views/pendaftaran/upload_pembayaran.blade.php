<!DOCTYPE html>
<html lang="en">

<head>
    <title>Upload Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="assets/extensions/sweetalert2/sweetalert2.min.css" />
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
                                <h4 class="card-title">File Input Pembayaran</h4>
                            </div>
                            <div class="card-body">
                                <div id="success-message" class="alert alert-success" style="display:none;"></div>
                                <div id="error-message" class="alert alert-danger" style="display:none;"></div>
                                <div id="form-container" class="row">
                                    <!-- Dynamic content will be added here -->
                                </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @include('partials.script')
    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://malsup.github.io/jquery.form.js"></script>
    <script src="assets/extensions/sweetalert2/sweetalert2.min.js"></script>>
    <script src="assets/static/js/pages/sweetalert2.js"></script>>
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
                    url: '{{ route('bukti.show') }}',
                    type: 'GET',
                    success: function(response) {
                        const data = response.data;
                        const formContainer = $('#form-container');

                        formContainer.empty();

                        data.forEach(item => {
                            const colDiv = $('<div>', {
                                class: 'col-md-12'
                            });

                            const mb3Div = $('<div>', {
                                class: 'mb-1'
                            });

                            const label = $('<label>', {
                                class: 'form-label',
                                for: `file-${item.id_ref_berkas_pembayaran}`,
                                text: item.jenis_berkas_pembayaran
                            });

                            const fileForm = $('<form>', {
                                id: `upload-form-${item.id_ref_berkas_pembayaran}`,
                                method: 'POST',
                                action: '{{ route('upload.store') }}',
                                enctype: 'multipart/form-data',
                                class: 'file-upload-form'
                            });

                            const fileUploadWrapper = $('<div>', {
                                class: 'file-upload-wrapper'
                            });

                            const fileInput = $('<input>', {
                                class: 'form-control',
                                type: 'file',
                                name: `berkas[${item.id_ref_berkas_pembayaran}]`,
                                id: `berkas-${item.id_ref_berkas_pembayaran}`
                            });

                            const hiddenInput = $('<input>', {
                                type: 'hidden',
                                name: 'id_ref_berkas',
                                value: item.id_ref_berkas_pembayaran
                            });

                            const submitButton = $('<button>', {
                                type: 'submit',
                                class: 'btn btn-primary',
                                text: 'Upload',
                                id: 'success'
                            });

                            const viewButton = $('<button>', {
                                type: 'button',
                                class: 'btn btn-secondary berkas',
                                text: 'Lihat Berkas',
                                'data-id': item.id_ref_berkas_pembayaran,
                                style: 'margin-left: 10px;'
                            });

                            fileUploadWrapper.append(fileInput).append(submitButton).append(viewButton);
                            fileForm.append(fileUploadWrapper).append(hiddenInput);
                            mb3Div.append(label).append(fileForm);
                            colDiv.append(mb3Div);
                            formContainer.append(colDiv);

                            fileForm.on('submit', function(e) {
                                e.preventDefault();

                                const fileInputElem = $(this).find(
                                    'input[type="file"]')[0];
                                const file = fileInputElem.files[0];
                                const allowedTypes = ['image/jpeg', 'image/png',
                                    'application/pdf'
                                ];
                                const maxSize = 2 * 1024 * 1024; // 2MB

                                if (!file) {
                                    $('#error-message').text(
                                        'Please select a file to upload.').show();
                                    return;
                                }

                                if (!allowedTypes.includes(file.type)) {
                                    $('#error-message').text(
                                        'Invalid file type. Please upload a JPEG, PNG, or PDF file.'
                                        ).show();
                                    return;
                                }

                                if (file.size > maxSize) {
                                    $('#error-message').text(
                                        'File size exceeds the maximum limit of 2MB.'
                                        ).show();
                                    return;
                                }

                                const formData = new FormData(this);
                                $.ajax({
                                    url: $(this).attr('action'),
                                    type: $(this).attr('method'),
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success: function(response) {
                                        if (response.success) {
                                            alert(response
                                            .success); // Display success message
                                        }
                                        if (response.errors) {
                                            alert(response.errors.join(
                                                "\n")); // Show any error messages
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        // Handle response where the file has already been uploaded
                                        const response = JSON.parse(xhr
                                            .responseText);
                                        if (response.error) {
                                            alert(response.error);
                                        } else {
                                            alert('Error uploading file!');
                                        }
                                    }
                                });
                            });
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ', status, error);
                    }
                });
            }

            // Button to open berkas modal
            $(document).on('click', '.berkas', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '{{ route('upload.showdata', '') }}/' + id,
                    type: 'GET',
                    success: function(response) {
                        var berkas = response.berkas;
                        var jenisBerkas = response.data.jenis_berkas;
                        $('#berkas').modal('show');

                        // Clear the image container before loading new content
                        $('#image-container').empty();

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

                                var jenisLabel = $('<p />', {
                                    text: 'Jenis Berkas: ' + jenisBerkasName
                                });

                                $('#image-container').append(jenisLabel).append(img);
                            });
                        } else {
                            $('#image-container').html(
                                '<p>Tidak ada berkas gambar yang ditemukan.</p>');
                        }
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan saat memuat berkas.');
                    }
                });
            });
        });
    </script>
    
    @include('modal.Modal_Berkas')
</body>

</html>
