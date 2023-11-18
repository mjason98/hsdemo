<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User Notification</title>
</head>
<body>
    <h2>New user: {{ $user->name }}!</h2>

    A new food lover has join our comunity :)

    <p>
        Here are their registration details:
        <ul>
            <li><strong>Name:</strong> {{ $user->name }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
        </ul>
    </p>

    We are growing!!!
    
    Regards
</body>
</html>