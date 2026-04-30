<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style type="text/tailwindcss">
        /* Fix Global untuk Scroll Samping */
        @layer base {

            html,
            body {
                @apply max-w-full overflow-x-hidden;
            }
        }

        @layer utilities {

            /* Animasi Naik Turun Anda */
            @keyframes up-down {

                0%,
                100% {
                    transform: translateY(0px);
                    animation-timing-function: ease-out;
                }

                50% {
                    transform: translateY(-50px);
                    animation-timing-function: ease-in;
                }
            }

            .animate-up-down {
                animation: up-down 8s infinite;
            }

            .animation-delay-3000 {
                animation-delay: 3s;
            }
        }
    </style>

</head>

<body class="bg-white text-gray-900">

    @include('theme.layout.navbar')

    @include('theme.layout.navbarmobile')

    <main>
        @yield('content')
    </main>

    @include('theme.layout.footer')


    {{-- PERBAIKAN: Tambahkan Plugin Intersect sebelum Alpine Core --}}
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>

</html>
