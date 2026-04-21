	<!-- ======= Sidebar ======= -->
	<aside id="sidebar" class="sidebar">
		<?php
			$master = ['prodi', 'mahasiswa', 'dosen', 'matakuliah', 'kelas'];
			if (in_array(@$_GET['page'], $master)) {
				$menu['master'] = true;
			}
		?>

		<ul class="sidebar-nav" id="sidebar-nav">

			<li class="nav-item">
				<a class="nav-link collapsed" href="dashboard.php">
					<i class="bi bi-grid"></i>
					<span>Dashboard</span>
				</a>
			</li><!-- End Dashboard Nav -->

            <li class="nav-heading">Data Master</li>

			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-folder"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="components-nav" class="nav-content collapse <?php echo (isset($menu['master']) && $menu['master'] === true) ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
                    <li>
						<a href="dashboard.php?page=prodi">
							<i class="bi bi-circle"></i><span>Data Prodi</span>
						</a>
					</li>
                    <li>
						<a href="dashboard.php?page=mahasiswa">
							<i class="bi bi-circle"></i><span>Data Mahasiswa</span>
						</a>
					</li>
                    <li>
                        <a href="dashboard.php?page=dosen">
                            <i class="bi bi-circle"></i><span>Data Dosen</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?page=matakuliah">
                            <i class="bi bi-circle"></i><span>Data Matakuliah</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?page=kelas">
                            <i class="bi bi-circle"></i><span>Data Kelas</span>
                        </a>
                    </li>
				</ul>
			</li><!-- End Components Nav -->

		</ul>

	</aside><!-- End Sidebar-->