<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial; font-size: 12px; }
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #000; padding:6px; }
        img { width:80px; }
    </style>
</head>
<body>

<h3 align="center">LAPORAN PENGADUAN MASYARAKAT</h3>

<table>
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Isi</th>
    <th>Foto</th>
    <th>Status</th>
    <th>Tanggal</th>
</tr>

<?php $no=1; foreach($pengaduan as $p): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $p['judul'] ?></td>
    <td><?= $p['isi'] ?></td>
    <td>
        <?php if($p['foto']): ?>
            <img src="<?= $_SERVER['DOCUMENT_ROOT'] ?>/uploads/<?= $p['foto'] ?>">
        <?php else: ?>
            -
        <?php endif; ?>
    </td>
    <td><?= $p['status'] ?></td>
    <td><?= $p['created_at'] ?></td>
</tr>
<?php endforeach; ?>

</table>
</body>
</html>