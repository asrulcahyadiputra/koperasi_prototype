<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center text-muted">
	This Template by <a href="https://wrappixel.com">Adminmart</a>.
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?= base_url() ?>assets/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url() ?>assets/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<!-- apps -->
<script src="<?= base_url() ?>assets/dist/js/app-style-switcher.js"></script>
<script src="<?= base_url() ?>assets/dist/js/feather.min.js"></script>
<script src="<?= base_url() ?>assets/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?= base_url() ?>assets/dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<script src="<?= base_url() ?>assets/assets/extra-libs/c3/d3.min.js"></script>
<script src="<?= base_url() ?>assets/assets/extra-libs/c3/c3.min.js"></script>
<script src="<?= base_url() ?>assets/assets/libs/chartist/dist/chartist.min.js"></script>
<script src="<?= base_url() ?>assets/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="<?= base_url() ?>assets/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?= base_url() ?>assets/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?= base_url() ?>assets/dist/js/pages/dashboards/dashboard1.min.js"></script>
<!--This page plugins -->
<script src="<?= base_url() ?>assets/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/pages/datatable/datatable-basic.init.js"></script>
<script src="<?= base_url() ?>assets/dist/js/currency.js"></script>
<script>
	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(function() {
		'use strict';
		window.addEventListener('load', function() {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
	})();
</script>


<?php if ($this->uri->segment(2) == 'penarikan') : ?>
	<!-- cek saldo untuk penarikan simpanan -->
	<script>
		$(document).ready(function() {
			$('#id_anggota').change(function() {
				var id_anggota = $('#id_anggota').val();
				var dp;
				$.ajax({
					url: '<?= site_url('transaksi/penarikan/find_saldo') ?>',
					type: 'POST',
					dataType: 'JSON',
					data: {
						id_anggota: id_anggota,
					},
					success: function(data) {
						response = data.saldo;
						saldo = new Intl.NumberFormat('ja-JP').format(response);
						$('#saldo').html('Rp ' + saldo);
					}
				});
			});
		});
	</script>
<?php endif ?>


<?php if ($this->uri->segment(2) == 'pengajuan') : ?>
	<!-- cek saldo untuk pengajuan -->
	<script>
		$(document).ready(function() {
			$('#id_anggota').change(function() {
				var id_anggota = $('#id_anggota').val();
				var dp;
				$.ajax({
					url: '<?= site_url('transaksi/penarikan/find_saldo') ?>',
					type: 'POST',
					dataType: 'JSON',
					data: {
						id_anggota: id_anggota,
					},
					success: function(data) {
						response = data.saldo * 3;
						saldo = new Intl.NumberFormat('ja-JP').format(response);
						$("#hide_limit").val(response);
						$('#limit_pinjaman').val('Rp ' + saldo);
					}
				});
			});
		});
	</script>
<?php endif ?>

</body>

</html>
