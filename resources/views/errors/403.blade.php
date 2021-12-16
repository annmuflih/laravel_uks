<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>404 Custom Error Page Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>

<body>
    <div class="container" style="padding-top: 100px" id="container-wrapper">
        <div class="text-center">
            <img src="{{asset('template/img/logo/error.svg')}}" style="max-height: 100px;" class="mb-3">
            <h3 class="text-gray-800 font-weight-bold">Oopss!</h3>
            <p class="lead text-gray-800 mx-auto">403 Forbidden</p>
            <a href="/home">&larr; Back to UKS Dashboard</a>
        </div>
    </div>
</body>

</html>
