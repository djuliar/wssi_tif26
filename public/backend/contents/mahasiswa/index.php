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
                    <a href="dashboard.php?page=mahasiswa&action=create" class="btn btn-primary my-3"><i class="bi bi-plus"></i>Tambah</a>

                    <table id="tableMahasiswa" width="100%" border="0" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NIM</th>
                                <th>Nama Lengkap</th>
                                <th>Program Studi</th>
                                <th>Jurusan</th>
                                <!-- <th>Aksi</th> -->
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
    $('#tableMahasiswa').DataTable({
        processing: true,
        serverSide: true,
		responsive: true,
		order: [[ 0, "desc" ]],
        ajax: {
            url: '../../_api/public/endpoint.php',
            type: 'GET'
        },
        columns: [
            { data: 'id' },
            { data: 'nim' },
            { data: 'nama' },
            { data: 'nama_prodi' },
            { data: 'nama_jurusan' }
            // { data: 'action', orderable: false, searchable: false }
        ],
		columnDefs: [
			{ className: "dt-body-center", targets: [0, 1, 4] },
		]
    });
});
</script>