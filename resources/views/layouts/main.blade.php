<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Klaims Manager</title>
        <link rel="stylesheet" href="../resources/css/bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>      
    </head>

    <body>
        <div id="container-fluid">
            <div class="container">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            @extends('layouts.sidebar')
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
