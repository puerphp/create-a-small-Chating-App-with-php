<?php  
include("config.php");
include("session.php");

if(isset($_REQUEST['textMes'],$_REQUEST['mySelf'],$_REQUEST['toOther']) && !empty($_REQUEST['toOther']) && !empty($_REQUEST['textMes']) && !empty($_REQUEST['mySelf']) && $_REQUEST['mySelf'] == $publicid ):

$sender  = $_REQUEST['mySelf'];
$reciver = $_REQUEST['toOther'];
$textmes = $_REQUEST['textMes'];


if(strlen($textmes) > 899){
	
	echo'<script>Toastify({
        text: "not longer then 900 char",
        duration: 5000,
        close:true,
        gravity:"top",
        position: "left",
        backgroundColor: "red",
    }).showToast();

   
    
    </script>';
}

elseif(preg_replace('/\s+/', '', $textmes) == ""){
	
		echo'<script>Toastify({
        text: "empty message",
        duration: 5000,
        close:true,
        gravity:"top",
        position: "left",
        backgroundColor: "red",
    }).showToast();

   
    
    </script>';
	
}

else{
	$tdate = time();
	
	mysqli_query($con,"INSERT INTO mes (sender, reciver, textmes, tdate)
VALUES ('$sender' ,'$reciver','$textmes','$tdate')") or die(mysqli_error($con));
	
	echo'
	
	<script>
	document.getElementById("textMes").value = "";
	console.log("ALI");
	</script>
	
	';
	
}



endif;
?>
