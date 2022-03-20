<?php
include "include/connection.php";
include 'include/session.php';
include 'include/head.php'; 

$GetNIP = $_GET['NIP'];

// DELETE
$query = mysql_query("DELETE FROM tb_users WHERE username='$GetNIP'");
$query = mysql_query("DELETE FROM tb_pegawai WHERE NIP='$GetNIP'");

if($query) {
  header("Location: ./man_pengguna.php?DeleteSuccess=true");                                            
} else {
  header("Location: ./man_pengguna.php?DeleteFailed=true");                              
}
?>