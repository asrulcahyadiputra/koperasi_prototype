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
							<li class="breadcrumb-item"><a href="<?= site_url('master/anggota') ?>">Data Anggota</a>
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
										<th>No Anggota</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th>No Hp</th>
										<th>Email</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($anggota as $row) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $row['id_anggota'] ?></td>
											<td><?= $row['nama_anggota'] ?></td>
											<td><?= $row['alamat_anggota'] ?></td>
											<td><?= $row['no_hp'] ?></td>
											<td><?= $row['email'] ?></td>
											<td>
												<a href="#" data-toggle="modal" data-target="#editModal<?= $row['id_anggota'] ?>">
													<i data-feather="edit-3" class="feather-icon"></i>
												</a>

												<a href="<?= site_url('master/anggota/hapus/' . $row['id_anggota']) ?>" class="text-danger" onclick="return confirm('Data Tidak Dapat Dikembalikan, Anda Yakin ?')">
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
				<form action="<?= site_url('master/anggota/simpan') ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="nama_anggota">Nama Anggota</label>
							<input type="text" name="nama_anggota" id="nama_anggota" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="no_hp">No Hp</label>
							<input type="text" minlength="6" maxlength="13" name="no_hp" id="no_hp" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" id="email" class="form-control">
						</div>
						<div class="form-group">
							<label for="alamat_anggota">Alamat</label>
							<textarea name="alamat_anggota" id="alamat_anggota" cols="30" rows="5" class="form-control"></textarea>
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

	<?php foreach ($anggota as $row) : ?>
		<!-- Primary Header Modal -->
		<div id="editModal<?= $row['id_anggota'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-colored-header bg-primary">
						<h4 class="modal-title" id="primary-header-modalLabel">Edit <?= $title ?>
						</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<form action="<?= site_url('master/anggota/edit') ?>" method="POST">
						<input type="hidden" value="<?= $row['id_anggota'] ?>" name="id_anggota">
						<div class="modal-body">
							<div class="form-group">
								<label for="nama_anggota<?= $row['id_anggota'] ?>">Nama Anggota</label>
								<input type="text" name="nama_anggota" id="nama_anggota<?= $row['id_anggota'] ?>" class="form-control" value="<?= $row['nama_anggota'] ?>" required>
							</div>
							<div class="form-group">
								<label for="no_hp<?= $row['id_anggota'] ?>">No Hp</label>
								<input type="text" minlength="6" maxlength="13" name="no_hp" id="no_hp<?= $row['id_anggota'] ?>" class="form-control" value="<?= $row['no_hp'] ?>" required>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" id="email<?= $row['id_anggota'] ?>" class="form-control" value="<?= $row['email'] ?>">
							</div>
							<div class="form-group">
								<label for="alamat_anggota">Alamat</label>
								<textarea name="alamat_anggota" id="alamat_anggota<?= $row['id_anggota'] ?>" cols="30" rows="5" class="form-control"><?= $row['alamat_anggota'] ?></textarea>
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
