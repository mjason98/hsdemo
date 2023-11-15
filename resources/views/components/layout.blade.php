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
</head>

<body class="bg-[#d6d6d6]">
    <x-navbar />

    {{$slot}}
</body>

</html>