<?php
	include('./config/konek.php');
    // include('./config/send_mail.php');

    #cek last idResponse;
    $sql_last_resp = "SELECT MAX(idResponse) AS idResponse
                    FROM do_responses
                    LIMIT 1
                ";
    $last_resp = mysqli_fetch_assoc($conn->query($sql_last_resp));
    $idResponse = $last_resp['idResponse']+1;
    
    $arr    = json_decode($_POST['data']);
    // print_r($arr);exit();
    $arr2 = explode("&", $arr);
    foreach ($arr2 as $key) {
        $data = explode("=", $key);
        $param=$data[0];
        $param2 = explode("_", $param);
        $type = $param2[1];
        $survey = $param2[2];
        $page = $param2[3];
        $question = $param2[4];
        if($type=='radio' or $type=='check'){
            $val_awal=$data[1];
            $val_awal = explode("_", $val_awal);
            $answer = $val_awal[0];
            $val = $val_awal[1];
            $val = preg_replace("/[+]/", " ", $val);
        }else{
            $answer = $param2[5];
            $val = $data[1];
            $val = preg_replace("/[+]/", " ", $val);
        }
        $val=rawurldecode($val);

        
        

        // echo $param.'|'.$type.':'.$survey.':'.$page.':'.$question.':'.$answer.':'.$val.' || ';exit();
        $sql_ans = "SELECT *
                    FROM do_answers
                    WHERE survey = '".$survey."' 
                    AND page = '".$page."' 
                    AND question = '".$question."' 
                    AND id = '".$answer."'
                    ";
        $ans = mysqli_fetch_assoc($conn->query($sql_ans));
        $skor=$ans['skor'];

        $sql_insert = "INSERT INTO do_responses (response, survey, page, question, answer, idResponse, timestamps, skor)
             VALUES ('".$val."',".$survey.",".$page.",".$question.",".$answer.",".$idResponse.",NOW(),".$skor.")";
        $insert_ans = mysqli_query($conn,$sql_insert);
    }
    
    

	$return = array('respon' => 'SUKSES');
    echo json_encode($return);


?>