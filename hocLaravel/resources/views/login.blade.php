<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <form method="POST" id="form1" >
        @csrf

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required autofocus>
        </div>

        <div>
            <label for="password">Password</label>
            <input  type="password" id="password" name="password" required>
        </div>

        <div>
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember Me</label>
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
    
</body>
</html>