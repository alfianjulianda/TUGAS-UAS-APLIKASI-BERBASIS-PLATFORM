<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>SONIC | Buat Pengaduan</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

<style>
:root{
    --primary:#3b82f6;
    --secondary:#facc15;
    --glass: rgba(0,0,0,.55);
    --border: rgba(255,255,255,.2);
    --text:#fff;
}

body{
    font-family:'Poppins',sans-serif;
    min-height:100vh;
    background:
        linear-gradient(135deg, rgba(59,130,246,.35), rgba(250,204,21,.25)),
        url("/images/buka.jpg") no-repeat center center fixed;
    background-size:cover;
    display:flex;
    align-items:center;
    justify-content:center;
    color:var(--text);
}

/* FORM WRAPPER */
.form-wrapper{
    width:100%;
    max-width:760px;
    padding:20px;
}

/* CARD */
.form-card{
    background: var(--glass);
    border-radius:30px;
    padding:45px;
    border:1px solid var(--border);
    backdrop-filter: blur(12px);
    box-shadow:0 25px 60px rgba(0,0,0,.45);
}

/* HEADER */
.form-header{
    text-align:center;
    margin-bottom:35px;
}
.form-header i{
    font-size:48px;
    color:var(--secondary);
    text-shadow:0 0 20px rgba(250,204,21,.7);
}
.form-header h3{
    margin-top:10px;
    font-weight:700;
}

/* BACK */
.back-btn{
    display:inline-flex;
    align-items:center;
    gap:6px;
    margin-bottom:20px;
    color:#e5e7eb;
    text-decoration:none;
    font-weight:600;
}
.back-btn:hover{ color:var(--secondary); }

/* INPUT GROUP ICON */
.input-icon{
    position:relative;
}
.input-icon i{
    position:absolute;
    top:50%;
    left:18px;
    transform:translateY(-50%);
    color:#93c5fd;
}
.form-control{
    padding-left:50px;
    background:rgba(0,0,0,.35);
    border-radius:16px;
    border:1px solid var(--border);
    color:#fff;
}
.form-control:focus{
    border-color:var(--primary);
    box-shadow:0 0 0 4px rgba(59,130,246,.3);
}

/* UPLOAD BOX */
.upload-box{
    border:2px dashed rgba(255,255,255,.25);
    border-radius:20px;
    padding:18px;
    text-align:center;
    transition:.3s;
}
.upload-box:hover{
    border-color:var(--secondary);
    background:rgba(0,0,0,.25);
}

/* PREVIEW */
.preview img{
    margin-top:12px;
    max-width:160px;
    border-radius:16px;
    box-shadow:0 10px 20px rgba(0,0,0,.4);
}

/* BUTTON */
.btn-premium{
    background:linear-gradient(135deg,var(--primary),var(--secondary));
    border:none;
    border-radius:50px;
    padding:16px;
    font-weight:700;
    letter-spacing:1px;
    transition:.3s;
}
.btn-premium:hover{
    transform:translateY(-3px);
    box-shadow:0 15px 30px rgba(0,0,0,.45);
}
</style>
</head>

<body>

<div class="form-wrapper">
<div class="form-card">

<a href="/dashboard" class="back-btn">
    <i class="fa-solid fa-arrow-left"></i> DASHBOARD
</a>

<div class="form-header">
    <i class="fa-solid fa-bullhorn"></i>
    <h3>BUAT PENGADUAN</h3>
</div>

<form action="/pengaduan/store" method="POST" enctype="multipart/form-data">

<!-- JUDUL -->
<div class="form-group input-icon">
    <i class="fa-solid fa-heading"></i>
    <input type="text" name="judul" class="form-control" placeholder="Judul Pengaduan" required>
</div>

<!-- ISI -->
<div class="form-group input-icon">
    <i class="fa-solid fa-pen"></i>
    <textarea name="isi_laporan" rows="4" class="form-control" placeholder="Tulis laporan anda..." required></textarea>
</div>

<!-- FOTO -->
<div class="form-group">
    <div class="upload-box">
        <i class="fa-solid fa-camera fa-2x mb-2 text-warning"></i>
        <p class="mb-2">Upload Foto (Opsional)</p>
        <input type="file" name="foto" class="form-control-file" onchange="previewImage(this)">
        <div class="preview"></div>
    </div>
</div>

<!-- PDF -->
<div class="form-group">
    <div class="upload-box">
        <i class="fa-solid fa-file-pdf fa-2x mb-2 text-danger"></i>
        <p class="mb-2">Upload PDF (Opsional)</p>
        <input type="file" name="file_pdf" class="form-control-file">
    </div>
</div>

<button class="btn btn-premium btn-block mt-4">
    <i class="fa-solid fa-paper-plane"></i> KIRIM
</button>

</form>
</div>
</div>

<script>
function previewImage(input){
    const preview = input.closest('.upload-box').querySelector('.preview');
    preview.innerHTML='';
    if(input.files[0]){
        const reader=new FileReader();
        reader.onload=e=>preview.innerHTML=`<img src="${e.target.result}">`;
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

</body>
</html>
