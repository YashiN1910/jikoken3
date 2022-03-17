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
        <h2 class="post-title">新規投稿</h2>
      </header>
      <div class="post-task">
        <form action="task_post_chk.php" method="POST">
          <textarea name="task_text" maxlength="150"></textarea>
          <input type="submit" class="button" name="task_post" value="投稿" />
        </form>
      </div>
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