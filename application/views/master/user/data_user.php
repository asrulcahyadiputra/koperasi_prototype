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
							<li class="breadcrumb-item"><a href="<?= site_url('master/user') ?>">Data User</a>
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
					<span>Tambah User</span>
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
						<strong>Oopps !</strong> <?= $this->session->flashdata('warning') ?>
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
										<th>ID User</th>
										<th>Username</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($user as $row) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $row['id_user'] ?></td>
											<td><?= $row['username'] ?></td>
											<td>
												<span class=" <?= $row['is_active'] == 1 ? 'text-success' : 'text-danger' ?> text-success">
													<?= $row['is_active'] == 1 ? 'Aktif' : 'Tidak Aktif' ?>
												</span>
											</td>
											<td>
												<?php if ($row['is_active'] == 1) : ?>
													<a href="<?= site_url('master/user/status/' . $row['id_user'] . '/' . $row['is_active']) ?>">
														<i data-feather="lock" onclick="return confirm('User akan di Non Aktfkan, apakah anda yakin ?')" class="feather-icon"></i>
													</a>
												<?php endif ?>
												<?php if ($row['is_active'] == 0) : ?>
													<a href="<?= site_url('master/user/status/' . $row['id_user'] . '/' . $row['is_active']) ?>">
														<i data-feather="unlock" onclick="return confirm('User akan di Aktfkan, apakah anda yakin ?')" class="feather-icon"></i>
													</a>
												<?php endif ?>

												<a href="<?= site_url('master/user/hapus/' . $row['id_user']) ?>" class="text-danger" onclick="return confirm('Data Tidak Dapat Dikembalikan, Anda Yakin ?')">
													<i data-feather="trash-2" class="feather-icon"></i>
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
				<form action="<?= site_url('master/user/simpan') ?>" method="POST" class="needs-validation" novalidate>
					<div class="modal-body">
						<div class="alert alert-warning" role="alert">
							Password Default adalah (123456)
						</div>
						<div class="form-group">
							<label for="id_pegawai">Pegawai</label>
							<select name="id_pegawai" id="id_pegawai" class="form-control">
								<option value="">-pilih-</option>
								<?php foreach ($pegawai as $pg) : ?>
									<option value="<?= $pg['id_pegawai'] ?>"><?= $pg['id_pegawai'] . ' - ' . $pg['nama_pegawai'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Tambahkan</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


	<?php $this->load->view('_partials/footer'); ?>
