<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>LOGIN DULU DONG</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
:root {
    --primary: #3b82f6; /* biru */
    --secondary: #facc15; /* kuning */
    --text-color: #ffffff;
}

body.login-page {
    min-height: 100vh;
    background:
        linear-gradient(135deg, rgba(59,130,246,0.4), rgba(250,204,21,0.2)),
        url("/images/buka.jpg") no-repeat center center fixed;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Poppins', sans-serif;
    overflow: hidden;
    position: relative;
}

body.login-page::before {
    content: '';
    position: absolute;
    width: 250%;
    height: 250%;
    background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
    animation: rotateLight 25s linear infinite;
    top: -75%;
    left: -75%;
    z-index: 0;
}
@keyframes rotateLight {
    0% { transform: rotate(0deg);}
    100% { transform: rotate(360deg);}
}

.login-box {
    width: 420px;
    z-index: 1;
}

.login-logo {
    color: var(--primary);
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 20px;
    text-shadow: 0 2px 8px rgba(59,130,246,0.7);
}

.login-card-body {
    background: rgba(0,0,0,0.45);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    padding: 35px 25px;
    color: var(--text-color);
    box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    transition: transform 0.3s, box-shadow 0.3s;
}
.login-card-body:hover {
    transform: translateY(-5px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.5);
}

.login-box-msg {
    font-size: 16px;
    margin-bottom: 20px;
}

/* Input */
.form-control {
    border-radius: 30px;
    padding-left: 45px;
    height: 45px;
    border: 1px solid rgba(255,255,255,0.4);
    background: rgba(0,0,0,0.3);
    color: #fff;
    transition: all 0.3s ease;
}
.form-control::placeholder { color: rgba(255,255,255,0.7); }
.form-control:focus {
    box-shadow: 0 0 8px var(--primary);
    border-color: var(--primary);
}

.input-group-text {
    background: transparent;
    border: none;
    color: var(--primary);
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
}
.input-group-text:hover {
    color: var(--secondary);
}

/* Tombol Login */
.btn-login {
    border-radius: 30px;
    font-weight: 600;
    letter-spacing: 1px;
    background: linear-gradient(45deg, var(--primary), var(--secondary));
    border: none;
    color: #fff;
    transition: all 0.3s;
}
.btn-login:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.3), 0 0 10px var(--primary) inset;
}

/* Alert */
.alert {
    border-radius: 12px;
    font-size: 14px;
    background: rgba(248, 113, 113,0.15);
    color: #f87171;
    border: 1px solid rgba(248, 113, 113,0.3);
    margin-bottom: 20px;
}

/* Avatar Upload */
#avatarPreview {
    width: 100px;
    height: 100px;
    margin: 0 auto 15px auto;
    display: block;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--primary);
    box-shadow: 0 0 10px var(--primary);
}
.custom-file-label {
    border-radius: 30px;
    background: rgba(0,0,0,0.3);
    border: 1px solid rgba(255,255,255,0.4);
    color: #fff;
}
</style>
</head>

<body class="hold-transition login-page">

<div class="login-box text-center">
    <div class="login-logo">
        SONIC
    </div>

    <div class="card login-card-body">
        <p class="login-box-msg">SISTEM PENGADUAN MASYARAKAT</p>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form action="/login" method="post" enctype="multipart/form-data">
            <img id="avatarPreview" src="/images/default-avatar.png" alt="Preview Foto">

            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="avatar" name="avatar" accept="image/*" onchange="previewAvatar(event)">
                    <label class="custom-file-label" for="avatar">Pilih Foto</label>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
            </div>

            <button type="submit" class="btn btn-login btn-block">LOGIN</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script>
function previewAvatar(event) {
    const preview = document.getElementById('avatarPreview');
    const file = event.target.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function(e){
            preview.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

</body>
</html>
