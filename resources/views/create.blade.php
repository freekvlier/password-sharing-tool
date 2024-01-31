<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Password</title>
</head>
<body>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('store') }}" method="post">
        @csrf
        <label for="password">Enter Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <label for="max_views">Maximum Views:</label><br>
        <input type="number" id="max_views" name="max_views" value="1" min="1"><br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
