<!DOCTYPE html>
<html lang="en">

<head>
    <title>Upload Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
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
                                <h4 class="card-title">File Input</h4>
                            </div>
                            <div class="card-body">
                                <div id="success-message" class="alert alert-success" style="display:none;"></div>
                                <div id="error-message" class="alert alert-danger" style="display:none;"></div>
                                <div id="form-container" class="row">
                                    <!-- Dynamic content will be added here -->
                                </div>
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            function loadDataFromDatabase() {
                $.ajax({
                    url: '{{ route('upload.show') }}',
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
                                for: `file-${item.id_ref_berkas}`,
                                text: item.jenis_berkas
                            });

                            const fileForm = $('<form>', {
                                id: `upload-form-${item.id_ref_berkas}`,
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
                                name: `berkas[${item.id_ref_berkas}]`,
                                id: `berkas-${item.id_ref_berkas}`
                            });

                            const hiddenInput = $('<input>', {
                                type: 'hidden',
                                name: 'id_ref_berkas',
                                value: item.id_ref_berkas
                            });

                            const submitButton = $('<button>', {
                                type: 'submit',
                                class: 'btn btn-primary',
                                text: 'Upload'
                            });

                            fileUploadWrapper.append(fileInput).append(submitButton);
                            fileForm.append(fileUploadWrapper).append(hiddenInput);
                            mb3Div.append(label).append(fileForm);
                            colDiv.append(mb3Div);
                            formContainer.append(colDiv);

                            fileForm.on('submit', function(e) {
                                e.preventDefault();
                                // Validasi file
                                const fileInputElem = $(this).find('input[type="file"]')[0];
                                const file = fileInputElem.files[0];
                                const allowedTypes = ['image/jpeg', 'image/png', 'application/pdf']; // Ubah sesuai kebutuhan
                                const maxSize = 2 * 1024 * 1024; // 2MB

                                if (!file) {
                                    $('#error-message').text('Please select a file to upload.').show();
                                    return;
                                }

                                if (!allowedTypes.includes(file.type)) {
                                    $('#error-message').text('Invalid file type. Please upload a JPEG, PNG, or PDF file.').show();
                                    return;
                                }

                                if (file.size > maxSize) {
                                    $('#error-message').text('File size exceeds the maximum limit of 2MB.').show();
                                    return;
                                }
                                var formData = new FormData(this);
                                $.ajax({
                                    url: $(this).attr('action'),
                                    type: $(this).attr('method'),
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success: function(response) {
                                        $('#success-message').text('File uploaded successfully!').show();
                                    },
                                    error: function(xhr, status, error) {
                                        $('#error-message').text('Error uploading file!').show();
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

            loadDataFromDatabase();
        });
    </script>
</body>

</html>
