<?php  
include("config.php");
///$res_friends = mysqli_query($con,"SELECT * FROM mes") or die(mysqli_error($con));
//$row = mysqli_fetch_all($res_friends);
//$r = json_encode($row);
//echo $r;
///var_dump($r);

$a = [];
$b = [];
$res_friends = mysqli_query($con,"SELECT * FROM mes ") or die(mysqli_error($con));
			
			$translist = null;
											while ($translist = mysqli_fetch_assoc($res_friends)) {
											 extract($translist);
											 
											 $test = ['mes' => $textmes, 'sender' =>$sender];
											 array_push($a,$test);
											 array_push($b,$sender);
											
											 
											 
											}
											
											var_dump($a);
										//	print_r($b);


?>
