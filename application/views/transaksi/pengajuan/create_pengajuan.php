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
							<li class="breadcrumb-item"><a href="<?= site_url('transaksi/pengajuan') ?>">Pengajuan Pinjaman</a>
							</li>
							<li class="breadcrumb-item"><?= $title ?></a>
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
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= site_url('transaksi/pengajuan/simpan') ?>">
							<div class="form-group row">
								<label for="id_anggota" class="col-sm-2 col-form-label">Anggota</label>
								<div class="col-sm-10">
									<select name="id_anggota" id="id_anggota" class="form-control">
										<option value="">-pilih anggota-</option>
										<?php foreach ($anggota as $ag) : ?>
											<option value="<?= $ag['id_anggota'] ?>"><?= $ag['id_anggota'] . ' ' . $ag['nama_anggota'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="limit_pinjaman" class="col-sm-2 col-form-label">Limit Pinjaman</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="limit_pinjaman" value="" name="limit_pinjaman" readonly>
									<input type="hidden" class="form-control" id="hide_limit" value="" name="hide_limit" readonly>
								</div>
							</div>
							<div class="form-group row">
								<label for="total_pinjaman" class="col-sm-2 col-form-label">Total Pinjaman</label>
								<div class="col-sm-10">
									<select name="total_pinjaman" id="total_pinjaman" class="form-control">
										<option value="10">10%</option>
										<option value="20">20%</option>
										<option value="30">30%</option>
										<option value="40">40%</option>
										<option value="50">50%</option>
										<option value="60">60%</option>
										<option value="70">70%</option>
										<option value="80">80%</option>
										<option value="90">90%</option>
										<option value="100%">100%</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="angsuran" class="col-sm-2 col-form-label">Lama Angsuran</label>
								<div class="col-sm-10">
									<select name="angsuran" id="angsuran" class="form-control">
										<?php for ($i = 1; $i <= 36; $i++) : ?>
											<option value="<?= $i ?>"><?= $i . ' X' ?></option>
										<?php endfor ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12 text-right">
									<button type="submit" class="btn btn-primary">Ajukan</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Container fluid  -->
	<!-- ============================================================== -->
	<?php $this->load->view('_partials/footer'); ?>
