<?php
include('menu.php');
include('session.php');

if(isset($_GET['r']) && !empty($_GET['r'])):
$r = $_GET['r'];

$res_row_fer = mysqli_query($con,"SELECT * FROM users WHERE publicid='$r'") or die(mysqli_error());// انتخاب از جدول

if(mysqli_num_rows($res_row_fer) > 0 ){
														$row = mysqli_fetch_array($res_row_fer);

													$avatar_guest = $row['avatar'];  
													$username = $row['username'];  
}
else{
	
	header("location:index.php");
}


?>
	<!--Coded With Love By Mutiullah Samim-->
	<body>
		<div class="container-fluidTTT ">
			<div class="row justify-content-centerTTTTTTTTTT">

				<div class="col-md-12 col-xl-12 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
								<div class="img_cont">
									<img src="img/<?php echo $avatar_guest;?>" class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>
								<div class="user_info">
									<span><?php echo $username;?></span>
									<p></p>
								</div>
								<div class="video_cam">
								<!--	<span><i class="fas fa-video"></i></span>
									<span><i class="fas fa-phone"></i></span>-->
								</div>
							</div>
							<span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
							<div class="action_menu">
								<ul>
									<li><i class="fas fa-user-circle"></i> View profile</li>
									<li><i class="fas fa-users"></i> Add to close friends</li>
									<li><i class="fas fa-plus"></i> Add to group</li>
									<li><i class="fas fa-ban"></i> Block</li>
								</ul>
							</div>
						</div>
						<div class="card-body msg_card_body" id="chatBox">
						
						
						
						
						
							
						
							
							
							
						
						
							
						
							
						
							
							
							
						</div>
						<div class="card-footer">
							<div class="input-group">
								<div class="input-group-append">
									<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
								</div>
								<textarea id="textMes" class="form-control type_msg" placeholder="Type your message..."></textarea>
								<div class="input-group-append">
									<span id="sendMes" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	
	<?php include("footer.php");?>
	
	<div id="ew"></div>
	<script>
	
	/*
		$(document).ready(function(){
$('#action_menu_btn').click(function(){
	$('.action_menu').toggle();
});
	});
	
	
	*/
	
	/////////////////////////
	
	function aliText(){
	
$.ajax({
   url : 'chatBack.php?s=<?php echo $publicid;?>&r=<?php echo $r;?>',
   type : 'GET',
   data : "username=",
   dataType : 'html', // On désire recevoir du HTML
   success : function(data, statut)
   {
     ////  document.getElementById('demo1').innerHTML = data;
      var cars = data;
	   

var myArr = JSON.parse(cars);

let i = 0;
let text = "";
for (;myArr[i];) {
	
	

	var senderMes = myArr[i]["sender"];
	var mySelf = '<?php echo $publicid;?>';
	if(senderMes === mySelf){
		
				text += '<div class="d-flex justify-content-end mb-4"><div class="msg_cotainer_send">' + myArr[i]["mes"] + '</div><div class="img_cont_msg">	<img class="rounded-circle user_img_msg" src="img/<?php echo $avatar;?>"></div>		</div>';

	}
	
	else{
			text += '<div class="d-flex justify-content-start mb-4"><div class="img_cont_msg"><img src="img/<?php echo $avatar_guest;?>" class="rounded-circle user_img_msg"></div><div class="msg_cotainer">' + myArr[i]["mes"] + '<span class="msg_time">9:12 AM, Today</span></div></div>';


	}
	
  
  
  i++;
}
document.getElementById("chatBox").innerHTML = text;
   }
});

	}
	
	
$(document).ready(function() {
 aliText();
 setInterval( aliText,2000);
});


$(document).ready (function(){
            $("#sendMes").click(function(){
				
              
            

	
                
                var textMes = $("#textMes").val();
                var mySelf = '<?php echo $publicid;?>';
                var toOther = '<?php echo $r;?>';
			
             
 
                $.post("savemes.php",
                        {
                           
							textMes : textMes,
							mySelf : mySelf,
							toOther : toOther
						
							
                        },
                function(data){$("#ew").html(data);});
 
            });
        });
	</script>
	
	<style>
	
	</style>
</html>


<?php endif?>
