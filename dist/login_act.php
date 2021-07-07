<?php
	include('./config/konek.php');
    session_start();

    $nik = $_POST['nik'];
    $password = $_POST['password'];
    #cek last idResponse;
    $sql = "SELECT em.*,dp.DeptCode,dp.DeptName,dp.DeptCategory
            from mstEmployee em
            LEFT JOIN mstDept dp on em.idDept = dp.id
            WHERE Nik = '".$nik."'
            AND status = 'Aktif'
                ";
    // echo $sql;exit();
    $data = mysqli_fetch_assoc($conn->query($sql));
    $result=mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($result);

    if($rowcount>0){
        $password=md5($password);
        // echo $password;exit();
        if($password==$data['Password']){
            $_SESSION['nik'] = $nik;
            $_SESSION['Nama'] = $data['Nama'];
            $_SESSION['Email'] = $data['Email'];
            $_SESSION['DeptName'] = $data['DeptName'];
            $_SESSION['DeptCategory'] = $data['DeptCategory'];
            $_SESSION['status'] = $data['status'];
            $_SESSION['wfh'] = $data['wfh'];
            if($data['DeptCategory']==1){
                $_SESSION['status_karyawan'] = 'Karyawan';
            }else{
                $_SESSION['status_karyawan'] = 'Outsourcing';
            }

            $respon='SUKSES';
            $msg = 'login';
        }else{
            $respon = 'GAGAL';
            $msg = 'Password salah';
        }
    }else{
        $respon = 'GAGAL';
        $msg = 'User tidak tersedia atau tidak aktif';
    }
    

	$return = array('respon' => $respon, 'msg' => $msg);
    echo json_encode($return);


?>