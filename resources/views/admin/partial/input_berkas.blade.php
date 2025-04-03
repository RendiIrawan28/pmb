<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('partials.header')
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
                            <h3>Input Data Berkas</h3>
                        </div>
                    </div>
                </div>
            </div>

            <section id="basic-vertical-layouts">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    
</body>
</html>