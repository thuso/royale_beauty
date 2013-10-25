<?php
    session_start();
    $_SESSION['user'];
    $_SESSION['uid'];
    $_SESSION['cart'];
    session_destroy();
    
    header('Location: index.php');
    
?>
