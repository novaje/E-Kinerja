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
									<i class="fa fa-user-circle icon-title"></i>&nbsp; SDM
								</h3>
								<nav aria-label="breadcrumb" role="navigation" style="margin-top: -25px;">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
										<li class="breadcrumb-item" aria-current="page">SDM</li>
										<li class="breadcrumb-item active" aria-current="page">Nama Pegawai</li>
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
									<h4 class="card-title card-title-dash">Data Pegawai</h4>
								</div>
								<div>
									<!-- Tambah Data Pegawai -->
									<a href="add_rad.php" target="_blank" class="btn btn-primary oke-primary" title="Tambah Uraian">
									<h4>Tambah Uraian Tugas</h4><i class="fa-solid fa-pen-to-square"></i> 
									</a>
								</div>
							</div>
							<div class="table-responsive  mt-1">
								<table class="table select-table">
									<thead>
										<tr>
											<th>#</th>
											<th style="text-align: center;">Username</th>
											<th style="text-align: center;">Identitas</th>
											<th style="text-align: center;">Departemen</th>
											<th style="text-align: center;">Jabatan</th>
											<th style="text-align: center;">Role</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$con=mysqli_connect("localhost","root","","db_hospital");
										if (mysqli_connect_errno())
										{
											echo "Failed to connect to MySQL: " . mysqli_connect_error();
										}

										$result = mysqli_query($con,"SELECT *,a.id AS id_US FROM tb_users AS a LEFT JOIN tb_pegawai As b ON a.username=b.NIP ORDER BY b.NIP DESC LIMIT 50");   
										if(mysqli_num_rows($result)>0){
											$no=0;
											while($row = mysqli_fetch_array($result))
											{	

												if ($row['role'] == 'Super Admin') {
													$sRole = "<div class='badge badge-opacity-danger'>Super Admin</div>";
												} else if ($row['role'] == 'Bagian SDM') {
													$sRole = "<div class='badge badge-opacity-info'>Bagian SDM</div>";
												} else if ($row['role'] == 'Kepala Instalasi') {
													$sRole = "<div class='badge badge-opacity-success'>Kepala Instalasi</div>";
												} else if ($row['role'] == 'Radiologi') {
													$sRole = "<div class='badge badge-opacity-info'>Radiologi</div>";
												} else if ($row['role'] == 'Farmasi') {
													$srole = "<div class='badge badge-opacity-success'>Farmasi</div>";
												} else if ($row['role'] == 'Sakura A') {
													$srole = "<div class='badge badge-opacity-info'>Sakura A</div>";
												} else if ($row['role'] == 'Mawar A') {
													$srole = "<div class='badge badge-opacity-success'>Mawar A</div>";
												} else if ($row['role'] == 'Mawar B') {
													$srole = "<div class='badge badge-opacity-info'>Mawar B</div>";
												} else if ($row['role'] == 'Anggrek') {
													$srole = "<div class='badge badge-opacity-success'>Anggrek</div>";
												}

												$no++;
												echo "<tr>";
												echo "<td>" . $no . ".</td>";
												echo "<td style='text-align: center;'><h6>" . $row['username'] . "</h6></td>";
												echo "<td style='text-align: center;'><h6>" . $row['nama_lengkap'] . "</h6></td>";
												echo "<td style='text-align: center;'><h6>" . $row['departemen'] . "</h6></td>";
												echo "<td style='text-align: center;'><h6>" . $row['jabatan'] . "</h6></td>";
												echo "<td style='text-align: center;'><h6>" . $row['role'] . "</h6></td>";       
												echo "</tr>";
											?>
											<!-- <tr>
												<td>
													<h6>Company name 1</h6>
													<p>company type</p>
												</td>
												<td>
													<div>
														<div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
															<p class="text-success">79%</p>
															<p>85/162</p>
														</div>
														<div class="progress progress-md">
															<div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
												</td>
												<td><div class="badge badge-opacity-warning">In progress</div></td>
											</tr> -->

					                    <?php }
					                    } else {
					                      echo "<tr>";
					                      echo "<td colspan='4' align='center'><b><i>" . "No Available Record" . "</i></b></td>";
					                      echo "</tr>";
					                    }  mysqli_close($con); 
					                    ?>
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
	if (window?.location?.href?.indexOf('InputSuccess') > -1) {
		Swal.fire({
			title: 'Data Berhasil Disimpan!',
			icon: 'success',
			text: 'Data anda telah disimpan kedalam sistem E-Kinerja!',
		})
		history.replaceState({}, '', './radiologi.php');
	}

	if (window?.location?.href?.indexOf('InputFailed') > -1) {
		Swal.fire({
			title: 'Terjadi Kesalahan!',
			icon: 'error',
			text: 'Periksa kembali data yang anda input!',
		})
		history.replaceState({}, '', './radiologi.php');
	}
</script>