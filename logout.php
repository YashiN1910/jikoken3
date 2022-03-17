<?php
    session_start();
    $_SESSION = array();

    header('Location: http://localhost/hew01/home.php');
    exit();
    ?>
<?php
//  HTTPヘッダーで文字コードを指定
    header("Content-Type:text/html; charset=UTF-8");
