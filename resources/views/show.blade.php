<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Details</title>
</head>
<body>
    <h1>Password Details</h1>
    <p>Password: {{ $password->decrypted_password }}</p>
    <p>Maximum Views: {{ $password->max_views }}</p>
    <p>View Count: {{ $password->view_count }}</p>
</body>
</html>
