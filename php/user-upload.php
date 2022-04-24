<?php
 include "db_conn.php";
 if(isset($_POST['submit']) && isset($_FILES['my_image'])) {

  $img_name = $_FILES['my_image']['name'];
  $img_size = $_FILES['my_image']['size'];
  $tmp_name = $_FILES['my_image']['tmp_name'];
  $error = $_FILES['my_image']['error'];

  if($error === 0) {
   if($img_size > 5000000) {
    header("Location: ../index_upload.php?error=Sorry, the file is too large");
    exit();
   }else {
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);

    $allowed_exs = array("jpg", "jpeg", "png");

    if(in_array($img_ex_lc, $allowed_exs)) {
     $img_upload_path = '../uploads/'.$img_name;
     move_uploaded_file($tmp_name, $img_upload_path);

           $sql = "INSERT INTO
              uploads(requirements)
             VALUES
              ('$img_name')";
           $result = mysqli_query($conn, $sql);


     header("Location: ../index_upload.php?success=Successfully Uploaded");
    }else {
     header("Location: ../index_upload.php?error=You can't upload files of this type");
     exit();
    }
   }
  }else {
   header("Location: ../index_upload.php?error=Please choose file before clicking upload");
   exit();
  }

 }else {
  header("Location: ../index_upload.php?error=Cannot upload an image");
  exit();
 }
?>