<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP OOP</title>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    
    <!-- DataTables CDN -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->
</head>
<body>
    <!-- <div class="container">
        <div class="row">
            <div class="col-lg-12"> -->
    <h1>Data Jurusan</h1>
    <?php
    session_start();
    if (isset($_SESSION['message'])) {
        echo "<p>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
    }
    ?>
    <a href="create.php">Tambah Jurusan</a>
    <table id="tableJurusan" border="1" cellspacing="0" cellpadding="0" width="100%" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Jurusan</th>
                <th>Nama Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once "../../config/Database.php";
            include_once "../../classes/Jurusan.php";
            $database = new Database();
            $db = $database->getConnection();

            $jurusan = new Jurusan($db);
            $result = $jurusan->getAll();
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $row['kode_jurusan'] . "</td>";
                echo "<td>" . $row['nama_jurusan'] . "</td>";
                echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Apakah anda yakin?')\">Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
        <!-- </div>
    </div>
</div> -->
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
            columns: [
                { data: 'id' },
                { data: 'kode_jurusan' },
                { data: 'nama_jurusan' },
                { data: 'action', orderable: false, searchable: false }
            ]
        });
    });
    </script> -->
</body>
</html>