<!--
    Author : SeoIn Lee(HTML), JunHyeong Lee(PHP)
    File Name : list_main.html -> board.php (Modified by JunHyeong Lee)
    Format : HTML -> PHP
    Description : 1. added mockup data for testing -> removed mockup and replaced by real data (-JunHyeong Lee)
                  2. Planned to automatically add post writer by DB, 
                  but we can remove that part if we don't have enough time
                  -> added printing post writer feature (-JunHyeong Lee)
-->

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>교환 게시판</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/list.css" />
  </head>
  <body>
    <?php
        // login session check
        session_save_path("../session");
        session_start();
        if(isset($_SESSION['ID'])) // if user already login
        {
            $ID = $_SESSION['ID'];
            $NICKNAME = $_SESSION['NICK'];
            //echo $NICKNAME . "님 환영합니다!";
        }
        else
        {
          ; // do nothing in board page
        }

        include_once("../header/header.php"); // site common header
    ?>

    <h1>
      <a href="../index.php"
        ><img src="../image/logo.png" alt="로고"
      /></a>
    </h1>
    <div class="board_wrap">
      <div class="board_title">
        <strong>교환 게시판</strong>
        <p>원하는 책을 채팅으로 자유롭게 교환해보세요</p>
      </div>
      <div class="board_list_wrap">
        <div class="board_list">
          <div class="top">
            <div class="num">번호</div>
            <div class="title">제목</div>
            <div class="writer">글쓴이</div>
          </div>

          <div>
            <!--Mockup data-->
          </div>

          <?php
          // connect with DB
            include "../db_info.php";

            $sql = 'SELECT * FROM post ORDER BY post_id DESC'; // select post
            $result = sq($sql);
            
            while($posting = mysqli_fetch_array($result)) // print all post
            {
              $postid = $posting['post_id'];
              $sub = $posting['subject'];
              $nick = $posting['writer'];
          ?>
              <div>
              <div class="num"><?php echo $postid?></div>
              <div class="title">
                <a href="./view.php?id=<?php echo $postid; ?>">
                  <?php echo $sub?>
                </a>
              </div>
            <div class="writer"><?php echo $nick?></div>
          </div>
          <?php
            }
          ?>
        <div class="bt_wrap">
          <?php
          if(isset($_SESSION['ID'])) {
          ?>
          <a href="./write.php" class="on">등록</a>
          <?php
          }
          ?>
          <!--To be implemented : enable posting button when user is logged on -> added requested feature (-JunHyeong Lee)-->
        </div>
      </div>
    </div>
    <?php include_once("./header/footer.php")?>
  </body>
</html>
