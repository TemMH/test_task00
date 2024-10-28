<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Styles / Scripts -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-white text-black/50 dark:text-white/50">
        <div
            class="relative min-h-screen flex flex-col items-left justify-start selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full px-24 lg:max-w-4xl">
                <header class="grid grid-cols-2 items-left gap-2 py-10 lg:grid-cols-1">


                    <a href="/" style="cursor: pointer;" class="flex lg:justify-left lg:col-start-1">
                        <div class="logotype" style="display: flex; align-items:center;">
                            <div class="logo"
                                style="width: 50px;height: 50px; background-color:black; border-radius:50%;"></div>
                            <div class="nameCompany" style="color: black;">
                                Тестовая компания
                            </div>
                        </div>
                    </a>

                </header>

                <main class="mt-6" style="color:black;">
                    <div>
                        <div style="display: flex; font-size: 52px">
                            <div class="propertyTitle">{{ $property->name }}</div>
                            <div style="margin-left: 8px;" class="propertyArea">{{ $property->area }}м²</div>
                        </div>
                        <div class="propertyPrice" style="display: flex; font-size: 40px">{{ $property->price }}</div>
                        <div class="propertyDescription" style="display: flex; font-size: 24px; margin-bottom: 80px;">
                            {{ $property->description }}</div>

                        <div class="comments"
                            style="color: black;  max-height: 40vh; overflow-y: auto; scroll-snap-type: y mandatory;">
                            @foreach ($property->comments as $comment)
                                <div class="comment"
                                    style="display: block; background-color:#E0E0E0; margin-bottom:20px; padding: 2%;">


                                    <div class="commentTop"
                                        style="display: flex; justify-content:space-between; margin-bottom:1%; align-items:center;">
                                        <div class="commentUserName" style="font-size:18px">
                                            {{ $comment->user->name }}
                                        </div>
                                        <div class="commentCreated" style="font-size:12px; color:gray;">
                                            {{ $comment->created_at->format('d.m.Y') }}
                                        </div>
                                    </div>


                                    <div class="commentDown">
                                        <div class="commentText" style="font-size:12px;">
                                            {{ $comment->text }}
                                        </div>
                                    </div>


                                </div>
                            @endforeach

                        </div>
                        @auth

                            <form method="POST" style="width: 100%;height 170px; margin-top: 60px;" class="inputComment"
                                action="{{ route('propertyComment', ['id' => $property->id]) }}">
                                @csrf
                                <textarea class="form_field_comment_shortvideo"
                                    style="width: 100%; height: 170px; background-color: #E0E0E0; text-align: left;" name="text"
                                    placeholder="Комментарий к заказу"></textarea>

                                <input type="hidden" name="property_id" value="{{ $property->id }}">

                                <button
                                    style="background-color: black; color:white; padding:2% 7% 2% 7%; font-size: 26px; margin-top:32px"
                                    type="submit">Заказать</button>

                            </form>
                        @endauth
                    </div>
                </main>


            </div>
        </div>
    </div>
</body>

</html>
