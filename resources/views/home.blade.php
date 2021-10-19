<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <main class="h-screen flex items-center px-6 lg:px-32 bg-purple-900 text-white relative">
            <header class="w-full absolute left-0 top-0 px-32 py-16">
                <div class="flex justify-between">
                  <div>
                    <h1 class="text-3xl font-bold"><img class="w-16" src="https://cdn.discordapp.com/attachments/886970630606561352/886977851692285972/stick.png" alt=""></h1>
                    <span>powered by BDC StickHouse...</span>
                  </div>
                  
                  <div>
                    @if (Route::has('login'))
                    <div class="hidden absolute top-0 right-0 px-32 py-20 sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-gray-200 mr-4">Enter App</a>
                        @else
                            <a href="{{ route('login') }}" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-gray-200 mr-4">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-gray-200 mr-4">Register</a>
                            @endif
                        @endif
                    </div>
                    @endif
                  </div>
                </div>
              </header>
              <section class="w-full md:w-9/12 xl:w-8/12">
                <span class="font-bold tracking-widest">💰 BG x GG 🍁</span>
                <h1 class="text-5xl lg:text-6xl font-bold text-pink-500">
                  BDC<br/>Social
                </h1>
                <p class="font-bold mb-1">Clone of twitter</p>
                <p>for picking some groupies...</p>
              </section>
              <footer class="absolute right-0 bottom-0 p-6 lg:p-32">
                <p class="font-bold mb-1">By Toutes la BDC</p>
                <a class="underline text-blue-500" href="https://www.twitch.tv/bdc__">https://www.twitch.tv/bdc__</a>
              </footer>
            </main>

        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endenv
    </body>
</html>
