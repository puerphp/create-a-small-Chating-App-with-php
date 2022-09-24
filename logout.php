<?php
//شروع یک نشست 
session_start();
//منقضی کردن متغیر های نشست
unset($_SESSION['username']);
unset($_SESSION['password']);
//پایان نشست
session_destroy();
//انتقال به صفحه اصلی یا صفحه مورد نظر
header("location:../APP");
?>