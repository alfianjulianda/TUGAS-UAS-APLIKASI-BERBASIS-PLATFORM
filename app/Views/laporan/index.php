<h2>Laporan Pengaduan</h2>

<form method="GET">
    <select name="status">
        <option value="">-- Semua Status --</option>
        <option value="baru">Baru</option>
        <option value="proses">Proses</option>
        <option value="selesai">Selesai</option>
    </select>
    <button type="submit">Filter</button>
</form>

<table border="1" cellpadding="8">
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Status</th>
</tr>

<?php $no=1; foreach ($data as $p): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $p['judul'] ?></td>
    <td><?= $p['status'] ?></td>
</tr>
<?php endforeach ?>
</table>
