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
							<li class="breadcrumb-item"><a href="<?= site_url('master/akun') ?>">Data Anggota</a>
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
				<a href="" class="btn btn-primary" data-toggle="modal" data-target="#add-modal">
					<i data-feather="plus" class="feather-icon"></i>
					<span>Tambah Anggota</span>
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
							<table id="zero_config" class="table table-striped table-bordered no-wrap">
								<thead>
									<tr>
										<th>#</th>
										<th>Kode Akun</th>
										<th>Nama Akun</th>
										<th>Saldo Normal</th>
										<th>Header Akun</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($akun as $row) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $row['kode_akun'] ?></td>
											<td><?= $row['nama_akun'] ?></td>
											<td>
												<?php
												if ($row['saldo_normal'] == 'd') {
													echo 'Debet';
												} else {
													echo "Kredit";
												}
												?>
											</td>
											<td><?= $row['nama_sub_akun'] ?></td>
											<td>
												<a href="#" data-toggle="modal" data-target="#editModal<?= $row['kode_akun'] ?>">
													<i data-feather="edit-3" class="feather-icon"></i>
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


	<!-- Primary Header Modal -->
	<div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header modal-colored-header bg-primary">
					<h4 class="modal-title" id="primary-header-modalLabel">Tambah <?= $title ?>
					</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<form action="<?= site_url('master/akun/simpan') ?>" method="POST" class="needs-validation" novalidate>
					<div class="modal-body">
						<div class="form-group">
							<label for="nama_akun">Nama Akun</label>
							<input type="text" name="nama_akun" id="nama_akun" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="no_hp">Saldo Normal</label>
							<br>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" id="saldo_normal" name="saldo_normal" value="d" required>
								<label class="form-check-label" for="saldo_normal">Debet</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="saldo_normal" id="saldo_normal" value="k" required>
								<label class="form-check-label" for="saldo_normal">Kredit</label>
							</div>
						</div>
						<div class="form-group">
							<label for="kode_sub_akun">Header</label>
							<select name="kode_sub_akun" id="kode_sub_akun" class="form-control" required>
								<option value="">-pilih header-</option>
								<?php foreach ($subAkun as $sa) : ?>
									<option value="<?= $sa['kode_sub_akun'] ?>"><?= $sa['kode_sub_akun'] . ' ' . $sa['nama_sub_akun'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<?php foreach ($akun as $row) : ?>
		<!-- Primary Header Modal -->
		<div id="editModal<?= $row['kode_akun'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-colored-header bg-primary">
						<h4 class="modal-title" id="primary-header-modalLabel">Edit <?= $title ?>
						</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<form action="<?= site_url('master/akun/edit') ?>" method="POST" class="needs-validation" novalidate>
						<input type="hidden" value="<?= $row['kode_akun'] ?>" name="kode_akun">
						<div class="modal-body">
							<div class="form-group">
								<label for="nama_akun<?= $row['kode_akun'] ?>">Nama Akun</label>
								<input type="text" name="nama_akun" id="nama_akun<?= $row['kode_akun'] ?>" class="form-control" value="<?= $row['nama_akun'] ?>" required>
							</div>
							<div class="form-group">
								<label for="no_hp">Saldo Normal</label>
								<br>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" id="saldo_normal" name="saldo_normal" value="d" required>
									<label class="form-check-label" for="saldo_normal">Debet</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="saldo_normal" id="saldo_normal" value="k" required>
									<label class="form-check-label" for="saldo_normal">Kredit</label>
								</div>
							</div>
							<div class="form-group">
								<label for="kode_sub_akun">Header</label>
								<select name="kode_sub_akun" id="kode_sub_akun" class="form-control" required>
									<option value="">-pilih header-</option>
									<?php foreach ($subAkun as $sa) : ?>
										<option value="<?= $sa['kode_sub_akun'] ?>"><?= $sa['kode_sub_akun'] . ' ' . $sa['nama_sub_akun'] ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<?php endforeach ?>
	<?php $this->load->view('_partials/footer'); ?>
