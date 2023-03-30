<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link rel="icon" type="image/x-icon" href="">
    <title>@yield('title')</title>
</head>

<body class="bg-slate-100 antialiased">
    <div class="bg-secondary py-1.5 duration-200 ease-in-out"></div>
    <header class="flex justify-between px-8 py-5 bg-primary items-center sticky top-0 left-0 right-0 duration-200 ease-in-out shadow-lg">
        <a href="https://wavakesamben.com/">
            <img src="../logo-putih.png" alt="image logo" class="cursor-pointer w-24"/>
        </a>
        <a href="/"><span class="font-semibold text-gray-100 hover:text-gray-300">Karir Wava Husada Kesamben</span></a>
    </header>
    <section class="p-5">
        @yield('content')
    </section>
    <footer class="py-5 px-5 bg-level3">
        <h5 class="font-semibold text-sm text-center text-gray-100 text">© Karir Wava Husada Kesamben {{date('Y')}}</h5>
    </footer>
</body>

</html>
