<?php
session_start();
include('config.php');

?>

<?php
//شروع یک نشست

ob_start();



//دریافت و تنظیم متغیرهای ارسال شده توسط کاربر
$username = $_REQUEST['email'];
$password = $_REQUEST['password'];


if(isset($_REQUEST['recap']) AND $_REQUEST['recap'] != ''){
   
    $post = [
            'secret' => $googlerecaptchasecretkey,
            'response' => $_REQUEST['recap'],
        ];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close ($ch);
   $obj = json_decode($server_output);
 $valid_s = $obj->{"success"};
}

if(!isset($_REQUEST['recap'])){
  $valid_s = 'true';
}


function convertNumbers($srting,$toPersian=true)
{
    $en_num = array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹');
    $fa_num = array('0','1','2','3','4','5','6','7','8','9');
    if( $toPersian ) return str_replace($en_num, $fa_num, $srting);
        else return str_replace($fa_num, $en_num, $srting);
}

$digits = $username;

$enphone = convertNumbers($digits);


$check_error = 0;

?>

<body>
<?php
//بررسی معتبر بودن اطلاعات ارسالی کاربر
//نام کاربری
if (!isset($enphone) || $enphone == ''){

$check_error = 1;
echo'<script>Toastify({
        text: "Enter privet ID pls",
        duration: 5000,
        close:true,
        gravity:"top",
        position: "left",
        backgroundColor: "red",
    }).showToast();
    $("#box-site").LoadingOverlay("hide", true);
    </script>';
	

}
//کلمه عبور
elseif (!isset($password) || $password == ''){

$check_error = 1;
echo'<script>Toastify({
        text: "Enter Password pls",
        duration: 5000,
        close:true,
        gravity:"top",
        position: "left",
        backgroundColor: "red",
    }).showToast();
      $("#box-site").LoadingOverlay("hide", true);
    </script>';

}
  
elseif(isset($_REQUEST['recap']) AND $_REQUEST['recap'] == ''){
    
    echo'<script>Toastify({
        text: "من ربات نیستم را تایید نکرده اید",
        duration: 5000,
        close:true,
        gravity:"top",
        position: "left",
        backgroundColor: "red",
    }).showToast();
      $("#box-site").LoadingOverlay("hide", true);
    </script>';
    
  }
  
  elseif($valid_s != 'true'){
  
        echo'<script>Toastify({
        text: "شما ربات تشخیص داده شده اید",
        duration: 5000,
        close:true,
        gravity:"top",
        position: "left",
        backgroundColor: "red",
    }).showToast();
      $("#box-site").LoadingOverlay("hide", true);
    </script>';
  
  }

elseif($check_error != 1){
$username = mysqli_real_escape_string($con,$username);
$password = md5($password);

//تطبیق اطلاعات کاربر با آنچه که در دیتابیس ذخیره شده
$result = mysqli_query ($con,"SELECT * FROM users WHERE privetid = '$enphone' AND pass = '$password'");
// تعداد ردیف های موجود
$count = mysqli_num_rows($result);
if($count > 0){

$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
  
  echo'<script>Toastify({
        text: "OK You Are Logining in",
        duration: 5000,
        close:true,
        gravity:"top",
        position: "left",
        backgroundColor: "green",
    }).showToast();
      $("#box-site").LoadingOverlay("hide", true);
    </script>';
	




echo "<script>

var prev = '1';
var urlSite = '".$siteadress."';
let result = prev.startsWith(urlSite);


console.log(result);
if(result === true){
window.location= prev;	



}else{

window.location='index.php';	

}

</script>";

}
else{
// اطلاعات کاربر صحیح نیست
echo'<script>Toastify({
        text: "privet ID And password Not match",
        duration: 5000,
        close:true,
        gravity:"top",
        position: "left",
        backgroundColor: "red",
    }).showToast();
    $("#box-site").LoadingOverlay("hide", true);
    </script>';


}
}

//پایان ارتباط با پایگاه داده 
mysqli_close($con);
?>
