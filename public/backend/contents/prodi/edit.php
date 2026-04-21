<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/Database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Prodi.php';

$db = new Database();
$conn = $db->getConnection();

$prodi = new Prodi($conn);
$jurusanList = $prodi->getJurusan();
$prodi_data = $prodi->getProdiById($_GET['id']);
?>

<section class="section dashboard">
	<div class="row">

		<div class="col-lg-12">
            <div class="card overflow-auto">
                <div class="card-body p-4">
					<form class="row g-3 needs-validation" novalidate method="POST" action="contents/prodi/update.php">
						<input type="hidden" name="id" value="<?= $prodi_data['id'] ?>">
						<div class="col-md-4">
							<label for="kode_prodi" class="form-label">Kode Prodi</label>
							<input type="text" name="kode_prodi" placeholder="Kode Prodi" class="form-control" required value="<?= $prodi_data['kode_prodi'] ?>">
						</div>
						
						<div class="col-md-8">
							<label for="nama_prodi" class="form-label">Nama Prodi</label>
							<input type="text" name="nama_prodi" placeholder="Nama Prodi" class="form-control" required value="<?= $prodi_data['nama_prodi'] ?>">
						</div>
						<div class="col-md-6">
							<label for="jenjang" class="form-label">Jenjang</label>
							<select name="jenjang" class="form-select" required>
								<option value="">-- Pilih Jenjang --</option>
								<option value="D3" <?= $prodi_data['jenjang'] == 'D3' ? 'selected':'' ?>>D3</option>
								<option value="D4" <?= $prodi_data['jenjang'] == 'D4' ? 'selected':'' ?>>D4</option>
							</select>
						</div>
						<div class="col-md-6">
							<label for="jenjang" class="form-label">Jurusan</label>
							<select name="jurusan" class="form-select" required>
								<option value="">-- Pilih Jurusan --</option>

								<?php foreach ($jurusanList as $j) { ?>
									<option value="<?php echo $j['id']; ?>" <?= $prodi_data['jurusan'] == $j['id'] ? 'selected':'' ?>>
										<?php echo htmlspecialchars($j['nama_jurusan']); ?>
									</option>
								<?php } ?>

							</select>
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