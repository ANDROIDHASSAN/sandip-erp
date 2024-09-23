
<!DOCTYPE html>
<html>
<head>
    <title>Teacher Progress System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 100px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        header {
            margin-bottom: 20px;
        }
        h2 {
            color: #35424a;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 15px;
            background: #35424a;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin: 10px 0;
            transition: background 0.3s;
        }
        button:hover {
            background: #46a49f;
        }
        .register-link {
            margin-top: 20px;
        }
        .register-link a {
            text-decoration: none;
            color: #35424a;
            font-weight: bold;
        }
        .register-link a:hover {
            color: #46a49f;
        }
        .option {
            margin: 15px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <h2>Welcome to Teacher Progress System</h2>
        <p>Please choose an option to continue:</p>
    </header>

    <div class="option">
        <button onclick="window.location.href='login.php'">Teacher Login</button>
    </div>

    <div class="option">
        <button onclick="window.location.href='admin_login.php'">Admin Login</button>
    </div>

    <div class="register-link">
        <p>Don't have an account? <a href="register.php">Register Now</a></p>
    </div>
</div>

</body>
</html>
