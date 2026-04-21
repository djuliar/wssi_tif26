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

            <div class="card overflow-auto">
                <div class="card-body">
                    <a href="dashboard.php?page=prodi&action=create" class="btn btn-primary my-3"><i class="bi bi-plus"></i>Tambah</a>

                    <table id="tableProdi" width="100%" border="0" class="table table-bordered table-striped table-hover">
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
            url: '../ajax/prodi.php',
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

$(document).on('click', '.btn-delete', function() {
    let id = $(this).data('id');

    if (confirm("Yakin ingin menghapus data ini?")) {
        $.ajax({
            url: 'contents/prodi/delete.php',
            type: 'POST',
            data: { id: id },
            success: function(response) {
                console.log(response);
                $('#tableProdi').DataTable().ajax.reload();
                window.location.reload();
            }
        });
    }
});
</script>