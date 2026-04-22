<section class="section dashboard">
	<div class="row">

		<div class="col-lg-12">
			
			<?php
			$alertTypes = [
				'success' => 'success',
				'error'   => 'danger'
			];

			foreach ($alertTypes as $key => $class) :
				if (isset($_SESSION[$key])) :
					echo "<div class='alert alert-". $class ." alert-dismissible fade show' role='alert'>". htmlspecialchars($_SESSION[$key]) ."<button type='button' class='btn-close' data-bs-dismiss='alert'></button></div>";
					unset($_SESSION[$key]);
				endif;
			endforeach;
			?>

			<?php
				require_once $_SERVER['DOCUMENT_ROOT'] . '/config/Database.php';
				require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Jurusan.php';

				$db = new Database();
				$conn = $db->getConnection();
				$jurusan = new Jurusan($conn);
				
				$result = $jurusan->getAll();
				if(!$result) {
					die("Error: " . $conn->error);
				}
			?>

			<div class="card overflow-auto">
				<div class="card-body">
					<a href="dashboard.php?page=jurusan&action=create" class="btn btn-primary my-3"><i class="bi bi-plus"></i>Tambah</a>


					<table id="tableJurusan" width="100%" border="0" class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode</th>
								<th>Nama Jurusan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php while($row=$result->fetch_assoc()): ?>
							<tr>
								<td><?= $row['id'] ?></td>
								<td><?= $row['kode_jurusan'] ?></td>
								<td><?= $row['nama_jurusan'] ?></td>
								<td>
									<a href="dashboard.php?page=jurusan&action=edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning btn-edit"><i class="bi bi-pencil"></i> Edit</a>
									<button data-id="<?= $row['id'] ?>" class="btn btn-sm btn-danger btn-delete"><i class="bi bi-trash"></i> Hapus</button>
								</td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>

				</div>
			</div>
		</div>

	</div>
</section>

<script>
$(document).ready(function() {
	$('#tableJurusan').DataTable({
		processing: true,
		serverSide: false,
		order: [[ 0, "desc" ]],
		responsive: true,
		columnDefs: [
			{ className: "dt-body-center", targets: [0, 1, 3] },
		],

		// Jika menggunakan server-side processing, aktifkan bagian ajax dan columns berikut
		// ajax: {
		// 	url: 'contents/jurusan/read.php',
		// 	type: 'POST'
		// },

		// Jika tidak menggunakan server-side processing, pastikan data sudah ter-render di HTML dan aktifkan bagian order dan columnDefs untuk pengaturan tampilan
		columns: [
			{ data: 'id' },
			{ data: 'kode_jurusan' },
			{ data: 'nama_jurusan' },
			{ data: 'action', orderable: false, searchable: false }
		]
	});
});

$(document).on('click', '.btn-delete', function() {
	let id = $(this).data('id');

	if (confirm("Yakin ingin menghapus data ini?")) {
		$.ajax({
			url: 'contents/jurusan/delete.php',
			type: 'POST',
			data: { id: id },
			success: function(response) {
				console.log(response);
				// $('#tableJurusan').DataTable().ajax.reload();
				window.location.reload();
			}
		});
	}
});
</script>