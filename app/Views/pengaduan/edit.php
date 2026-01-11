<form action="/pengaduan/update/<?= $pengaduan['id'] ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Judul Pengaduan</label>
        <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($pengaduan['judul']) ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Isi Pengaduan</label>
        <textarea name="isi" class="form-control" required><?= htmlspecialchars($pengaduan['isi']) ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="foto" class="form-control" accept=".jpg,.png,.jpeg">
        <?php if ($pengaduan['foto']): ?>
            <p>Lampiran sekarang: <a href="/uploads/<?= $pengaduan['foto'] ?>" target="_blank">Lihat Foto</a></p>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label class="form-label">PDF</label>
        <input type="file" name="pdf" class="form-control" accept=".pdf">
        <?php if ($pengaduan['pdf']): ?>
            <p>Lampiran sekarang: <a href="/uploads/<?= $pengaduan['pdf'] ?>" target="_blank">Lihat PDF</a></p>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>