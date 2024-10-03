<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" />
    <link rel="stylesheet" href="/assets/css/login.css">
    <title>Login</title>
</head>
<body>
    <!-- Container Utama -->
    <div class="main-container">
        <!-- Logo di atas container -->
        <div class="logo-container">
            <img src="/assets/images/newhome/image1.png" alt="Logo" class="logo">
        </div>

        <!-- Container untuk form login -->
        <div class="container">
            <div class="login">
                <b class="log-in">Log In</b>

                <!-- Form Login -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <label for="email" class="email-label">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan Email" required>
                    
                    <label for="password" class="password-label">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password" required>

                    <!-- Tulisan "Belum punya akun?" di atas tombol login -->
                    <div class="belum-punya-akun">
                        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar disini</a></p>
                    </div>
                    
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
