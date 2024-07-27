<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="base-url" content="{{ env('APP_URL') }}" />
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('') }}build/assets/app-C0ezr7qL.css">
    <link rel="manifest" href="{{ asset('') }}build/manifest.json" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>

    @if (\Session::has('error'))
        <div class="p-3 text-center bg-red-500 text-white flex items-center gap-3 justify-center">
            <svg stroke="white" fill="white" stroke-width="0" viewBox="0 0 24 24" height="20px" width="20px"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13 17.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-.25-8.25a.75.75 0 0 0-1.5 0v4.5a.75.75 0 0 0 1.5 0v-4.5Z">
                </path>
                <path
                    d="M9.836 3.244c.963-1.665 3.365-1.665 4.328 0l8.967 15.504c.963 1.667-.24 3.752-2.165 3.752H3.034c-1.926 0-3.128-2.085-2.165-3.752Zm3.03.751a1.002 1.002 0 0 0-1.732 0L2.168 19.499A1.002 1.002 0 0 0 3.034 21h17.932a1.002 1.002 0 0 0 .866-1.5L12.866 3.994Z">
                </path>
            </svg>
            <p>{{ \Session::get('error') }}</p>
        </div>
    @endif

    @if (\Session::has('success'))
        <div class="p-3 text-center bg-green-500 text-white flex items-center gap-3 justify-center">
            <svg stroke="white" fill="white" stroke-width="0" viewBox="0 0 24 24" height="24px" width="24px"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M17.28 9.28a.75.75 0 0 0-1.06-1.06l-5.97 5.97-2.47-2.47a.75.75 0 0 0-1.06 1.06l3 3a.75.75 0 0 0 1.06 0l6.5-6.5Z">
                </path>
                <path
                    d="M12 1c6.075 0 11 4.925 11 11s-4.925 11-11 11S1 18.075 1 12 5.925 1 12 1ZM2.5 12a9.5 9.5 0 0 0 9.5 9.5 9.5 9.5 0 0 0 9.5-9.5A9.5 9.5 0 0 0 12 2.5 9.5 9.5 0 0 0 2.5 12Z">
                </path>
            </svg>
            <p>{{ \Session::get('success') }}</p>
        </div>
    @endif

    @yield('content')

    <script src="{{ asset('') }}build/assets/app-C1-XIpUa.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
        integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous">
    </script>
    <script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('javascript')

</body>

</html>
