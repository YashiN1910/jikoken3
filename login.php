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
  <div id="contact" class="big-bg">
    <header class="page-header wrapper">
      <h1>
        <a href="home.php"><img class="logo" src="images/logo_ken.png" alt="自己研さん　ホーム" /></a>
      </h1>
      <nav>
        <ul class="main-nav">
          <li><a href="about.php">自己研さんってなに？</a></li>
        </ul>
      </nav>
    </header>

    <div class="wrapper">
      <h2 class="page-title">ログイン</h2>
      <form action="login_chk.php" method="POST">
        <div>
          <label for="id">ユーザーID</label>
          <p style="color: red;"></p>
          <input type="text" name="cus_id" />
        </div>

        <div>
          <label for="password">パスワード</label>
          <p style="color: red;"></p>
          <input type="password" name="cus_pass" />
        </div>

        <input type="submit" class="button" value="ログイン" />
      </form>
    </div>
    <!-- /.wrapper -->
  </div>
  <!-- /#contact -->
</body>

</html>