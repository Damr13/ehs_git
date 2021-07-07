<?php
    // include('./config/konek.php');
	include('./config/konek.php');

    $id = $_POST['id'];
    $key = $_POST['key'];
    #cek last idResponse;
    $sql = "SELECT em.*,dp.DeptCode,dp.DeptName,dp.DeptCategory
            from mstEmployee em
            LEFT JOIN mstDept dp on em.idDept = dp.id
            WHERE em.id = ".$id." AND em.key_password = '".$key."'
                ";
    // echo $sql;exit();
    $data = mysqli_fetch_assoc($conn->query($sql));
    $result=mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($result);

    if($rowcount>0){
        $respon='SUKSES';
        $msg = '';
    }else{
        $respon = 'GAGAL';
        $msg = 'Email tidak terdaftar';
    }
    

	$return = array('respon' => $respon);
    echo json_encode($return);

    
?>