<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | SIPMAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background: url('/assets/img/bg-login.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', sans-serif;
        }

        .overlay {
            min-height: 100vh;
            background: rgba(0,0,0,0.55);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background: rgba(255,255,255,0.95);
            padding: 35px;
            width: 100%;
            max-width: 400px;
            border-radius: 12px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.4);
        }

        .login-card h4 {
            font-weight: 700;
            margin-bottom: 25px;
            text-align: center;
        }

        .btn-login {
            border-radius: 30px;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="overlay">
    <div class="login-card">
        <h4>Login SIPMAS</h4>

        <form action="/login/proses" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-login">
                Masuk
            </button>
        </form>
    </div>
</div>

</body>
</html>