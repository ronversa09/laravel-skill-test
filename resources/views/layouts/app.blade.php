<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Skill Test</title>
</head>
<body>
    <div style="position: relative;">
        <div style="position: absolute; top: 10px; right: 10px; display: flex; align-items: center;">
            <span style="margin-right: 21px; margin-top: -15px;">Welcome, {{ Auth::user()->name }}</span>
            <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer;">Logout</button>
            </form>
        </div>
    </div>
    @yield('content')
</body>
</html>