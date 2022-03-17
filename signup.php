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
      <h2 class="page-title">新規登録</h2>
      <form action="sign_chk.php" method="POST">
        <div>
          <label for="name">ユーザーネーム<span style="opacity: 0.7;">（全角10字以内）</span></label>
          <input type="text" id="name" name="cus_name" maxlength="10" />
        </div>

        <div>
          <label for="id">ユーザーID<span style="opacity: 0.7;">（半角15字以内）</span></label>
          <p style="color: red;"></p>
          <input type="text" id="id" name="cus_id" maxlength="15" />
        </div>

        <div>
          <label for="password">パスワード<span style="opacity: 0.7;">（半角15字以内）</span></label>
          <p style="color: red;"></p>
          <input type="password" id="password" name="cus_pass" maxlength="15" />
        </div>
        <input type="submit" class="button" value="登録" />
      </form>
    </div>
    <!-- /.wrapper -->
  </div>
  <!-- /#contact -->
</body>

</html>