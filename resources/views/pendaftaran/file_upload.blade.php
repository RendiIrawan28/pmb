<!DOCTYPE html>
<html lang="en">

<title>Upload Data</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('partials.header')

<body>
    <script src="assets/static/js/initTheme.js"></script>
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
                                <form id="upload-form" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="ijazah" class="form-label">Ijazah/SKL</label>
                                                <input class="form-control" type="file" name="ijazah" id="ijazah">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="nilai_raport" class="form-label">Nilai Raport Semester 5</label>
                                                <input class="form-control" type="file" name="nilai_raport" id="nilai_raport">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="bukti_santri" class="form-label">Bukti Santri</label>
                                                <input class="form-control" type="file" name="bukti_santri" id="bukti_santri">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="sertifikat_hapalan" class="form-label">Sertifikat Hapalan</label>
                                                <input class="form-control" type="file" name="sertifikat_hapalan" id="sertifikat_hapalan">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="surat_keterangan" class="form-label">Surat Keterangan Tidak Mampu</label>
                                                <input class="form-control" type="file" name="surat_keterangan" id="surat_keterangan">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </form>
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
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#upload-form').submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: '{{ route('upload.store') }}',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            $('#success-message').text(response.success).show();
                            $('#error-message').hide();
                        } else {
                            $('#error-message').text(response.error).show();
                            $('#success-message').hide();
                        }
                    },
                    error: function(response) {
                        $('#error-message').text(response.responseJSON.message).show();
                        $('#success-message').hide();
                    }
                });
            });
        });
    </script>
</body>

</html>
