<?php
//  HTTPヘッダーで文字コードを指定
  header("Content-Type:text/html; charset=UTF-8");
?>
<?php

include("db_ini.php");

//MySqlサーバ接続
$db_link = mysqli_connect($host, $user, $pass);

if ($db_link == false) {
    print "MySqlサーバー接続に失敗しました。";
    exit;
}
//データベース接続
$db_flg = mysqli_select_db($db_link, $db_name);

if ($db_flg == false) {
    print "データベース接続に失敗しました。";
    exit;
}

//charset指定
mysqli_set_charset($db_link, "utf8");

//ログイン画面から受け取り
$strId = $_POST['cus_id'];
$strPass = $_POST['cus_pass'];
$strName = $_POST['cus_name'];

$strId = mysqli_real_escape_string($db_link, $strId);
$strPass = mysqli_real_escape_string($db_link, $strPass);
$strName = mysqli_real_escape_string($db_link, $strName);

//SQL文の作成
$strSQL  = " select * from cus_tbl where cus_id = '$strId' ";
//SQLの実行
$db_result = mysqli_query($db_link, $strSQL);
//取得したデータ件数を調べる
$db_cnt = mysqli_num_rows($db_result);


if ($db_cnt == 0) {
    //idが重複しない場合
    mysqli_free_result($db_result);
    //SQL文の作成
    $strSQL = " insert into cus_tbl(cus_id,cus_pass,cus_name) ";
    $strSQL .= " values('".$strId."','".$strPass."','".$strName."') ";
    //$strSQL .= " values('$strId','$strPass','$strName') ";
    //SQL文を実行する
    $db_result = mysqli_query($db_link, $strSQL);
    mysqli_close($db_link);
    session_start();
    $_SESSION['id'] = $strId;
    $_SESSION['name'] = $strName;
    header('Location: http://localhost/hew01/task.php');
    exit();
} else {
    //idが重複した場合
    mysqli_free_result($db_result);
    mysqli_close($db_link);
    header('Location: http://localhost/hew01/signup.php');
    exit();
}
