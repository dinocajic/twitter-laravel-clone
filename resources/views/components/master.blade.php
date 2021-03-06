<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">

<div>
    <section class="px-8 py-4 mb-6">
        <!-- Page Heading -->
        <header class="container mx-auto">
            <img
                src="/img/logo.jpg"
                alt="Tweety Logo"
            >
        </header>
    </section>

    {{ $slot }}
</div>

@stack('modals')

@livewireScripts

<script src="http://unpkg.com/turbolinks"></script>
</body>
</html>
