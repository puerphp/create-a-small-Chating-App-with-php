<?php  
include("config.php");
include("session.php");
include("converter.php");

if(isset($_REQUEST['s'],$_REQUEST['r']) && !empty($_REQUEST['r']) && !empty($_REQUEST['s']) && $_REQUEST['s'] == $publicid ):

$host = $_REQUEST['s'];
$guest = $_REQUEST['r'];

$a = [];
$b = [];
$res_friends = mysqli_query($con,"SELECT * FROM mes WHERE sender = '$guest' AND reciver = '$host' OR sender = '$host' AND reciver = '$guest' ") or die(mysqli_error($con));
			
			$translist = null;
											while ($translist = mysqli_fetch_assoc($res_friends)) {
											 extract($translist);
											 
											 $timeMes = gregorian_to_jalali(date("Y", $tdate), date("n", $tdate), date("j", $tdate), '/').'   - '.date("G:i",$tdate);
									
											 $test = ['mes' => $textmes, 'sender' =>$sender , 'timeMes' => $timeMes];
											 array_push($a,$test);
											 array_push($b,$sender);
											
											 
											 
											}
											
											





$r = json_encode($a);
echo $r;


endif;
?>
