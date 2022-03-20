<?php 
$userid = $_SESSION['username'];
mysql_connect('localhost', 'root','');
mysql_select_db('db_hospital'); 
$role = mysql_query("SELECT * 
    FROM tb_users AS user
    JOIN tb_pegawai AS pegawai ON user.username=pegawai.NIP
    WHERE pegawai.status='0'
    AND user.username='$userid'");
$access = mysql_fetch_array($role);
?>
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            <a class="navbar-brand brand-logo" href="index.php">
                <!-- <img src="assets/images/logo.svg" alt="logo" /> -->
                <font style="font-weight: 800;">E</font><font>-Kinerja</font>
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.php"></a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                <h1 class="welcome-text">Hi, <span class="text-black fw-bold"><?= $access['nama_lengkap'];?></span></h1>
                <h3 class="welcome-sub-text">Lihat Dashboard E-Kinerja </h3>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item d-none d-lg-block">
                <div style="display: flex; justify-content: center; align-items: center;color: #000;font-weight: 600;">
                    <div>
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <div style="margin-left: 5px;">
                        <div type="text" id="ct"></div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php if ($access['foto'] == NULL) { ?>
                        <?php if ($access['jenis_kelamin'] == 'Pria') { ?>
                            <img class="img-xs rounded-circle" src="assets/user/male.png" alt="Profile image"> 
                        <?php } else if ($access['jenis_kelamin'] == 'Wanita') { ?>
                            <img class="img-xs rounded-circle" src="assets/user/female.png" alt="Profile image"> 
                        <?php } else { ?>
                            <img class="img-xs rounded-circle" src="https://www.shareicon.net/data/512x512/2016/08/18/813850_people_512x512.png" alt="Profile image"> 
                        <?php } ?>
                    <?php } else { ?>
                        <img class="img-xs rounded-circle" src="assets/user/<?= $access['foto'] ?>" alt="Profile image"> 
                    <?php } ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <?php if ($access['foto'] == NULL) { ?>
                            <?php if ($access['jenis_kelamin'] == 'Pria') { ?>
                                <img class="img-md rounded-circle" src="assets/user/male.png" style="width: 40px;" alt="Profile image">
                            <?php } else if ($access['jenis_kelamin'] == 'Wanita') { ?>
                                <img class="img-md rounded-circle" src="assets/user/female.png" style="width: 40px;" alt="Profile image">
                            <?php } else { ?>
                                <img class="https://www.shareicon.net/data/512x512/2016/08/18/813850_people_512x512.png" style="width: 40px;" alt="Profile image">
                            <?php } ?>
                        <?php } else { ?>
                            <img class="img-md rounded-circle" src="assets/user/<?= $access['foto'] ?>" style="width: 40px;" alt="Profile image">
                        <?php } ?>
                        <p class="mb-1 mt-3 font-weight-semibold"><?= $access['nama_lengkap'] ?></p>
                        <?php if ($access['email'] == '' || $access['email'] == NULL) { ?>
                            <p class="fw-light text-muted mb-0">Lengkapi Email Anda!</p>
                        <?php } else { ?>
                            <p class="fw-light text-muted mb-0"><?= $access['email'] ?></p>
                        <?php } ?>
                    </div>
                    <hr>
                    <a href="all_profil.php" class="dropdown-item">
                        <i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i>Profil
                    </a>
                    <a href="signout.php" class="dropdown-item">
                        <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas"></button>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>