<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/Database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Jurusan.php';

$db = new Database();
$conn = $db->getConnection();

$jurusan = new Jurusan($conn);
$jurusan_data = $jurusan->getJurusanById($_GET['id']);
?>

<section class="section dashboard">
	<div class="row">

		<div class="col-lg-12">
            <div class="card overflow-auto">
                <div class="card-body p-4">
					<form class="row g-3 needs-validation" novalidate method="POST" action="contents/jurusan/update.php">
						<input type="hidden" name="id" value="<?= $jurusan_data['id'] ?>">
						<div class="col-md-4">
							<label for="kode" class="form-label">Kode Jurusan</label>
							<input type="text" name="kode" placeholder="Kode Jurusan" class="form-control" required value="<?= $jurusan_data['kode_jurusan'] ?>">
						</div>
						
						<div class="col-md-8">
							<label for="nama" class="form-label">Nama Jurusan</label>
							<input type="text" name="nama" placeholder="Nama Jurusan" class="form-control" required value="<?= $jurusan_data['nama_jurusan'] ?>">
						</div>
						<div class="col-md-12">
							<button type="submit" class="btn btn-success mt-3"><i class="bi bi-floppy2-fill"></i> Simpan</button>
							<button type="button" class="btn btn-secondary mt-3" onclick="window.history.back();"><i class="bi bi-x-lg"></i> Batal</button>
						</div>
					</form>
				</div>
            </div>
		</div>

	</div>
</section>