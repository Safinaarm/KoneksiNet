<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Mengatur font dan layout utama */
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: flex-end; /* Letakkan container di sebelah kanan */
            align-items: center;
            background-image: url('/assets/images/bg.png'); /* Ganti dengan path gambar background */
            background-size: cover; /* Menutupi seluruh area body */
            background-position: center; /* Memusatkan gambar */
            font-family: 'Poppins', sans-serif;
        }

        /* Container utama untuk menampung logo dan form */
        .main-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 40%; /* Atur lebar untuk menempati bagian kanan */
        }

        /* Container form login dengan latar belakang transparan dan blur */
        .register-card {
            width: 100%;
            max-width: 500px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.232);
            backdrop-filter: blur(15px); /* Efek blur */
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(128, 0, 128, 0.3); /* Shadow ungu */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .register-card h2 {
            font-size: 2rem;
            font-weight: 600;
            color: #4e34b6;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group label {
            font-weight: 500;
        }

        .form-control {
            border-radius: 30px;
            border-color: #ddd;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #4e34b6;
            box-shadow: 0 0 0 0.2rem rgba(78, 51, 182, 0.25);
        }

        .btn-register {
            background-color: #4e34b6;
            border: none;
            border-radius: 30px;
            color: #fff;
            font-weight: 600;
            padding: 10px 20px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn-register:hover {
            background-color: #3e2b8c;
        }

        .link-login {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 0.9rem;
        }

        .link-login a {
            color: #4e34b6;
            text-decoration: none;
            font-weight: 600;
        }

        .link-login a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="register-card">
            <h2>Register</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row mb-3">
                    <!-- Name -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input id="name" type="text" class="form-control" name="name" required>
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control" name="email" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Phone Number -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="no_hp" class="form-label">Phone Number</label>
                            <input id="no_hp" type="text" class="form-control" name="no_hp">
                        </div>
                    </div>

                    <!-- WhatsApp -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="wa" class="form-label">WhatsApp</label>
                            <input id="wa" type="text" class="form-control" name="wa">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- PIN -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="pin" class="form-label">PIN</label>
                            <input id="pin" type="text" class="form-control" name="pin">
                        </div>
                    </div>

                    <!-- Role -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" class="form-control" name="role" required>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Password -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                </div>

                <!-- Register Button -->
                <button type="submit" class="btn-register">
                    Register
                </button>

                <!-- Login Link -->
                <div class="link-login mt-3">
                    <a href="{{ route('login') }}">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
