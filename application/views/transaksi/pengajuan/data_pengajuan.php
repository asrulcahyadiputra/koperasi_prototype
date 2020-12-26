<?php $this->load->view('_partials/header'); ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title text-truncate text-dark font-weight-medium mb-1"><?= $title ?></h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Dashboard</a>
							</li>
							<li class="breadcrumb-item"><a href="<?= site_url('transaksi/penarikan') ?>"><?= $title ?></a>
							</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->

	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">
		<!-- basic table -->
		<div class="row">
			<div class="col-12 mb-2">
				<a href="<?= site_url('transaksi/pengajuan/buat') ?>" class="btn btn-primary">
					<i data-feather="plus" class="feather-icon"></i>
					<span>Buat Pengajuan Baru</span>
				</a>

				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success alert-dismissible fade show mt-3 col-md-12" role="alert">
						<strong>Berhasil !</strong> <?= $this->session->flashdata('success') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif ?>
				<?php if ($this->session->flashdata('error')) : ?>
					<div class="alert alert-danger alert-dismissible fade show mt-3 col-md-12" role="alert">
						<strong>Gagal !</strong> <?= $this->session->flashdata('error') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif ?>
				<?php if ($this->session->flashdata('warning')) : ?>
					<div class="alert alert-warning alert-dismissible fade show mt-3 col-md-12" role="alert">
						<strong>Peringatan !</strong> <?= $this->session->flashdata('warning') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif ?>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="zero_config" class="table table-sm table-striped table-bordered no-wrap">
								<thead>
									<tr>
										<th>#</th>
										<th>No Pengajuan</th>
										<th>Tanggal</th>
										<th>Anggota</th>
										<th>Total Pengajuan</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($transaksi as $t) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $t['id_transaksi'] ?></td>
											<td><?= date('d-m-Y', strtotime($t['tanggal'])) ?></td>
											<td><?= $t['id_anggota'] . ' ' . $t['nama_anggota'] ?></td>
											<td><?= nominal($t['total']) ?></td>
											<td>
												<?php if ($t['status'] == 0) : ?>
													<span class="text-warning">
														Belum Disetujui
													</span>
												<?php endif ?>
												<?php if ($t['status'] == 1) : ?>
													<span class="text-success">
														Disetujui
													</span>
												<?php endif ?>
												<?php if ($t['status'] == 2) : ?>
													<span class="text-danger">
														Ditolak
													</span>
												<?php endif ?>
											</td>
											<td>
												<a href="<?= site_url('transaksi/pengajuan/detail/' . $t['id_transaksi']) ?>" class="btn btn-info btn-sm">
													<i data-feather="list" class="feather-icon"></i>
												</a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Container fluid  -->
	<!-- ============================================================== -->
	<?php $this->load->view('_partials/footer'); ?>
