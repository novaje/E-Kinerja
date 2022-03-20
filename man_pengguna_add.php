<!-- Head -->
<?php
include "include/connection.php";
include 'include/session.php';
include 'include/head.php'; 

// CREATE
if(isset($_POST["create"]))    
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
		header("Location: ./man_pengguna.php?InputFailed=true");                                                  
	} else {

		if ($_POST['able_add'] == NULL){
			$add = '0';
		} else {
			$add = '1';
		}

		if ($_POST['able_edit'] == NULL){
			$edit = '0';
		} else {
			$edit = '1';
		}

		if ($_POST['able_delete'] == NULL){
			$delete = '0';
		} else {
			$delete = '1';
		}

		// tb_user
		$username             = $_POST['NIP'];
		$password             = 'changeme';
		$role             	  = $_POST['HakAkses'];
		$dibuatTgl            = date('Y-m-d h:m:i');
		$dibuatby             = $_SESSION['username'];
		$able_add             = $add;
		$able_edit            = $edit;
		$able_delete          = $delete;
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
		$status               = $_POST['status'];

		$nama = $_FILES['foto']['name'];
		$file_tmp = $_FILES['foto']['tmp_name'];

		move_uploaded_file($file_tmp, './assets/user/'.$nama);

		$query = mysql_query("INSERT INTO tb_users
			(id,username,password,role,dibuatTgl,dibuatBy,able_add,able_edit,able_delete)
			VALUES
			('','$username','$password','$role','$dibuatTgl','$dibuatby','$able_add','$able_edit','$able_delete')");

		$query = mysql_query("INSERT INTO tb_pegawai
			(id,NIP,foto,nama_lengkap,tempat_lahir,tgl_lahir,usia,jenis_kelamin,agama,alamat,no_hp,email,departemen,jabatan,join_tgl,status)
			VALUES
			('','$NIP','$nama','$NamaLengkap','$TempatLahir','$TglLahir','$Usia','$JenisKelamin','$Agama','$Alamat','$NoHP','$Email','$Departemen','$Jabatan','$TglMasuk','$status')");

		if($query) {
			header("Location: ./man_pengguna.php?InputSuccess=true");                                           
		} else {
			header("Location: ./man_pengguna.php?InputFailed=true");                                                  
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
										<i class="menu-icon fas fa-hospital-user icon-title"></i>&nbsp; Bagian SDM
									</h3>
									<nav aria-label="breadcrumb" role="navigation" style="margin-top: -25px;">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
											<li class="breadcrumb-item" aria-current="page">Bagian SDM</li>
											<li class="breadcrumb-item active" aria-current="page">Manajemen Pengguna [Tambah Data]</li>
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
										<h4 class="card-title card-title-dash">[Tambah Data] Manajemen Pengguna</h4>
										<p class="card-subtitle card-subtitle-dash">Tanggal: <?= tanggal_indo(date('Y-m-d'), TRUE);?></p>
									</div>
									<div>
										<!-- Tambah Data Pegawai -->
										<a href="man_pengguna.php" class="btn btn-primary oke-primary" title="Kembali">
											Kembali
										</a>
									</div>
								</div>
								<hr>
								<form class="form-sample" method="post" enctype="multipart/form-data">
									<p class="card-description">
										Data Personal
									</p>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Upload Foto <font style="color: red;">*</font></label>
												<input type="file" class="form-control" name="foto" required/>
												<input type="hidden" name="status" value="0" />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>NIP <font style="color: red;">*</font></label>
												<input type="text" class="form-control" name="NIP" placeholder="Isi NIP..." required/>
												<font style="font-size: 10px;"><i>NIP sama dengan Username pengguna untuk login ke dalam sistem</i></font>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Nama Lengkap <font style="color: red;">*</font></label>
												<input type="text" class="form-control" name="NamaLengkap" placeholder="Isi Nama Lengkap..." required/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Hak Akses <font style="color: red;">*</font></label>
												<select class="form-control" name="HakAkses" required>
													<option>-- Pilih Hak Akses --</option>
													<option value="Super Admin">Super Admin</option>
													<option value="Bagian SDM">Bagian SDM</option>
													<option value="Kepala Instalasi">Kepala Instalasi</option>
													<option value="Kepala Ruangan">Kepala Ruangan</option>
													<option value="Perawat">Perawat</option>
													<option value="Pegawai">Pegawai</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Tempat Lahir <font style="color: red;">*</font></label>
												<input type="text" class="form-control" name="TempatLahir" placeholder="Isi Tempat Lahir" required/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Tanggal Lahir <font style="color: red;">*</font></label>
												<input type="date" class="form-control" name="TglLahir" required/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Usia</label>
												<input type="number" class="form-control" name="Usia" placeholder="Isi Usia" />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Jenis Kelamin <font style="color: red;">*</font></label>
												<select class="form-control" name="JenisKelamin" required>
													<option>-- Pilih Jenis Kelamin --</option>
													<option value="Pria">Pria</option>
													<option value="Wanita">Wanita</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Agama <font style="color: red;">*</font></label>
												<select class="form-control" name="Agama" required>
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
												<label>Alamat Tinggal <font style="color: red;">*</font></label>
												<textarea type="text" class="form-control" name="Alamat" placeholder="Isi Alamat Tinggal" required></textarea>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>No. HP <font style="color: red;">*</font></label>
												<input type="number" class="form-control" name="NoHP" placeholder="Isi No. Hp" required/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Email</label>
												<input type="email" class="form-control" name="Email" placeholder="Isi Email... ex: @domain.com" />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Departemen <font style="color: red;">*</font></label>
												<input type="text" class="form-control" name="Departemen" placeholder="Isi Departemen..." required/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Jabatan <font style="color: red;">*</font></label>
												<input type="text" class="form-control" name="Jabatan" placeholder="Isi Jabatan..." required/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Masuk Tanggal <font style="color: red;">*</font></label>
												<input type="date" class="form-control" name="TglMasuk" required/>
											</div>
										</div>
									</div>
									<p class="card-description">
										Akses CRUD
									</p>
									<div class="row">
										<div class="col-md-2">
											<div class="form-group">
												<div class="form-check">
													<label class="form-check-label text-muted">
														<input type="checkbox" class="form-check-input" name="able_add" value="1">
														Tambah
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<div class="form-check">
													<label class="form-check-label text-muted">
														<input type="checkbox" class="form-check-input" name="able_edit" value="1">
														Update
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<div class="form-check">
													<label class="form-check-label text-muted">
														<input type="checkbox" class="form-check-input" name="able_delete" value="1">
														Hapus
													</label>
												</div>
											</div>
										</div>
										<p><i>Note: Jika tidak di ceklis maka pengguna tidak memiliki akses melakukan CRUD</i></p>
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