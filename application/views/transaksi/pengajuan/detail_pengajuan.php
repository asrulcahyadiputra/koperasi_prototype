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
						<div class="table-responsive">
							<table class="table tablle-sm">
								<tr>
									<td style="width: 20%;">No</td>
									<td>: <?= $transaksi['id_transaksi'] ?></td>
									<td style="width: 20%;">Total</td>
									<td>: <?= nominal2($transaksi['total']) ?></td>
								</tr>
								<tr>
									<td style="width: 20%;">Tanggal Pengajuan</td>
									<td>: <?= date('d-m-Y', strtotime($transaksi['tanggal'])) ?></td>
									<td style="width: 20%;">Lama Angsuran</td>
									<td>: <?= $transaksi['lama_angsuran'] ?></td>
								</tr>
								<tr>
									<td style="width: 20%;">Anggota</td>
									<td>: <?= $transaksi['id_anggota'] . ' ' . $transaksi['nama_anggota'] ?></td>
									<td style="width: 20%;">Bunga Pinjaman</td>
									<td>: <?= $transaksi['bunga_pinjaman'] * 100 . ' %/Bulan' ?></td>
								</tr>


							</table>
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th class="text-center">Angsuran Ke</th>
										<th>Angsuran Pokok</th>
										<th>Angsuran Bunga</th>
										<th>Total Angsuran</th>
										<th>Sisa</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center">0</td>
										<td></td>
										<td></td>
										<td></td>
										<td>
											<span class="text-left">Rp</span>
											<span style="float:right;">
												<?= nominal3($transaksi['total']) ?>
											</span>
										</td>
									</tr>
									<?php
									$t_pinjaman = $transaksi['total'];
									$ap = 0;
									$ab = 0;
									$a = 0;
									$sisa = 0;
									foreach ($pinjaman as  $p) : ?>
										<tr>
											<td class="text-center"><?= $p['bulan_ke'] ?></td>
											<td>
												<span class="text-left">Rp</span>
												<span style="float:right;">
													<?php $ap = $ap + $p['angsuran_pokok'] ?>
													<?= nominal3($p['angsuran_pokok']) ?>
												</span>
											</td>
											<td>
												<span class="text-left">Rp</span>
												<span style="float:right;">
													<?php $ab = $ab + $p['angsuran_bunga'] ?>
													<?= nominal3($p['angsuran_bunga']) ?>
												</span>
											</td>
											<td>
												<span class="text-left">Rp</span>
												<span style="float:right;">
													<?php $a = $a + $p['angsuran'] ?>
													<?= nominal3($p['angsuran']) ?>
												</span>
											</td>
											<td>
												<span class="text-left">Rp</span>
												<span style="float:right;">
													<?= nominal3($sisa = $t_pinjaman - $ap) ?>
												</span>
											</td>
										</tr>
									<?php endforeach ?>
									<tr>
										<td></td>
										<td>
											<span class="text-left">Rp</span>
											<span style="float:right;">
												<?= nominal3($ap) ?>
											</span>
										</td>
										<td>
											<span class="text-left">Rp</span>
											<span style="float:right;">
												<?= nominal3($ab) ?>
											</span>
										</td>
										<td>
											<span class="text-left">Rp</span>
											<span style="float:right;">
												<?= nominal3($a) ?>
											</span>
										</td>
										<td></td>
									</tr>
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
