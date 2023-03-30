<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <title>@yield('title')</title>
</head>

<body class="bg-slate-100 antialiased">
    <div class="flex gap-2">
        <section class="bg-primary w-1/5 rounded-xl shadow-lg px-10 pt-5 pb-20 m-3">
            <a href="/carrier_4Dm1N_P4n3L">
                <div class="flex justify-items-center">
                    <img src="../logo-putih.png" alt="image logo" class="cursor-pointer w-24 " />
                </div>
            </a>
            <div class="my-5 flex gap-2 items-center">
                <i class="fa-solid fa-circle-user"></i>
                <span class="font-semibold text-gray-800">Admin</span>
            </div>
            <ul class="list-menu">
                <li
                    class="item-menu 
                    @if (session('page') == 'dashboard') item-menu-active @endif
                    ">
                    <a href="/carrier_4Dm1N_P4n3L/dashboard" class="flex gap-2 items-center"><i
                            class="fa fa-chart-line"></i><span>Dashboard</span></a></li>
                <li
                    class="item-menu
                @if (session('page') == 'loker') item-menu-active @endif
                ">
                    <a href="/carrier_4Dm1N_P4n3L/carrier" class="flex gap-2 items-center"><i
                            class="fa fa-briefcase"></i><span>Carrier</span></a></li>
                <li
                    class="item-menu
                @if (session('page') == 'pelamar') item-menu-active @endif
                ">
                    <a href="/carrier_4Dm1N_P4n3L/pelamar" class="flex gap-2 items-center"><i class="fa fa-handshake"></i><span>Data
                            Pelamar</span></a></li>
                <hr class="my-3" />
                <li class="item-menu"><a href="/carrier_4Dm1N_P4n3L/logout" class="flex gap-2 items-center"><i
                            class="fa fa-power-off"></i><span>Logout</span></a></li>
            </ul>
        </section>
        <section class="rounded-xl shadow-lg m-3 p-5 col-span-4 w-4/5">
            <div class="h-screen">
                <h3 class="text-3xl font-bold">@yield('title')</h3>
                <hr class="mb-5 mt-2" />
                @yield('content')
            </div>
            <footer class="py-5 px-5 bg-level2 rounded-xl mt-10">
                <h5 class="font-semibold text-sm text-center text-gray-100 text">© Carrier Wava Husada Kesamben
                    {{ date('Y') }}</h5>
            </footer>
        </section>
    </div>
</body>

</html>
