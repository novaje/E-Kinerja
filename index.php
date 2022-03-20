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
                        <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                                </li> -->
                            </ul>
                            <div>
                                <div class="btn-wrapper">
                                    <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                                    <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                                    <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content tab-content-basic">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row flex-grow">
                                            <div class="col-12 grid-margin stretch-card">
                                                <div class="card ">
                                                    <div class="card card-rounded table-darkBGImg">
                                                        <div class="card-body">
                                                            <div class="col-sm-8">
                                                                <h3 class="text-white upgrade-info mb-0">
                                                                    RSUD <span class="fw-bold">Drs. H. Amri Tambunan</span> - <?= tanggal_indo(date('Y-m-d'), TRUE);?>
                                                                </h3>
                                                                <a href="#" class="btn btn-info upgrade-btn">E-Kinerja!</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
<!-- Sign in Success -->
<script type="text/javascript">
    if (window?.location?.href?.indexOf('SignInsuccess') > -1) {
        Swal.fire({
            title: 'Berhasil Sign In!',
            icon: 'success',
            text: 'Selamat Datang di Aplikasi E-Kinerja RSUD Drs. H. Amri Tambunan!',
        })
        history.replaceState({}, '', './index.php');
    }
</script>