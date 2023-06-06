<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Aster News</title>

        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">

        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>
    <body class="bg-bgPrimary">
        <!-- Sidebar -->
        <x-side-bar></x-side-bar>

        <!-- Header -->
        <x-header></x-header>

        <!-- Main -->
        <main class="px-4 lg:ml-[16.25rem]">
            <div class="mt-4 flex flex-col xl:flex-row relative">
                <!-- Left -->
                <div class="w-full xl:w-3/4 xl:px-8">
                    @yield('content')
                </div>

                <!-- Right -->
                <div class="w-full xl:w-1/4 xl:px-4 h-fit xl:sticky top-10 mb-10">
                    <x-right></x-right>
                </div>
            </div>
        </main>

        {{-- Footer --}}
        <x-footer></x-footer>

        @stack('js')
    </body>
</html>
