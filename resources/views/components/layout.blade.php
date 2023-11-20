<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Xochi' }}</title>

    <x-fonts />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            plugins: [require('@tailwindcss/forms')]
        }
    </script>

    <script src="https://kit.fontawesome.com/7cded6f6dd.js" crossorigin="anonymous"></script>

    <!-- JS Alpine scripting -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>

<body class="bg-[#d6d6d6]">
    <x-navbar />

    {{$slot}}
</body>

<style>
    @media (min-width: 640px) {
        .h-lessnav {
            background-image: url('{{ asset('imgs/flbg.jpg')}}');
            background-size: 2000px;
            height: calc(100vh - 64px);
        }
    }

    .h-lessnav {
            background-image: url('{{ asset('imgs/flbg.jpg')}}');
            background-size: 2000px;
        }
</style>

</html>