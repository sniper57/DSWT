<?php
    session_start();
    session_destroy() ;
    $_SESSION["isLogin"] = "";
    header ("location:index.php");
?>