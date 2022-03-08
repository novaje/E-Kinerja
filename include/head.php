<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-Kinerja - RSUD Drs. H. Amri Tambunan </title>
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="assets/js/select.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://kit.fontawesome.com/bd33a9775b.js" crossorigin="anonymous"></script>
    <!-- Alert -->
    <script src="assets/sweet/sweetalert2.all.js"></script>
    <script src="assets/sweet/sweetalert2.all.min.js"></script>
    <script src="assets/sweet/sweetalert2.js"></script>
    <script src="assets/sweet/sweetalert2.min.js"></script>
</head>
<script type="text/javascript"> 
    function display_c(){
        var refresh=1;
        mytime=setTimeout('display_ct()',refresh)
    }

    function display_ct() {
        var strcount
        var x = new Date()
        document.getElementById('ct').innerHTML = x;
        tt=display_c();
    }
</script>
<?php
// DATE
function tanggal_indo($date, $print_day = false)
{
  $day = array ( 1 =>    
    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu',
    'Minggu'
);
  $month = array (1 =>   
    'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Augustus',
    'September',
    'Oktober',
    'November',
    'Desember'
);
  $split    = explode('-', $date);
  $tgl_indo = $split[2] . ' ' . $month[ (int)$split[1] ] . ' ' . $split[0];
  
  if ($print_day) {
    $num = date('N', strtotime($date));
    return $day[$num] . ', ' . $tgl_indo;
}
return $tgl_indo;
}
?>
<?php include 'include/alert.php'; ?>
<body onload="display_ct()">