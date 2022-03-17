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
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <title>自己研さん</title>
  <meta name="description" content="こなしたタスクをみんなで共有" />
  <link rel="icon" type="image/png" href="images/page_icon.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- CSS -->
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
</head>

<body>
  <div id="task" class="big-bg">
    <header class="page-header wrapper">
      <h1>
        <a href="task.php"><img class="logo" src="images/logo_ken.png" alt="自己研さん　ホーム" /></a>
      </h1>
    </header>

    <div class="wrapper">
      <h2 class="page-title"></h2>
    </div>
  </div>

  <div class="task-contents wrapper">
    <article>
      <header class="post-info">
        <h2 class="post-title">遊び場</h2>
      </header>
      <?php
      //SQL文の作成
      $strSQL  = " select * from park_tbl order by park_no desc ";
      //SQL文を実行する。
      $db_result = mysqli_query($db_link, $strSQL);

      $cnt = 0;
      while ($cnt < 10 and $db_row = mysqli_fetch_array($db_result)) {
          print "<div class=\"post-main\">";
          print "<div class=\"main-head\">";
          print "<p id=\"name\">".$db_row["cus_name"]."</p>";
          print "<p id=\"date\">".$db_row["park_date"]."</p>";
          print "</div>";
          print "<p id=\"content\">".htmlspecialchars($db_row["park_text"])."</p>";
          print "</div>";
          $cnt++;
      }
      ?>
    </article>

    <aside>
      <h3 class="sub-title">もくじ</h3>
      <ul class="sub-menu">
        <li><a href="task.php">みんなの投稿</a></li>
        <li><a href="task_post.php">投稿する</a></li>
        <li><a href="park.php">遊び場</a></li>
        <li><a href="park_post.php">遊び場で発言</a></li>
        <li><a href="logout.php">ログアウト</a></li>
      </ul>
    </aside>
  </div>
</body>

</html>