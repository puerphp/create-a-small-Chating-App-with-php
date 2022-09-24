<?php
include('menu.php');
include('session.php');
?>
	<!--Coded With Love By Mutiullah Samim-->
	<body>
		<div class="container-fluidTTTTTT">
			<div class="row justify-content-centerTRRRR">
				<div class="col-md-4 col-xl-3">
				 <div class="card mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
						<center><span class="btn btn-primary btn-rounded">people</span>
						<span class="btn btn-outline-primary btn-rounded">chanels</span></center>
					</div>
					<div class="card-body contacts_body">
					
					<div class="input-group mb-3">
					 <div class="input-group-prepend">
      <span class="input-group-text">Search For friend</span>
    </div>
  <input type="text" class="form-control" id="userId" placeholder="Public ID">
  <div class="input-group-append">
    <button class="btn btn-success" id="findUser">Go</button>
  </div>
</div>

<ui class="contacts">

												<li class="">
														<div class="d-flex bd-highlight">
															<div class="img_cont" id="imgUpload">
																<img src="img/<?php echo $avatar;?>" class="rounded-circle user_img" id="upload_avatar">
																																
																<style>
 .file {
    display: none;
}

</style>
 <form>
										<div class="progress-container">
											<span id="fill-progress"></span>
											<span id="number-progress"></span>
										</div>
																
																<input type="file" class="file" id="file_avatar" name="file">
																
																</form>

															</div>
															<div class="user_info">
																<span  class="badge badge-primary">Privet ID : <?php echo $user;?></span>
																</br>
																<span  class="badge badge-info mt-2">Public ID : <?php echo $publicid;?></span>
																<p><?php echo $username;?></p>
																
															</div>
														</div>
													</li>


<?php 
			$res_friends = mysqli_query($con,"SELECT * FROM friends WHERE sender = '$publicid' OR reciver = '$publicid'") or die(mysqli_error($con));
			
			$translist = null;
											while ($translist = mysqli_fetch_assoc($res_friends)) {
											 extract($translist);
											 
											 if($sender == $publicid){
												 
												 $res_row_fer = mysqli_query($con,"SELECT * FROM users WHERE publicid='$reciver'") or die(mysqli_error());// انتخاب از جدول
													$row = mysqli_fetch_array($res_row_fer);

													$avatar = $row['avatar'];  
													$username = $row['username']; 
													$r = $reciver;
											 }
											 
											 else{
												  $res_row_fer = mysqli_query($con,"SELECT * FROM users WHERE publicid='$sender'") or die(mysqli_error());// انتخاب از جدول
													$row = mysqli_fetch_array($res_row_fer);

													$avatar = $row['avatar'];  
													$username = $row['username'];  
													$r = $sender;
											 }
											 
											 
												echo '
												
													<a href="chatView.php?r='.$r.'"><li class="">
														<div class="d-flex bd-highlight">
															<div class="img_cont">
																<img src="img/'.$avatar.'" class="rounded-circle user_img">
																
															</div>
															<div class="user_info">
																<span>'.$username.'</span>
																<p>Start conversation</p>
															</div>
														</div>
													</li></a>
												
												
												';
											 
											}


?>
					
					<!---	
						<li class="">
							<div class="d-flex bd-highlight">
								<div class="img_cont">
									<img src="img/user1.jpg" class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>
								<div class="user_info">
									<span>Khalid</span>
									<p>Kalid is online</p>
								</div>
							</div>
						</li>
						
						---->
						
						</ui>
					</div>
					<div class="card-footer">
						<div class="input-group">
							<input type="text" placeholder="Search..." name="" class="form-control search">
							<div class="input-group-prepend">
								<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
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
$(document).ready (function(){
            $("#findUser").click(function(){
				
              
            

	
                
                var toOther = $("#userId").val();
                var mySelf = '<?php echo $publicid;?>';
              
			
             
 
                $.post("findFriends.php",
                        {
                           
							
							mySelf : mySelf,
							toOther : toOther
						
							
                        },
                function(data){$("#ew").html(data);});
 
            });
        });
	</script>
	
	<script>
$('#upload_avatar').click(openDialog);
        $('#file_avatar').change(upload);
         
        function openDialog(){
            $('#file_avatar').click();
        }
         
         
        function upload(e){
           // console.log(e);
        const form = $('form')[0];
        const dataForm = new FormData(form);
          console.log(dataForm);
         
         
        $.post({
            url : "uploadavatar.php",
            data : dataForm ,
            processData : false,
            contentType : false,
            success : function(res){
             
               if(res === 'err'){
				   
				 Toastify({
        text: "error! that's all what we know",
        duration: 5000,
        close:true,
        gravity:"top",
        position: "left",
        backgroundColor: "red",
    }).showToast();  
	setInterval(function () {location.reload()}, 2000);
				   
			   }///////if err
			   
			   else if(res === 'png'){
				   
				   	 Toastify({
        text: "file you try to upload must be png or jpg",
        duration: 5000,
        close:true,
        gravity:"top",
        position: "left",
        backgroundColor: "red",
    }).showToast();
	setInterval(function () {location.reload()}, 2000);
				   
			   }///////png
			   
			   else if (res === 'OK'){
				   
				   				   	 Toastify({
        text: "Good",
        duration: 5000,
        close:true,
        gravity:"top",
        position: "left",
        backgroundColor: "green",
    }).showToast();
				   
				   setInterval(function () {location.reload()}, 2000);
				   
			   }///////////OK
			   
			   else{
				   
								 Toastify({
        text: "error! that's all what we know",
        duration: 5000,
        close:true,
        gravity:"top",
        position: "left",
        backgroundColor: "red",
    }).showToast();  
setInterval(function () {location.reload()}, 2000);	

				   
			   }
             
            },
            error : function(err){
             
                console.log('error : ' + err);
             
            },
            xhr : function(e){
				
				
				
                var xhr = new XMLHttpRequest();
                 
                 
                xhr.upload.addEventListener('progress' , function(e){
                    
					
					var loaded = e.loaded;
                    var total = e.total;
                    var progress = (loaded / total * 100).toFixed(0);
                    // number-progress , fill-progress
                    $('#number-progress').text(progress + "%");
                    $('#fill-progress').css("width" , progress + "%");
                     
					 
										
                
                });
				
				
                 
                 
                return xhr;
				
				
             
            }
         
        });
         
        }

</script>
</html>
