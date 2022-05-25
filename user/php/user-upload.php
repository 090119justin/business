<?php
 include "db_conn.php";
 if(isset($_POST['save'])){
      if(isset($_FILES['my_image'])) {
      session_start();
      $img_name = $_FILES['my_image']['name'];
      $img_size = $_FILES['my_image']['size'];
      $tmp_name = $_FILES['my_image']['tmp_name'];
      $error = $_FILES['my_image']['error'];

      $id = $_SESSION['personId'];


      if($error === 0) {
            if($img_size > 5000000) {
            header("Location: ../pages-profile.php?error=Sorry, the file is too large");
            exit();
            }else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if(in_array($img_ex_lc, $allowed_exs)) {
            $img_upload_path = 'assets/img/'.$img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

                  $sql = "UPDATE personal_information
                  set photo = '$img_upload_path'
                  where id = $id;";
                  $result = mysqli_query($conn, $sql)or die($conn->error);

                  $_SESSION['photo'] = $img_upload_path;

                  


            
            }else {
                  header("Location: ../pages-profile.php?error=You can't upload files of this type");
                  exit();
            }
            }
      }else {
            header("Location: ../pages-profile.php?error=Please choose file before clicking upload");
            exit();
      }

      }else {
            header("Location: ../pages-profile.php?error=Cannot upload an image");
            exit();
      }
 }
 

?>