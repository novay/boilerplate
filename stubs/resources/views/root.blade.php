<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=inter-tight:100,200,300,400,500,600,700,800,900&display=swap">
    @vite(['resources/js/app.js'])
    @spladeHead
</head>
<body class="bg-gray-50 dark:bg-slate-900 font-sans antialiased">
    @splade
</body>
</html>