<?php
	include('./config/konek.php');
    // include('./config/send_mail.php');
    $nik    = $_POST['nik'];
    $bln = date("Y-m-d");
    // echo $nik;
    $sql = "UPDATE mstEmployee
            set temp_condition = 'Ya', timestamp_tc = '".$bln."'
            WHERE nik = '".$nik."' ";
    $update= mysqli_query($conn,$sql);
    
    

	$return = array('respon' => 'SUKSES');
    echo json_encode($return);


?>