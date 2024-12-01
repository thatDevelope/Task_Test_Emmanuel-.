<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration & Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background: white;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #666;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .switch {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }

        .switch a {
            color: #007bff;
            text-decoration: none;
        }

        .switch a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container" id="auth-container">
        <!-- Registration Form -->
        <div id="register-form" style="display: none;">
            <h2>Admin Registration</h2>
            <form action="/admin2/register" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
                </div>
                <div class="form-group">
                    <button type="submit">Register</button>
                </div>
                <div class="switch">
                    Already have an account? <a href="#" onclick="showLogin()">Login</a>
                </div>
            </form>
        </div>

        <!-- Login Form -->
        <div id="login-form">
            <h2>Admin Login</h2>
            <form action="/admin2/login" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
                <div class="switch">
                    Don't have an account? <a href="#" onclick="showRegister()">Register</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        const registerForm = document.getElementById('register-form');
        const loginForm = document.getElementById('login-form');

        function showRegister() {
            loginForm.style.display = 'none';
            registerForm.style.display = 'block';
        }

        function showLogin() {
            registerForm.style.display = 'none';
            loginForm.style.display = 'block';
        }
    </script>
</body>
</html>
