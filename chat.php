<?php  
$q = ["0" => "0-1", "1"=>"0-2", "2" => "0-1", "3"=>"1-2", "4" => "0-1", "5"=>"2-2", "6" => "0-1", "7"=>"3-2" , "8"=>"3-2"];
$r = json_encode($q);
?>

 <head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head> 

<div class="box-2" id="demo">


</div>

<div class="box-2" id="demo1">


</div>

<script>
/*
const cars = '<?php echo $r;?>';


var myArr = JSON.parse(cars);
console.log(myArr[0]);

*/


/**
$(document).ready(function() {
	$("#demo1").load("chatBack.php");
   setInterval( function (){$("#demo1").load("chatBack.php");},3000);
});

/*
const cars = '<?php echo $r;?>';
var myArr = JSON.parse(cars);

let i = 0;
let text = "";
for (;myArr[i];) {
  text += "<p class=box-1>" + myArr[i] + "</p>";
  
  i++;
}
document.getElementById("demo").innerHTML = text;
*/

	function aliTextTwo(){
		alert("ali");
	}

	
	function aliText(){
	
$.ajax({
   url : 'chatBack.php',
   type : 'GET',
   data : "username=",
   dataType : 'html', // On désire recevoir du HTML
   success : function(data, statut)
   {
       document.getElementById('demo1').innerHTML = data;
      var cars = data;
	   

var myArr = JSON.parse(cars);

let i = 0;
let text = "";
for (;myArr[i];) {
  text += "<p class=box-1>" + myArr[i] + "</p>";
  
  i++;
}
document.getElementById("demo").innerHTML = text;
   }
});

	}
	
	
$(document).ready(function() {
//aliText();
 setInterval( aliText,3000);
});
</script>

<style>
.box-1{
	width:30%;
	min-height:30px;
	background:red;
	color:#fff;
	margin-top:20px;
	direction:rtl;
}
.box-2{
	width:30%;
	min-height:30px;
	background:blue;
	color:#fff;
	margin-top:20px;
	max-height : 500px;
	overflow: scroll;
}
</style>

<div class="box-1">


</div>