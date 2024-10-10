<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Workopia</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100">
        <x-header />
        <x-hero />
        <x-top-banner />
        
        <main class="container mx-auto p-4 mt-4">
            {{ $slot }}
        </main>

        <x-bottom-banner />
    </body>
</html>
