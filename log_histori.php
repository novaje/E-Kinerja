<!-- Head -->
<?php include 'include/session.php'; ?>
<?php include 'include/head.php'; ?>
<div class="container-scroller">
	<!-- Header -->
	<?php include 'include/header.php'; ?> 
	<div class="container-fluid page-body-wrapper">
		<!-- Sidebar -->
		<?php include 'include/sidebar.php'; ?> 
		<div class="main-panel">
			<div class="content-wrapper">
				<div class="row">
					<div class="col-sm-12">
						<div class="home-tab">
							<!-- Page -->
							<div class="row">
								<div class="col-lg-12">
									<h3 class="page-header">
										<i class="menu-icon fas fa-history icon-title"></i>&nbsp; Log Histori
									</h3>
									<nav aria-label="breadcrumb" role="navigation" style="margin-top: -25px;">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
											<li class="breadcrumb-item active" aria-current="page">Log Histori</li>
										</ol>
									</nav>
								</div>
							</div>
							<!-- End Page -->
						</div>
					</div>
				</div>

				<div class="row flex-grow">
					<div class="col-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<div class="d-sm-flex justify-content-between align-items-start">
									<div>
										<h4 class="card-title card-title-dash">Data Log Histori</h4>
									</div>
								</div>
								<div class="table-responsive  mt-1">
									<table class="table select-table">
										<thead>
											<tr>
												<th>#</th>
												<th style="text-align: center;">Username</th>
												<th style="text-align: center;">Log Type</th>
												<th style="text-align: center;">Log Date</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$con=mysqli_connect("localhost","root","","db_hospital");
											if (mysqli_connect_errno())
											{
												echo "Failed to connect to MySQL: " . mysqli_connect_error();
											}
											$myUser = $access['username'];
											$result = mysqli_query($con,"SELECT * FROM tb_log ORDER BY log_id DESC LIMIT 50");   
											if(mysqli_num_rows($result)>0){
												$no=0;
												while($row = mysqli_fetch_array($result))
												{
												$no++;
											?>
												<tr>
													<td><?= $no ?>.</td>
													<td style="text-align: center;"><?= $row['log_user'] ?></td>
													<td style="text-align: center;"><?= $row['log_type'] ?></td>
													<td style="text-align: center;"><?= $row['log_date'] ?></td>
												</tr>
											<?php } ?> 
											<?php } else { ?>
											<tr>
												<td colspan="4" style="text-align: center;"><b>
													<br>
													<i>Tidak Ada Data</i></b>
												</td>
											</tr>
											<?php }  mysqli_close($con); ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Footer -->
			<?php include 'include/footer.php'; ?> 
		</div>
	</div>
	<!-- JS -->
	<?php include 'include/jsscript.php'; ?> 
	<script type="text/javascript">
		// HAPUS
		function HapusData(NIP) {
            var r = confirm("Anda yakin ingin menghapus data ini?");
            if (r == true) {
                location.href = "man_pengguna_delete.php?NIP=" + NIP;
            }
        }
		// CREATE
		if (window?.location?.href?.indexOf('InputSuccess') > -1) {
			Swal.fire({
				title: 'Data Berhasil Disimpan!',
				icon: 'success',
				text: 'Data anda telah disimpan pada sistem E-Kinerja!',
			})
			history.replaceState({}, '', './man_pengguna.php');
		}

		if (window?.location?.href?.indexOf('InputFailed') > -1) {
			Swal.fire({
				title: 'Terjadi Kesalahan!',
				icon: 'error',
				text: 'Periksa kembali data yang anda input!',
			})
			history.replaceState({}, '', './man_pengguna.php');
		}

		// UPDATE
		if (window?.location?.href?.indexOf('UpdateSuccess') > -1) {
			Swal.fire({
				title: 'Data Berhasil Diupdate!',
				icon: 'success',
				text: 'Data anda telah diupdate pada sistem E-Kinerja!',
			})
			history.replaceState({}, '', './man_pengguna.php');
		}

		if (window?.location?.href?.indexOf('UpdateFailed') > -1) {
			Swal.fire({
				title: 'Terjadi Kesalahan!',
				icon: 'error',
				text: 'Periksa kembali data yang anda input!',
			})
			history.replaceState({}, '', './man_pengguna.php');
		}

		// DELETE
		if (window?.location?.href?.indexOf('DeleteSuccess') > -1) {
			Swal.fire({
				title: 'Data Berhasil Dihapus!',
				icon: 'info',
				text: 'Data telah di hapus pada sistem E-Kinerja!',
			})
			history.replaceState({}, '', './man_pengguna.php');
		}

		if (window?.location?.href?.indexOf('DeleteFailed') > -1) {
			Swal.fire({
				title: 'Terjadi Kesalahan!',
				icon: 'error',
				text: 'Hubungi Administrator!',
			})
			history.replaceState({}, '', './man_pengguna.php');
		}
	</script>