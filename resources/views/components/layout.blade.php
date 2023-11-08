<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Xochi' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            plugins: [require('@tailwindcss/forms')]
        }
    </script>
    <!-- JS Alpine scripting -->
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body>
    <x-navbar />

    {{$slot}}
</body>

</html>