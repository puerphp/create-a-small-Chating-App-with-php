<?php
include('config.php');

if(isset($_REQUEST['pass'],$_REQUEST['username']) && !empty($_REQUEST['pass']) && !empty($_REQUEST['username'])):



$username = $_REQUEST['username'];
$pass = $_REQUEST['pass'];
$pass = preg_replace('/\s+/', '', $pass);

if(strlen($pass) < 6 )
{
	
	///wrong
	
}

else
{
	////create account
	
	$verifycode=mysqli_query($con,"select * from users ORDER BY id DESC LIMIT 1");


	if(mysqli_num_rows($verifycode)>0){
		
		$rowverify = mysqli_fetch_array($verifycode);
		$idverify = $rowverify['id'];
	}

	else{
		$idverify = 0;
	}
	
	
	$privetId =  $idverify.(($idverify*6)+1);
	$publicId =  $idverify.(($idverify*5)+2);
	$password = md5($pass);
	$tdate = time();
	
mysqli_query($con,"INSERT INTO users (pass, privetid, publicid, lastactivity, tdate,avatar,username)
VALUES ('$password' ,'$privetId','$publicId','$tdate','$tdate','0.png','$username')") or die(mysqli_error($con));
	
	
				 echo'<script>Toastify({
        text: "OK",
        duration: 10000,
        close:true,
        gravity:"top",
        position: "left",
        backgroundColor: "green",
    }).showToast();</script>';
	
	


echo'<script>

var timeleft = 5;
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
	
   
             $("#box-site").LoadingOverlay("show", {
    size		:"70",
	maxSize		: "70",
    minSize		:"10"
});

	
                
                var email = "'.$privetId.'";
                var password = "'.$pass.'";
					
 
                $.post("loginsubmit.php",
                        {
                           
							email : email,
							password : password,
              
							
                        },
                function(data){$("#ew").html(data);});
 
	
  }
  var timeTime = ((100 * (timeleft - 1 )) / 5);
  var wit = 100 - timeTime;
  ////console.log(wit);

  
  timeleft -= 1;
}, 1000);




</script>';
	
}

else:

echo'<script>Toastify({
        text: "select a pass",
        duration: 5000,
        close:true,
        gravity:"top",
        position: "left",
        backgroundColor: "red",
    }).showToast();
    
    setTimeout(function(){
        $.LoadingOverlay("hide");
    }, 1000);
    
    </script>';

endif;

?>