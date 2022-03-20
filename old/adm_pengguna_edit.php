<!-- Head -->
<?php
include "include/connection.php";
include 'include/session.php';
include 'include/head.php'; 
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * 
	FROM tb_users AS a
	LEFT JOIN tb_pegawai As b ON a.username=b.NIP
	WHERE a.username='$cekNIP'
	AND a.role='$cekHakAkses'");
$date = mysqli_fetch_array($result);

// CREATE
if(isset($_POST["edit"]))    
{    
	$cekNIP =  $_POST['NIP'];
	$cekHakAkses =  $_POST['HakAkses'];
	$con=mysqli_connect("localhost","root","","db_hospital");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($con,"SELECT * 
		FROM tb_users AS a
		LEFT JOIN tb_pegawai As b ON a.username=b.NIP
		WHERE a.username='$cekNIP'
		AND a.role='$cekHakAkses'");
	$vald_d = mysqli_fetch_array($result);

	if ($vald_d != NULL){
		header("Location: ./adm_pengguna.php?InputFailed=true");                                                  
	} else {

		// tb_user
		$username             = $_POST['NIP'];
		$password             = 'changeme';
		$role             	  = $_POST['HakAkses'];
		$dibuatTgl            = date('Y-m-d h:m:i');
		$dibuatby             = $_SESSION['username'];
		// tb_pegawai
		$NIP                  = $_POST['NIP'];
		$NamaLengkap          = $_POST['NamaLengkap'];
		$TempatLahir          = $_POST['TempatLahir'];
		$TglLahir             = $_POST['TglLahir'];
		$Usia                 = $_POST['Usia'];
		$JenisKelamin         = $_POST['JenisKelamin'];
		$Agama                = $_POST['Agama'];
		$Alamat               = $_POST['Alamat'];
		$NoHP                 = $_POST['NoHP'];
		$Email                = $_POST['Email'];
		$Departemen           = $_POST['Departemen'];
		$Jabatan              = $_POST['Jabatan'];
		$TglMasuk             = $_POST['TglMasuk'];

		$query = mysql_query("INSERT INTO tb_users
			(id,username,password,role,dibuatTgl,dibuatBy)
			VALUES
			('','$username','$password','$role','$dibuatTgl','$dibuatby')");

		$query .= mysql_query("INSERT INTO tb_pegawai
			(id,NIP,nama_lengkap,tempat_lahir,tgl_lahir,usia,jenis_kelamin,agama,alamat,no_hp,email,departemen,jabatan,join_tgl)
			VALUES
			('','$NIP','$NamaLengkap','$TempatLahir','$TglLahir','$Usia','$JenisKelamin','$Agama','$Alamat','$NoHP','$Email','$Departemen','$Jabatan','$TglMasuk')");

		if($query) {
			header("Location: ./adm_pengguna.php?InputSuccess=true");                                           
		} else {
			header("Location: ./adm_pengguna.php?InputFailed=true");                                                  
		}
	}

}
?>
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
										<i class="fa fa-user-circle icon-title"></i> Kepegawaian
									</h3>
									<nav aria-label="breadcrumb" role="navigation" style="margin-top: -25px;">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
											<li class="breadcrumb-item" aria-current="page">Kepegawaian</li>
											<li class="breadcrumb-item active" aria-current="page">Pengguna</li>
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
								<div class="d-sm-flex justify-content-between">
									<div>
										<h4 class="card-title card-title-dash">[Tambah Data] Pengguna</h4>
										<p class="card-subtitle card-subtitle-dash">Tanggal: <?= tanggal_indo(date('Y-m-d'), TRUE);?></p>
									</div>
									<div>
										<!-- Tambah Data Pengguna -->
										<a href="adm_pengguna.php" class="btn btn-primary oke-primary" title="Tambah Pengguna">
											Kembali
										</a>
									</div>
								</div>
								<hr>
								<form class="form-sample" method="post" action="">
									<p class="card-description">
										Data Personal
									</p>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>NIP</label>
												<input type="text" class="form-control" name="NIP"/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Nama Lengkap</label>
												<input type="text" class="form-control" name="NamaLengkap"/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Hak Akses</label>
												<select class="form-control" name="HakAkses">
													<option>-- Pilih Hak Akses --</option>
													<option value="Super Admin">Super Admin</option>
													<option value="Admin">Admin</option>
													<option value="Pegawai">Pegawai</option>
													<option value="Tamu">Tamu</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Tempat Lahir</label>
												<input type="text" class="form-control" name="TempatLahir"/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Tanggal Lahir</label>
												<input type="date" class="form-control" name="TglLahir"/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Usia</label>
												<input type="number" class="form-control" name="Usia"/>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Jenis Kelamin</label>
												<select class="form-control" name="JenisKelamin">
													<option>-- Pilih Jenis Kelamin --</option>
													<option value="Pria">Pria</option>
													<option value="Wanita">Wanita</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Agama</label>
												<select class="form-control" name="Agama">
													<option>-- Pilih Agama --</option>
													<option value="Islam">Islam</option>
													<option value="Protestan">Protestan</option>
													<option value="Katolik">Katolik</option>
													<option value="Hindu">Hindu</option>
													<option value="Buddha">Buddha</option>
													<option value="Khonghucu">Khonghucu</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Alamat Tinggal</label>
												<textarea type="text" class="form-control" name="Alamat"></textarea>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>No. HP</label>
												<input type="number" class="form-control" name="NoHP"/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Email</label>
												<input type="email" class="form-control" name="Email"/>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Departemen</label>
												<input type="text" class="form-control" name="Departemen"/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Jabatan</label>
												<input type="text" class="form-control" name="Jabatan"/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Masuk Tanggal</label>
												<input type="date" class="form-control" name="TglMasuk"/>
											</div>
										</div>
									</div>
									<hr>
									<div class="row" style="display: grid;justify-content: flex-end;">
										<div class="col-md-4">
											<button type="submit" class="btn btn-primary" name="create" title="Simpan Data"><i class="fa fa-save"></i></button>
										</div>
									</div>
								</form>
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
	<!-- Sign in Success -->
	<script type="text/javascript">
		if (window?.location?.href?.indexOf('SignInsuccess') > -1) {
			Swal.fire({
				title: 'Sign In Success!',
				icon: 'success',
				text: 'Selamat Datang di Aplikasi E-Kinerja!',
			})
			history.replaceState({}, '', './index.php');
		}
	</script>