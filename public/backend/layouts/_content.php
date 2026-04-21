<?php
function loadView($path) {
	if (file_exists($path)) {
		include $path;
	} else {
		echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
				<h3 class='fw-bold'>404 Not Found</h3>
				<span>Pastikan file <i>$path</i> sudah dibuat dan berada di direktori yang benar.</span>
			  </div>";
	}
}

if(@$_GET['page'] == 'dashboard') {
	loadView('contents/home.php');
} elseif(@$_GET['page'] == 'prodi') {
	if(@$_GET['action'] == 'create') {
		loadView('contents/prodi/create.php');
	} elseif(@$_GET['action'] == 'edit') {
		loadView('contents/prodi/edit.php');
	} else {
		loadView('contents/prodi/index.php');
	}
} elseif(@$_GET['page'] == 'mahasiswa') {
	loadView('contents/mahasiswa.php');
} elseif(@$_GET['page'] == 'dosen') {
	loadView('contents/dosen.php');
} elseif(@$_GET['page'] == 'matakuliah') {
	loadView('contents/matakuliah.php');
} elseif(@$_GET['page'] == 'kelas') {
	loadView('contents/kelas.php');
} else {
	loadView('contents/home.php');
}
?>
