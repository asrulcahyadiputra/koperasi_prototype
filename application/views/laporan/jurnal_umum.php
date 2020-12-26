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
							<li class="breadcrumb-item"><a href="<?= site_url('laporan/jurnal_umum') ?>"><?= $title ?></a>
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
				<form method="POST" action="<?= site_url('laporan/jurnal_umum') ?>" class="form-inline">
					<label class="sr-only" for="inlineFormInputName2">Periode</label>
					<input type="month" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="periode">

					<button type="submit" class="btn btn-primary mb-2">Tampilkan</button>
				</form>
				<div class="card">
					<div class="card-header text-center">
						<h3>Jurnal Umum</h3>
						<h4>Periode : <?= bulan($month) . ' ' . $year ?></h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table  table-bordered no-wrap">
								<thead>
									<tr>
										<th>Tanggal</th>
										<th>Akun</th>
										<th>Ref</th>
										<th>Debet</th>
										<th>Kredit</th>
									</tr>
								</thead>
								<tbody>
								<tbody>
									<?php foreach ($row_jurnal as $r1) : ?>
										<tr>
											<td rowspan="<?= $r1['row_gl'] + 1 ?>"><?= date('d-m-Y', strtotime($r1['tanggal'])) ?></td>
										</tr>
										<?php foreach ($jurnal as $r2) : ?>
											<?php if ($r1['id_transaksi'] == $r2['id_transaksi']) : ?>
												<tr>
													<?php if ($r2['posisi'] == 'd') : ?>
														<td><?= $r2['kode_akun'] . ' ' . $r2['nama_akun'] ?></td>
													<?php endif ?>
													<?php if ($r2['posisi'] == 'k') : ?>
														<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $r2['kode_akun'] . ' ' . $r2['nama_akun'] ?></td>
													<?php endif ?>
													<td><?= $r2['id_transaksi'] ?></td>
													<td>
														<span class="text-left">Rp</span>
														<span style="float:right;">
															<?php
															if ($r2['posisi'] == 'd') {
																echo nominal1($r2['nominal']);
															} else {
																echo "-";
															}
															?>
														</span>
													</td>
													<td>
														<span class="text-left">Rp</span>
														<span style="float:right;">
															<?php
															if ($r2['posisi'] == 'k') {
																echo nominal1($r2['nominal']);
															} else {
																echo "-";
															} ?>
														</span>
													</td>
												</tr>
											<?php endif ?>
										<?php endforeach ?>
									<?php endforeach ?>
								</tbody>
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
