<?php
//  HTTPヘッダーで文字コードを指定
  header("Content-Type:text/html; charset=UTF-8");
?>
<?php
session_start();

//セッション確認
if (!isset($_SESSION['id'])) {
    header("Location: http://localhost/hew01/home.php");
    exit();
} if (!isset($_SESSION['name'])) {
    header("Location: http://localhost/hew01/home.php");
    exit();
}

$strId = $_SESSION['id'];
$strName = $_SESSION['name'];
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

//入力から受け取り
$strText = $_POST['task_text'];

//タイムゾーン指定
date_default_timezone_set('Asia/Tokyo');
$timestamp = time();
$task_date = date("Y/m/d H:i", $timestamp);

$strId = mysqli_real_escape_string($db_link, $strId);
$strName = mysqli_real_escape_string($db_link, $strName);

$strText = mysqli_real_escape_string($db_link, $strText);

//SQL文の作成
$strSQL = " insert into task_tbl(cus_id,cus_name,task_date,task_text) ";
$strSQL .= " values('".$strId."','".$strName."','".$task_date."','".$strText."') ";

//SQLの実行
$db_result = mysqli_query($db_link, $strSQL);

if ($db_result == false) {
    //insertの失敗
    $msg = "顧客登録が失敗しました。".$strSQL;
    print $msg;
} else {
    //insertの成功
    //遷移
    header('Location: http://localhost/hew01/task.php');
    exit;
}
