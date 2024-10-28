<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Styles / Scripts -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-white text-black/50 dark:text-white/50">
        <div
            class="relative min-h-screen flex flex-col items-center justify-start selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">


                    <div class="flex lg:justify-start ">
                        <div class="logotype" style="display: flex; align-items:center;">
                            <div class="logo"
                                style="width: 50px;height: 50px; background-color:black; border-radius:50%;"></div>
                            <div class="nameCompany" style="color: black;">
                                Тестовая компания
                            </div>
                        </div>
                    </div>
                    <div></div>
                    @auth
                        <div style="color: black; display:flex; align-items:center; justify-content:end; gap:5%;">
                            {{ Auth::user()->name }}

                            <form method="POST"
                            action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit">Выйти</button>

                            </form>


                        </div>
                    @else
                        <div style="color: black; display:flex; align-items:center; justify-content:end; gap:5%;"><button
                                type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModalAuth">Войти</button>
                        </div>



                    @endauth


                </header>

                <main class="mt-6" style="background: rgb(44, 3, 3);"
                    class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">

                    <div id="map"></div>

                    <script>
                        var map = L.map('map').setView([55.7558, 37.6176], 10);

                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);

                        @foreach ($properties as $property)
                            @if (is_array($property->coordinates) && isset($property->coordinates['latitude'], $property->coordinates['longitude']))
                                var cardContent = `{!! addslashes(view('components.card', compact('property'))->render()) !!}`;

                                L.marker(
                                        [{{ $property->coordinates['latitude'] }}, {{ $property->coordinates['longitude'] }}], {
                                            icon: L.icon({
                                                iconUrl: "{{ $property->icon->url }}",
                                                iconSize: [32, 32],
                                                iconAnchor: [16, 32],
                                                popupAnchor: [0, -32]
                                            })
                                        }
                                    )
                                    .addTo(map)
                                    .bindPopup(cardContent);
                            @endif
                        @endforeach
                    </script>




                </main>


            </div>
        </div>
    </div>



@include('modal.authenticate')

@include('modal.register')


</body>

</html>
