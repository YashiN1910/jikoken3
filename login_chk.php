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

$strId = mysqli_real_escape_string($db_link, $strId);
$strPass = mysqli_real_escape_string($db_link, $strPass);

//SQL文の作成
$strSQL  = " select * from cus_tbl where cus_id = '$strId' and cus_pass = '$strPass' ";
//SQLの実行
$db_result = mysqli_query($db_link, $strSQL);
//取得したデータ件数を調べる
$db_cnt = mysqli_num_rows($db_result);


if ($db_cnt == 0) {
    //一致しない場合
    header('Location: http://localhost/hew01/login.php');
    exit;
} else {
    //idとpassが一致した場合
    $db_row = mysqli_fetch_array($db_result);
    session_start();
    $_SESSION['id'] = $db_row["cus_id"];
    $_SESSION['name'] = $db_row["cus_name"];
    //DB切断
    mysqli_close($db_link);
    //遷移
    header('Location: http://localhost/hew01/task.php');
    exit;
}
