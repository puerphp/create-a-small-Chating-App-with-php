<?php  
include("config.php");
include("session.php");

if(isset($_REQUEST['mySelf'],$_REQUEST['toOther']) && !empty($_REQUEST['toOther']) && !empty($_REQUEST['mySelf']) && $_REQUEST['mySelf'] == $publicid ):

$sender  = $_REQUEST['mySelf'];
$reciver = $_REQUEST['toOther'];

$reciver = preg_replace('/\s+/', '', $reciver);

$result = mysqli_query($con,"SELECT * FROM users WHERE publicid='$reciver'") or die(mysqli_error());
$res = mysqli_query($con,"SELECT * FROM friends WHERE sender = '$sender' AND reciver = '$reciver' OR sender = '$reciver' AND reciver = '$sender'") or die(mysqli_error());



if( $reciver == ""){
	
		echo'<script>Toastify({
        text: "empty ID",
        duration: 5000,
        close:true,
        gravity:"top",
        position: "left",
        backgroundColor: "red",
    }).showToast();

   
    
    </script>';
	
}





elseif(mysqli_num_rows($result) != 1 ){
	
	echo'<script>Toastify({
        text: "There is no user with this ID",
        duration: 5000,
        close:true,
        gravity:"top",
        position: "left",
        backgroundColor: "red",
    }).showToast();

   
    
    </script>';
}


elseif(mysqli_num_rows($res) > 0 ){
	
	echo'<script>Toastify({
        text: "Allready is",
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
	
	mysqli_query($con,"INSERT INTO friends (sender, reciver, tdate,tstatus)
VALUES ('$sender' ,'$reciver','$tdate', '1')") or die(mysqli_error($con));
	echo'
	<script>
	location.reload(); 
	</script>
	';
}



endif;
?>
