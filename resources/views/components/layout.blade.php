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
    <!-- JS Alpine scripting -->
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body>
    <x-navbar />

    {{$slot}}
</body>

</html>