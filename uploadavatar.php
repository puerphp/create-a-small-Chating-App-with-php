<?php
include('config.php');
include('session.php');

$rree = mysqli_query($con,"SELECT * FROM users WHERE privetid ='$user'") or die(mysqli_error($con));// انتخاب از جدول
$row45 = mysqli_fetch_array($rree);
$useravatarbefore = $row45['avatar'];


if(!empty($_FILES['file'])){
     
    $file = $_FILES['file'];
     
    if($file['error'])
         die('err');
     
    $type = $file['type'];
     
    $valid_ext = ['image/jpeg' , 'image/png'];
   
    if(!in_array($type , $valid_ext))
        die('png');
     
    $name = $file['name'];
     
    $name = explode('.' , $name);
     
    $ext = end($name);
     
    if(2<count($name)){
        $name = array_slice($name , 0 , count($name) - 1);
        $name = implode('.' , $name);
    }else
    $name = $name[0];
     
    $timestamp = time();
     
    $name = "{$name}{$timestamp}.{$ext}";
    $tmp_name = $file['tmp_name'];
     
    $finall_path = "img/{$name}";
     
    move_uploaded_file($tmp_name , $finall_path);
   echo'OK';

if($useravatarbefore != 'avatar.png'){
              $namebeforeavatar= "img/".$useravatarbefore;
  			if($useravatarbefore != '0.png'){
              unlink($namebeforeavatar);
            }
          }
		  mysqli_query($con,"UPDATE users SET avatar='$name' WHERE privetid='$user' ") or die(mysqli_error($con));
         
}
 
?>
