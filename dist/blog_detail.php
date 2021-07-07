<?php
    include('./config/konek.php');
    include('./config/base.php');

    $id_blog = $_POST['id_blog'];

    $sql = "SELECT *
            FROM mst_article
            WHERE id = ".$id_blog." 
                ";
    $blog = mysqli_fetch_assoc($conn->query($sql));

    $btn_back="";
    $btn_back.='
        <div class="back-button" id="id_btn_back">
            <a href="'.base_url().'/blog">
              <svg width="32" height="32" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
              </svg>
            </a>
          </div>
    ';

    $judul="";
    $judul.='
        <div class="page-heading" id="id_heading">
            <h6 class="mb-0">'.$blog['judul'].'</h6>
          </div>
    ';

    $html="";
    // $html .= '
    //     <div class="page-content-wrapper py-3">
    //         <div class="container">
    //         <div class="card">
    //           <div class="card-body">
    //             <h6>'.$blog['judul'].'</h6>
    //             '.str_replace("'", "`", $blog['isi']).'
    //           </div>
    //         </div>
    //         </div>
    //     </div>
    // ';

    $html .= '
        <div class="page-content-wrapper py-3">
            <div class="container">
            <div class="card">
              <div class="card-body">
                '.str_replace("'", "`", $blog['isi']).'
              </div>
            </div>
            </div>
        </div>
    ';




    $return = array('respon' => 'SUKSES','btn_back'=>$btn_back,'judul'=>$judul,'html' => $html);
    echo json_encode($return);


?>