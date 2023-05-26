<!--
    Author : 이서인
    File Name : main_ver2.html
    Format : HTML
    Description : 슬라이드 ==> 텍스트+애니메이션으로 메인 변경
-->

<!DOCTYPE html>
<html>
  <head>
    <title>Book Swap</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=no"
    />

    <link rel="stylesheet" href="./styles/main_ver2.css" />
  </head>

  <body>
    <?php
        session_save_path("./session");
        session_start();
        if(isset($_SESSION['ID']))
        {
            $ID = $_SESSION['ID'];
            $NICKNAME = $_SESSION['NICK'];
        }

        include_once("./header/header.php");
    ?>

    <div class="main">
      <h1 class="main_h1">
        <a class="title" href="./board/board.php">Bookswap</a> is a
        platform <br />for exchanging unnecessary books <br />for necessary
        books
      </h1>
      <p>
        A platform for exchanging unnecessary books. <br />We built ideas on
        students' capital efficiency and the absence of a professional platform
        for services.
      </p>

      <div>
        <a class="start_btn" href="./board/board.php">시작하기</a>
      </div>
    </div>
    
    <?php include_once("./header/footer.php")?>
  </body>
</html>
