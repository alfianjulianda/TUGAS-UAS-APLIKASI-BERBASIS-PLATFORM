<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>SONIC  | Dashboard Premium</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

<style>
:root{
    --primary:#3b82f6; /* biru */
    --secondary:#facc15; /* kuning */
    --cyan:#22d3ee;
    --white:#ffffff;
    --card-bg: rgba(0,0,0,0.55);
}

*{box-sizing:border-box;}

body{
    margin:0;
    font-family:'Poppins',sans-serif;
    color: var(--white);
    min-height:100vh;
    /* background foto seperti halaman login */
    background:
        linear-gradient(135deg, rgba(59,130,246,0.3), rgba(250,204,21,0.2)),
        url("/images/buka.jpg") no-repeat center center fixed;
    background-size: cover;
}

/* TOPBAR */
.topbar{
    height:70px;
    padding:0 30px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    background: rgba(0,0,0,0.25);
    backdrop-filter: blur(10px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    border-bottom:1px solid rgba(255,255,255,0.1);
}

/* MENU DI SEBELAH KIRI */
.actions{
    display:flex;
    gap:14px;
}
.action-btn{
    padding:10px 16px;
    border-radius:12px;
    background: var(--secondary);
    color: var(--primary);
    font-weight:600;
    text-decoration:none;
    display:flex;
    align-items:center;
    gap:6px;
    box-shadow:0 4px 10px rgba(0,0,0,0.25);
    transition: all 0.3s ease;
}
.action-btn:hover{
    background: var(--primary);
    color: var(--secondary);
    box-shadow:0 6px 20px rgba(0,0,0,0.35);
}

/* JUDUL DI SEBELAH KANAN */
.topbar h2{
    color: var(--cyan);
    font-weight:700;
    font-size:24px;
    display:flex;
    align-items:center;
    gap:6px;
    text-shadow: 0 0 10px rgba(34,211,238,0.7);
}

/* MAIN LAYOUT */
.container{
    display:flex;
    gap:24px;
    padding:30px;
}

/* STATS LEFT */
.stats{
    display:flex;
    flex-direction:column;
    gap:20px;
    min-width:220px;
}
.stat{
    padding:24px;
    border-radius:16px;
    background: linear-gradient(145deg, #1e3a8a, #0f172a);
    box-shadow: 0 15px 35px rgba(0,0,0,0.6);
    position:relative;
    transition: all 0.4s ease;
}
.stat:hover{
    transform: translateY(-5px);
    box-shadow: 0 25px 45px rgba(0,0,0,0.7);
}
.stat small{
    color: #cbd5e1;
    font-size:14px;
}
.stat h2{
    font-size:30px;
    margin-top:8px;
    color: var(--cyan);
    text-shadow: 0 0 5px rgba(34,211,238,0.6);
}
/* ICON */
.stat-icon{
    position:absolute;
    right:16px;
    top:16px;
    font-size:28px;
    color: var(--secondary);
}
.spinner-icon{
    animation: spin 2s linear infinite;
}
@keyframes spin{
    0%{transform: rotate(0deg);}
    100%{transform: rotate(360deg);}
}

/* TABLE RIGHT */
.panel{
    flex:1;
    background: var(--card-bg);
    border-radius:16px;
    padding:24px;
    box-shadow:0 15px 35px rgba(0,0,0,0.5);
    backdrop-filter: blur(8px);
}

.panel h3{
    margin-bottom:20px;
    color: var(--cyan);
    display:flex;
    align-items:center;
    gap:8px;
    text-shadow:0 0 8px rgba(34,211,238,0.7);
}

table{
    width:100%;
    border-collapse:collapse;
}
th, td{
    padding:14px 10px;
    border-bottom:1px solid rgba(255,255,255,0.1);
}
th{
    text-align:left;
    color: var(--cyan);
    font-weight:600;
}
tr:hover{
    background: rgba(250,204,21,0.2);
}

.thumb{
    width:50px;
    height:50px;
    object-fit:cover;
    border-radius:8px;
}

/* BADGES */
.badge{
    padding:6px 14px;
    border-radius:22px;
    font-size:12px;
    font-weight:600;
    box-shadow: 0 2px 6px rgba(0,0,0,0.3);
}
.baru{background: rgba(59,130,246,0.2); color: #3b82f6;}
.diproses{background: rgba(250,204,21,0.2); color: #facc15;}
.selesai{background: rgba(255,255,255,0.15); color: #ffffff;}

/* COUNTER */
.counter{transition: all .5s ease;}
</style>
</head>

<body>

<div class="topbar">
    <div class="actions">
        <a href="/pengaduan" class="action-btn"><i class="fa-solid fa-list-check"></i> Daftar</a>
        <a href="/pengaduan/create" class="action-btn"><i class="fa-solid fa-plus-circle"></i> Tambah</a>
        <a href="/logout" class="action-btn"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </div>
    <h2><i class="fa-solid fa-bullhorn"></i> TEMPAT MASYARAKAT MENGADU</h2>
</div>

<div class="container">

<!-- LEFT STATS -->
<div class="stats">
    <div class="stat">
        <i class="fa-solid fa-bullhorn stat-icon"></i>
        <small>TOTAL PENGADUAN</small>
        <h2 class="counter"><?= $total ?? 0 ?></h2>
    </div>

    <div class="stat">
        <i class="fa-solid fa-bell stat-icon"></i>
        <small>PENGADUAN BARU</small>
        <h2 class="counter"><?= $baru ?? 0 ?></h2>
    </div>

    <div class="stat">
        <i class="fa-solid fa-spinner stat-icon spinner-icon"></i>
        <small>DIPROSES</small>
        <h2 class="counter"><?= $diproses ?? 0 ?></h2>
    </div>

    <div class="stat">
        <i class="fa-solid fa-circle-check stat-icon"></i>
        <small>SELESAI</small>
        <h2 class="counter"><?= $selesai ?? 0 ?></h2>
    </div>
</div>

<!-- RIGHT TABLE -->
<div class="panel">
<h3><i class="fa-solid fa-file-lines"></i> PENGADUAN TERBARU</h3>

<table>
<thead>
<tr>
    <th>JUDUL</th>
    <th>FOTO</th>
    <th>PDF</th>
    <th>STATUS</th>
    <th>TANGGAL</th>
</tr>
</thead>
<tbody>

<?php foreach($pengaduan as $p): ?>
<tr>
<td><?= htmlspecialchars($p['judul']) ?></td>
<td>
<?php if($p['foto']): ?>
<img src="/uploads/<?= $p['foto'] ?>" class="thumb">
<?php else: ?>-
<?php endif ?>
</td>

<td>
<?php if($p['file_pdf']): ?>
<a href="/uploads/<?= $p['file_pdf'] ?>" target="_blank">
<i class="fa-solid fa-file-pdf" style="color:#ef4444;"></i>
</a>
<?php else: ?>-
<?php endif ?>
</td>

<td><span class="badge <?= $p['status'] ?>"><?= ucfirst($p['status']) ?></span></td>
<td><?= date('d M Y', strtotime($p['created_at'])) ?></td>
</tr>
<?php endforeach ?>

</tbody>
</table>
</div>

</div>

<script>
document.querySelectorAll('.counter').forEach(counter=>{
    let target=+counter.innerText;
    let i=0;
    let speed=Math.max(10,target/40);
    const run=()=>{
        i+=speed;
        if(i<target){
            counter.innerText=Math.floor(i);
            requestAnimationFrame(run);
        }else{
            counter.innerText=target;
        }
    };
    run();
});
</script>

</body>
</html>
