<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Workopia</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        @vite('resources/js/app.js')
    </body>
</html>
