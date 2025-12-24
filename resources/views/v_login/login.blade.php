<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Card</title>

    <link rel="stylesheet" href="{{ asset('backend/css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="wrapper">

        <div class="login-card">
            
            <div class="icon-circle">
                <i class="fa fa-user"></i>
            </div>

            <h3>Have an account?</h3>

            {{-- Pesan Error --}}
            @if (session('error'))
                <p style="color:red; text-align:center; margin-bottom:10px;">
                    {{ session('error') }}
                </p>
            @endif

            {{-- Pesan Sukses (opsional) --}}
            @if (session('success'))
                <p style="color:green; text-align:center; margin-bottom:10px;">
                    {{ session('success') }}
                </p>
            @endif

            <form method="POST" action="{{ route('login.process') }}">
                @csrf

                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>

                <div class="remember">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>

                    <a href="#">Forgot Password</a>
                </div>

                <button type="submit" class="btn">Get Started</button>
            </form>
        </div>
    </div>

</body>
</html>
