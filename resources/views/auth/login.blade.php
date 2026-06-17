<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CMS Gereja</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --accent-color: #3498db;
            --bg-light: #f4f7f6;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }

        body {
            background-color: var(--bg-light);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: #fff;
            width: 100%;
            max-width: 400px;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header i {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .login-header h1 {
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
        }

        .form-group input:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: var(--primary-color);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #1a252f;
        }

        .error-msg {
            background: #fdf2f2;
            color: #e74c3c;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            text-align: center;
            border: 1px solid #f9d6d6;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <i class="fas fa-church"></i>
            <h1>CMS Gereja</h1>
            <p style="color: #7f8c8d; font-size: 0.9rem;">Sistem Informasi Manajemen</p>
        </div>

        @if($errors->any())
            <div class="error-msg">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email" required autofocus>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn-login">Masuk</button>
        </form>
        
        <div style="margin-top: 25px; text-align: center; font-size: 0.8rem; color: #bdc3c7;">
            &copy; 2026 CMS Gereja. All rights reserved.
        </div>
    </div>
</body>
</html>
