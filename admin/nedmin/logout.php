<?php

session_start();
unset($_SESSION['admins']);
header("Location:login.php");
exit;

/** kullanıcının güvenli çıkış yapmasını sağlayan sayfa*/

// Kullanıcı çıkış yaptıktan sonra login sayfasına yönlendirildi

?>