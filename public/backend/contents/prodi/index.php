<section class="section dashboard">
	<div class="row">

		<div class="col-lg-12">
			<!-- Recent Sales -->
			<div class="col-12">
				<div class="card recent-sales overflow-auto">
					<div class="card-body">
						<h5 class="card-title">Program Studi</h5>
						
						<a href="dashboard.php?page=prodi&action=create" class="btn btn-primary mb-3"><i class="bi bi-plus"></i>Tambah</a>

						<table id="tableProdi" width="100%" border="1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Kode Prodi</th>
									<th>Nama Prodi</th>
									<th>Jenjang</th>
									<th>Jurusan</th>
									<th>Aksi</th>
								</tr>
							</thead>
						</table>

					</div>

				</div>
			</div><!-- End Recent Sales -->
		</div>

	</div>
</section>

<script>
$(document).ready(function() {
    $('#tableProdi').DataTable({
        processing: true,
        serverSide: true,
		order: [[ 0, "desc" ]],
		responsive: true,
        ajax: {
            url: '../../public/ajax/prodi.php',
            type: 'POST'
        },
        columns: [
            { data: 'id' },
            { data: 'kode_prodi' },
            { data: 'nama_prodi' },
            { data: 'jenjang' },
            { data: 'jurusan' },
            { data: 'action', orderable: false, searchable: false }
        ],
		columnDefs: [
			{ className: "dt-body-center", targets: [0, 3, 5] },
		]
    });
});
$(document).on('click', '.btn-edit', function() {
    let id = $(this).data('id');
    alert("Edit ID: " + id);

    // Bisa diarahkan ke form edit
    // window.location.href = "edit.php?id=" + id;
});

$(document).on('click', '.btn-delete', function() {
    let id = $(this).data('id');

    if (confirm("Yakin ingin menghapus data ini?")) {
        $.ajax({
            url: '../ajax/prodi_delete.php',
            type: 'POST',
            data: { id: id },
            success: function(response) {
                alert("Data berhasil dihapus");
                $('#tableProdi').DataTable().ajax.reload();
            }
        });
    }
});
</script>