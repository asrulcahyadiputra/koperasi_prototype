<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar" data-sidebarbg="skin6">
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
				<li class="sidebar-item">
					<a class="sidebar-link sidebar-link" href="<?= site_url('dashboard') ?>" aria-expanded="false">
						<i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span>
					</a>
				</li>
				<li class="list-divider"></li>
				<li class="nav-small-cap"><span class="hide-menu">Master Data</span></li>

				<li class="sidebar-item"> <a class="sidebar-link" href="<?= site_url('master/anggota') ?>" aria-expanded="false">
						<i data-feather="users" class="feather-icon"></i>
						<span class="hide-menu">
							Anggota
						</span>
					</a>
				</li>
				<li class="sidebar-item"> <a class="sidebar-link" href="<?= site_url('master/pegawai') ?>" aria-expanded="false">
						<i data-feather="users" class="feather-icon"></i>
						<span class="hide-menu">
							Pegawai
						</span>
					</a>
				</li>
				<li class="sidebar-item"> <a class="sidebar-link" href="master/anggota" aria-expanded="false">
						<i data-feather="list" class="feather-icon"></i>
						<span class="hide-menu">
							Chart of Account
						</span>
					</a>
				</li>
				<li class="sidebar-item"> <a class="sidebar-link" href="master/anggota" aria-expanded="false">
						<i data-feather="user" class="feather-icon"></i>
						<span class="hide-menu">
							Users
						</span>
					</a>
				</li>


				<li class="list-divider"></li>
				<li class="nav-small-cap"><span class="hide-menu">Transaksi</span></li>
				<li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
						<i data-feather="file-text" class="feather-icon">
						</i><span class="hide-menu">Simpanan Anggota</span>
					</a>
					<ul aria-expanded="false" class="collapse  first-level base-level-line">
						<li class="sidebar-item">
							<a href="form-inputs.html" class="sidebar-link">
								<span class="hide-menu">
									Penyetoran
								</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="form-inputs.html" class="sidebar-link">
								<span class="hide-menu">
									Penarikan
								</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
						<i data-feather="file-text" class="feather-icon">
						</i><span class="hide-menu">Pinjaman</span>
					</a>
					<ul aria-expanded="false" class="collapse  first-level base-level-line">
						<li class="sidebar-item">
							<a href="form-inputs.html" class="sidebar-link">
								<span class="hide-menu">
									Pengajuan
								</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="form-inputs.html" class="sidebar-link">
								<span class="hide-menu">
									Pembayaran
								</span>
							</a>
						</li>
					</ul>
				</li>

				<li class="list-divider"></li>
				<li class="nav-small-cap"><span class="hide-menu">Laporan</span></li>
				<li class="sidebar-item">
					<a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
						<i data-feather="book" class="feather-icon"></i>
						<span class="hide-menu">
							Laporan
						</span>
					</a>
					<ul aria-expanded="false" class="collapse first-level base-level-line">
						<li class="sidebar-item">
							<a href="icon-fontawesome.html" class="sidebar-link">
								<span class="hide-menu"> Jurnal Umum </span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="icon-fontawesome.html" class="sidebar-link">
								<span class="hide-menu"> Buku Besar </span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="icon-fontawesome.html" class="sidebar-link">
								<span class="hide-menu"> Kartu Simpanan</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="icon-fontawesome.html" class="sidebar-link">
								<span class="hide-menu"> SHU</span>
							</a>
						</li>


					</ul>
				</li>

			</ul>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
