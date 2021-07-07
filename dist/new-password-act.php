<?php
	include('./config/konek.php');
    include('./config/base.php');

    $id = $_POST['id'];
    $password = $_POST['password'];
    $password = md5($password);
    #cek last idResponse;
    $sql = "UPDATE mstEmployee SET key_password = null, Password = '".$password."'
            WHERE id = ".$id;
    $query = mysqli_query($conn,$sql);

    $respon='SUKSES';
    $msg = '';
    

	$return = array('respon' => $respon);
    echo json_encode($return);

?>