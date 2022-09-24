<?php
ini_set('session.cookie_lifetime', 2593000);
ini_set('session.gc_maxlifetime', 2593000);
session_start();
ob_start();

//بررسی تنظیم شدن یا نشدن متغیرهای سشن
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])){
//در صورتی که متغیرهای سشن تنظیم نشده باشند، کاربر مجاز به دیدن ادامه صفحه نیست و او را به صفحه اصلی منتقل می کنیم
header("location:login.php");
$user = null;
}else{
    $user = $_SESSION['username'];
 
}





$result = mysqli_query($con,"SELECT * FROM users WHERE privetid='$user'") or die(mysqli_error());// انتخاب از جدول
//گرفتن خروجی از اطلاعات فیلدها با mysql_fetch_array
$row = mysqli_fetch_array($result);

$publicid = $row['publicid'];  
$avatar = $row['avatar'];  
$username = $row['username'];  
$lastactivity= $row['lastactivity'];   


/*

$siteinfo = mysqli_query($con,"SELECT * FROM useradmin WHERE tstatus='1' ORDER BY id ASC LIMIT 1")
or die(mysqli_error($con));// انتخاب از جدول
//گرفتن خروجی از اطلاعات فیلدها با mysql_fetch_array
$rowsiteinfo = mysqli_fetch_array($siteinfo);
$sitename = $rowsiteinfo['sitename']; 
$logoname = $rowsiteinfo['logo'];  
$favicon = $rowsiteinfo['favicon'];  
$smsapi = $rowsiteinfo['smsapi'];  
$mailhost = $rowsiteinfo['mailhost'];  
$mailusername = $rowsiteinfo['mailusername'];
$mailpass = $rowsiteinfo['mailpass'];
$nextpayapi = $rowsiteinfo['nextpayapi'];
$exchangephonenum = $rowsiteinfo['exchangephonenum'];
$coinex_access_id = $rowsiteinfo['coinex_access_id'];
$coinex_secret_key = $rowsiteinfo['coinex_secret_key'];
$zarinpal_api = $rowsiteinfo['zarinpal_api'];
$zarinpal_active = $rowsiteinfo['zarinpal_active'];
$subshare  = $rowsiteinfo['subshare'];
$invitorshare = $rowsiteinfo['invitorshare'];
$minorder = $rowsiteinfo['minorder'];
$crisponline = $rowsiteinfo['crisponline'];
$crispid = $rowsiteinfo['crispid'];
$copywritetext = $rowsiteinfo['copywritetext'];
$oflineverify = $rowsiteinfo['oflineverify'];

*/

?>