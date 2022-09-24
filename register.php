<?php
include('menu.php');


?>

<body>

<!-- Header Section -->




<header class="header-main">
    <div class="container">
        <div class="content-header d-flex align-items-center justify-content-between">
            <div class="btn-back">
                <a href="index.php">
                    <svg version="1.1" width="18" height="18" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                         viewBox="0 0 492 492" style="enable-background:new 0 0 492 492;" xml:space="preserve">
                        <path d="M198.608,246.104L382.664,62.04c5.068-5.056,7.856-11.816,7.856-19.024c0-7.212-2.788-13.968-7.856-19.032l-16.128-16.12
			C361.476,2.792,354.712,0,347.504,0s-13.964,2.792-19.028,7.864L109.328,227.008c-5.084,5.08-7.868,11.868-7.848,19.084
			c-0.02,7.248,2.76,14.028,7.848,19.112l218.944,218.932c5.064,5.072,11.82,7.864,19.032,7.864c7.208,0,13.964-2.792,19.032-7.864
			l16.124-16.12c10.492-10.492,10.492-27.572,0-38.06L198.608,246.104z"/>
                    </svg>
                </a>
            </div>
           
        </div>
    </div>
</header>





<!-- Main Section -->
<main class="main-content">
    <div class="container">
        <div class="login-item">
            <div class="logo-item py-4">
                <div class="d-flex justify-content-center text-center">
                    <img src="img/logo.png" alt="logo" class="logo-main">
                </div>
            </div>
            <div class="login-card-form">
                <h4 class="main-title py-4">
                   Register
                </h4>
                <form>
                    <div class="form-group">
                        <input class="form-control" id="username" type="text" placeholder="say a name for show to other users">
                    </div>
					
                    <div class="form-group">
                        <input class="form-control"  name="password" id="password" type="password" placeholder="select a Password for Your account">
                    </div>
					
					
					
                    <div class="form-group">
                        <button class="btn btn-main btn-lg w-100" id="sendinfo" type="submit">Register</button>
                    </div>
                </form>
                <div class="text-left my-4">
                   
                    <div> have account? <a href="register.php" class="fw-bold text-primary">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Footer Section-->






<?php
include('footer.php');
?>





<!-------------------------------------------------------------------------------	---------------------	------------------------	----------------------	-------------------	------->

 
	<script>
  
  

$(document).ready (function(){
            $("#sendinfo").click(function(){
				event.preventDefault();


	
                
                
                var pass = $("#password").val();
                var username = $("#username").val();
			
             
 
                $.post("s1.php",
                        {
                           
							
							pass : pass,
							username : username
						
							
                        },
                function(data){$("#ew").html(data);});
 
            });
        });
		

</script>
	
	<style>
	.image-l img{
		
		margin-top:calc(50% - 256px);
		
		
	}
	
	.image-l{
		
		position: absolute;
top: 0;
right: 0;
width: 100%;
height: 100%;
background-color: #060818;
background-position: center center;
background-repeat: no-repeat;
background-size: 75%;
background-position-x: center;
background-position-y: center;
		
	}
	
	</style>
	<div id="ew" />

</body>
</html>