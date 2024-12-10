<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        <title>Kong Store</title>

    </head>
    <body>

        <livewire:header/>
        <livewire:banner-section/>
        <livewire:product-section/>
        <livewire:footer/>

    </body>

    <script type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>
</html>
