<!--
    Author : SeoIn Lee(HTML), JunHyeong Lee(PHP)
    File Name : main_ver2.html -> index.php
    Format : HTML -> php
    Description : Initial page for accessing web site
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
    // checking user's session
        session_save_path("./session");
        session_start();
        if(isset($_SESSION['ID'])) // if user's session exists
        {
            $ID = $_SESSION['ID'];
            $NICKNAME = $_SESSION['NICK'];
        }

        include_once("./header/header.php"); // putting header
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
    
    <?php include_once("./header/footer.php") // putting footer?>
  </body>
</html>
