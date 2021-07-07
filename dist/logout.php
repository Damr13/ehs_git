<?php
session_start();
unset($_SESSION['nik']);
unset($_SESSION['Nama']);
unset($_SESSION['Email']);
unset($_SESSION['DeptName']);
unset($_SESSION['DeptCategory']);
unset($_SESSION['status_karyawan']);
//atau
$_SESSION['nik']='';
setcookie(session_name(), '', time()-7000000, '/');
session_destroy();
$_SESSION = array();
header("Location: index.php");
?>