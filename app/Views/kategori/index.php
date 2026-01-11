<h2>Data Kategori</h2>

<a href="/kategori/create">➕ Tambah Kategori</a>
<br><br>

<table border="1" cellpadding="8">
<tr>
    <th>No</th>
    <th>Nama Kategori</th>
</tr>

<?php $no=1; foreach ($kategori as $k): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= htmlspecialchars($k['nama']) ?></td>
</tr>
<?php endforeach; ?>
</table>