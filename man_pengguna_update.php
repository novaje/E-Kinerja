<!-- Head -->
<?php
include "include/connection.php";
include 'include/session.php';
include 'include/head.php'; 

// UPDATE
$GetNIP = $_GET['NIP'];
mysql_connect('localhost', 'root','');
mysql_select_db('db_hospital'); 
$data = mysql_query("SELECT * 
	FROM tb_users AS user
	JOIN tb_pegawai AS pegawai ON user.username=pegawai.NIP
	WHERE pegawai.status='0'
	AND user.username='$GetNIP'");
$row = mysql_fetch_array($data);


if(isset($_POST["edit"]))    
{    

	$id = $_POST['NIP'];

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
	$role             	  = $_POST['HakAkses'];
	$able_add             = $add;
	$able_edit            = $edit;
	$able_delete          = $delete;
		// tb_pegawai
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

	$query = mysql_query("UPDATE tb_users SET role='$role',
		able_add='$able_add',
		able_edit='$able_edit',
		able_delete='$able_delete'
		WHERE username='$id'");

	$query = mysql_query("UPDATE tb_pegawai SET nama_lengkap='$NamaLengkap',
		tempat_lahir='$TempatLahir',
		tgl_lahir='$TglLahir',
		usia='$Usia',
		jenis_kelamin='$JenisKelamin',
		agama='$Agama',
		alamat='$Alamat',
		no_hp='$NoHP',
		email='$Email',
		departemen='$Departemen',
		jabatan='$Jabatan',
		join_tgl='$TglMasuk'
		WHERE NIP='$id'");

	if($query) {
		header("Location: ./man_pengguna.php?UpdateSuccess=true");                                           
	} else {
		header("Location: ./man_pengguna.php?UpdateFailed=true");                                                  
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
											<li class="breadcrumb-item active" aria-current="page">Manajemen Pengguna [Update Data] - <?= $row['NIP'] ?></li>
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
										<h4 class="card-title card-title-dash">[Update Data] Manajemen Pengguna</h4>
										<p class="card-subtitle card-subtitle-dash">Tanggal: <?= tanggal_indo(date('Y-m-d'), TRUE);?></p>
									</div>
									<div>
										<!-- Update Data Pegawai -->
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
												<label>NIP</label>
												<input type="text" class="form-control" name="NIP" placeholder="Isi NIP..." value="<?= $row['NIP'] ?>" readonly/>
												<font style="font-size: 10px;"><i>NIP sama dengan Username pengguna untuk login ke dalam sistem</i></font>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Nama Lengkap</label>
												<input type="text" class="form-control" name="NamaLengkap" placeholder="Isi Nama Lengkap..." value="<?= $row['nama_lengkap'] ?>"/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Hak Akses</label>
												<select class="form-control" name="HakAkses">
													<option value="<?= $row['role'] ?>"><?= $row['role'] ?></option>
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
												<label>Tempat Lahir</label>
												<input type="text" class="form-control" name="TempatLahir" placeholder="Isi Tempat Lahir" value="<?= $row['tempat_lahir'] ?>"/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Tanggal Lahir</label>
												<input type="date" class="form-control" name="TglLahir" value="<?= $row['tgl_lahir'] ?>"/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Usia</label>
												<input type="number" class="form-control" name="Usia" placeholder="Isi Usia" value="<?= $row['usia'] ?>"/>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Jenis Kelamin</label>
												<select class="form-control" name="JenisKelamin">
													<option value="<?= $row['jenis_kelamin'] ?>"><?= $row['jenis_kelamin'] ?></option>
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
													<option value="<?= $row['agama'] ?>"><?= $row['agama'] ?></option>
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
												<textarea type="text" class="form-control" name="Alamat" placeholder="Isi Alamat Tinggal"><?= $row['alamat'] ?></textarea>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>No. HP</label>
												<input type="number" class="form-control" name="NoHP" placeholder="Isi No. Hp" value="<?= $row['no_hp'] ?>"/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Email</label>
												<input type="email" class="form-control" name="Email" placeholder="Isi Email... ex: @domain.com" value="<?= $row['email'] ?>"/>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Departemen</label>
												<input type="text" class="form-control" name="Departemen" placeholder="Isi Departemen..." value="<?= $row['departemen'] ?>"/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Jabatan</label>
												<input type="text" class="form-control" name="Jabatan" placeholder="Isi Jabatan..." value="<?= $row['jabatan'] ?>"/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Masuk Tanggal</label>
												<input type="date" class="form-control" name="TglMasuk" value="<?= $row['join_tgl'] ?>"/>
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
														<?php if ($row['able_add'] == 0) { ?>
															<input type="checkbox" class="form-check-input" name="able_add">
														<?php } else { ?>
															<input type="checkbox" class="form-check-input" name="able_add" value="1" checked>
														<?php } ?>
														Tambah
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<div class="form-check">
													<label class="form-check-label text-muted">
														<?php if ($row['able_edit'] == 0) { ?>
															<input type="checkbox" class="form-check-input" name="able_edit">
														<?php } else { ?>
															<input type="checkbox" class="form-check-input" name="able_edit" value="1" checked>
														<?php } ?>
														Update
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<div class="form-check">
													<label class="form-check-label text-muted">
														<?php if ($row['able_delete'] == 0) { ?>
															<input type="checkbox" class="form-check-input" name="able_delete">
														<?php } else { ?>
															<input type="checkbox" class="form-check-input" name="able_delete" value="1" checked>
														<?php } ?>
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
											<button type="submit" class="btn btn-info" name="edit" title="Edit Data"><i class="fa fa-pencil"></i></button>
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