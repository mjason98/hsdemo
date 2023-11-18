<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Notification</title>
</head>

<body style="font-family: 'Arial', sans-serif;">

    <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f4f4f4;">
        <h2 style="color: #333;">{{ config('app.name') }}</h2>

        <p>
            Hello {{ $user->name }},
        </p>

        Unlock a world of culinary delights by logging into our app today. Immerse yourself in a community passionate about the magical art of cooking.

        <p>
            Join us in the culinary adventure!
        </p>

        <p>
            Warm regards.
        </p>
    </div>

</body>

</html>