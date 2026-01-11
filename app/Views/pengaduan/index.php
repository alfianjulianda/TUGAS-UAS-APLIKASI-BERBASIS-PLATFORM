<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>SONIC | Daftar Pengaduan</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

<style>
:root{
    --primary:#3b82f6;
    --secondary:#facc15;
    --card-bg: rgba(0,0,0,0.55);
    --text:#ffffff;
}

body{
    font-family:'Poppins',sans-serif;
    margin:0;
    color: var(--text);
    min-height:100vh;
    background:
        linear-gradient(135deg, rgba(59,130,246,0.3), rgba(250,204,21,0.2)),
        url("/images/buka.jpg") no-repeat center center fixed;
    background-size: cover;
}

.container{
    padding:40px 20px;
    max-width: 1100px;
}

/* HEADER */
.header{
    display:flex;
    justify-content: space-between;
    align-items:center;
    margin-bottom:30px;
}
.header h4{
    font-size:24px;
    color: var(--primary);
    display:flex;
    align-items:center;
    gap:8px;
    text-shadow:0 0 8px rgba(59,130,246,0.7);
}
.btn-dashboard{
    background: var(--secondary);
    color: var(--primary);
    font-weight:600;
    border-radius:12px;
    padding:8px 16px;
    display:flex;
    align-items:center;
    gap:6px;
    text-decoration:none;
    transition:0.3s;
}
.btn-dashboard:hover{
    background: var(--primary);
    color: var(--secondary);
}

/* CARD */
.card-dark{
    background: var(--card-bg);
    border-radius:16px;
    padding:24px;
    box-shadow:0 15px 35px rgba(0,0,0,0.5);
}

/* TABLE */
.table{
    color: var(--text);
}
.table thead{
    background: rgba(59,130,246,0.2);
}
th{
    color: var(--primary);
    font-weight:600;
}
tr:hover{
    background: rgba(250,204,21,0.2);
}

/* FOTO */
.thumb{
    width:50px;
    height:50px;
    object-fit:cover;
    border-radius:10px;
    box-shadow:0 3px 8px rgba(0,0,0,0.4);
}

/* BADGES */
.badge-baru{
    background: rgba(59,130,246,0.2);
    color:#3b82f6;
    padding:6px 14px;
    border-radius:20px;
    font-weight:600;
}
.badge-proses{
    background: rgba(250,204,21,0.2);
    color:#facc15;
    padding:6px 14px;
    border-radius:20px;
    font-weight:600;
}
.badge-selesai{
    background: rgba(34,197,94,0.2);
    color:#22c55e;
    padding:6px 14px;
    border-radius:20px;
    font-weight:600;
}

/* BUTTON */
.btn-sm{
    border-radius:10px;
}
</style>
</head>

<body>
<div class="container">

<div class="header">
    <h4><i class="fa-solid fa-list"></i> Daftar Pengaduan</h4>
    <div class="d-flex gap-2">
        <a href="/dashboard" class="btn-dashboard">
            <i class="fa-solid fa-arrow-left"></i> Dashboard
        </a>
        <?php if($_SESSION['user']['role'] === 'masyarakat'): ?>
        <a href="/pengaduan/create" class="btn-dashboard">
            <i class="fa-solid fa-plus"></i> Buat Pengaduan
        </a>
        <?php endif; ?>
    </div>
</div>

<div class="card-dark">
<div class="table-responsive">
<table class="table table-borderless">
<thead>
<tr>
    <th>#</th>
    <th>Judul</th>
    <th>Foto</th>
    <th>PDF</th>
    <th>Status</th>
    <th>Tanggal</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>

<?php if(!empty($pengaduan)): ?>
<?php $no=1; foreach($pengaduan as $p): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= htmlspecialchars($p['judul']) ?></td>

    <!-- FOTO -->
    <td>
        <?php if(!empty($p['foto'])): ?>
            <img src="/uploads/<?= $p['foto'] ?>" class="thumb">
        <?php else: ?>
            -
        <?php endif ?>
    </td>

    <!-- PDF -->
    <td>
        <?php if(!empty($p['file_pdf'])): ?>
            <a href="/uploads/<?= $p['file_pdf'] ?>" target="_blank">
                <i class="fa-solid fa-file-pdf fa-lg text-danger"></i>
            </a>
        <?php else: ?>
            -
        <?php endif ?>
    </td>

    <!-- STATUS -->
    <td>
        <?php if($p['status']=='baru'): ?>
            <span class="badge-baru">Baru</span>
        <?php elseif($p['status']=='diproses'): ?>
            <span class="badge-proses">Diproses</span>
        <?php else: ?>
            <span class="badge-selesai">Selesai</span>
        <?php endif ?>
    </td>

    <td><?= date('d M Y',strtotime($p['created_at'])) ?></td>

    <!-- AKSI -->
    <td>
        <a href="/pengaduan/detail?id=<?= $p['id'] ?>" class="btn btn-sm btn-info">
            <i class="fa-solid fa-eye"></i>
        </a>

        <?php if($_SESSION['user']['role'] === 'masyarakat' && $p['user_id']==$_SESSION['user']['id']): ?>
            <a href="/pengaduan/edit?id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">
                <i class="fa-solid fa-edit"></i>
            </a>
            <form action="/pengaduan/delete/<?= $p['id'] ?>" method="get" style="display:inline">
                <button class="btn btn-sm btn-danger"
                    onclick="return confirm('Hapus pengaduan ini?')">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        <?php endif; ?>

        <?php if($_SESSION['user']['role'] === 'admin'): ?>
            <a href="/pengaduan/edit?id=<?= $p['id'] ?>" class="btn btn-sm btn-success">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach ?>
<?php else: ?>
<tr>
<td colspan="7" class="text-center text-muted py-4">
    Belum ada pengaduan
</td>
</tr>
<?php endif ?>

</tbody>
</table>
</div>
</div>

</div>
</body>
</html>
