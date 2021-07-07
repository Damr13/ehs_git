<?php
	include('./config/konek.php');
    include('./config/base.php');

    function gps2Num($coordPart){
        echo $coordPart;exit();
        $parts = explode('/', $coordPart);
        if(count($parts) <= 0) return 0;
        if(count($parts) == 1) return $parts[0];
        return floatval($parts[0]) / floatval($parts[1]);
    }

    function get_image_location($image = ''){
        $exif = exif_read_data($image, 0, true);

        if($exif && isset($exif['GPS'])){
            $GPSLatitudeRef   = $exif['GPS']['GPSLatitudeRef'];
            $GPSLatitude      = $exif['GPS']['GPSLatitude'];
            $GPSLongitudeRef  = $exif['GPS']['GPSLongitudeRef'];
            $GPSLongitude     = $exif['GPS']['GPSLongitude'];
        
            $lat_degrees = count($GPSLatitude) > 0 ? gps2Num($GPSLatitude[0]) : 0;
            $lat_minutes = count($GPSLatitude) > 1 ? gps2Num($GPSLatitude[1]) : 0;
            $lat_seconds = count($GPSLatitude) > 2 ? gps2Num($GPSLatitude[2]) : 0;
        
            $lon_degrees = count($GPSLongitude) > 0 ? gps2Num($GPSLongitude[0]) : 0;
            $lon_minutes = count($GPSLongitude) > 1 ? gps2Num($GPSLongitude[1]) : 0;
            $lon_seconds = count($GPSLongitude) > 2 ? gps2Num($GPSLongitude[2]) : 0;
        
            $lat_direction = ($GPSLatitudeRef == 'W' or $GPSLatitudeRef == 'S') ? -1 : 1;
            $lon_direction = ($GPSLongitudeRef == 'W' or $GPSLongitudeRef == 'S') ? -1 : 1;
        
            $latitude = $lat_direction * ($lat_degrees + ($lat_minutes / 60) + ($lat_seconds / (60*60)));
            $longitude = $lon_direction * ($lon_degrees + ($lon_minutes / 60) + ($lon_seconds / (60*60)));
        
            return array('latitude'=>$latitude, 'longitude'=>$longitude);
        }else{
            return false;
        }
    }

    #cek last idResponse;
    $sql_last_resp = "SELECT MAX(idResponse) AS idResponse
                    FROM do_responses
                    LIMIT 1
                ";
    $last_resp = mysqli_fetch_assoc($conn->query($sql_last_resp));
    $idResponse = $last_resp['idResponse'];

    foreach($_FILES as $Field => $Data){
        // var_dump($Field);
        // var_dump($_FILES[$Field]);
        // var_dump($_FILES[$Field]['tmp_name']);
        $tmp       = $_FILES[$Field]['tmp_name'];
        $rand       = rand();
        $ekstensi   = array('png','jpg','jpeg','gif');
        $filename   = $_FILES[$Field]['name'];
        $ukuran     = $_FILES[$Field]['size'];
        $ext        = pathinfo($filename, PATHINFO_EXTENSION);
        // echo $ext;exit();
        
        $filename = $rand.'_'.$filename;
        move_uploaded_file($_FILES[$Field]['tmp_name'], './assets/img/'.$filename);
        // if(move_uploaded_file($_FILES[$Field]['tmp_name'], './assets/img/'.$filename)){
        //     echo 'sukses';
        // }else{
        //     var_dump(move_uploaded_file($_FILES[$Field]['tmp_name'], './assets/img/'.$filename));
        // }

        // exit()


        //image file path
        $imageURL = base_url().'assets/img/'.$filename;

        //get location of image
        $imgLocation = get_image_location($imageURL);

        //latitude & longitude
        $imgLat = $imgLocation['latitude'];
        $imgLng = $imgLocation['longitude'];

        $image = explode("_",$Field);
        $survey=$image[1];
        $page=$image[2];
        $question=$image[3];

        // print_r(triphoto_getGPS('http://it-spv.dcinagro-serv.local/ehs/dist/assets/img/7522_yokinoi.jpg'));
        // echo $imgLng.' : '.$imgLat.' : '.$question.' '.$imageURL;exit();

        $sql_insert = "INSERT INTO do_responses (response, survey, page, question, url,latitude,longitude, idResponse, timestamps,skor )
             VALUES ('".$filename."',".$survey.",".$page.",".$question.",'".$imageURL."','".$imgLat."','".$imgLng."',".$idResponse.",NOW(),0)";
        // echo $sql_insert;exit();
        $insert_ans = mysqli_query($conn,$sql_insert);
    }
    // exit();    

	$return = array('respon' => 'SUKSES');
    echo json_encode($return);


    

?>