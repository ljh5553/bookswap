<!--
    Author : 이서인
    File Name : list_main.html
    Format : HTML
    Description : 1. 전체화면 파악 목적으로 목업데이터 (2가지) 추가해둔 상태 
                  2. 글쓴이는 닉네임으로 자동으로 적용되는 형태로 생각하고 구현해두었는데, 
                  시간이 많이 쓰일 것 같다면 글쓴이 칸은 삭제해도 될 것 같습니다.
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
        session_save_path("../session");
        session_start();
        if(isset($_SESSION['ID']))
        {
            $ID = $_SESSION['ID'];
            $NICKNAME = $_SESSION['NICK'];
            //echo $NICKNAME . "님 환영합니다!";
        }
      else
      {
        ;
      }
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
            <!--목업 데이터-->
          </div>

          <?php
            include "../db_info.php";

            $sql = 'SELECT * FROM post';
            $result = sq($sql);
            
            while($posting = mysqli_fetch_array($result))
            {
              $postid = $posting['post_id'];
              $sub = $posting['subject'];
              $nick = $posting['writer'];
          ?>
              <div>
              <div class="num"><?php echo $postid?></div>
              <div class="title">
                <a href="./read.php?id=<?php echo $postid; ?>">
                  <?php echo $sub?>
                </a>
              </div>
            <div class="writer"><?php echo $nick?></div>
          </div>
          <?php
            }
          ?>

          <!--
          <div>
            <div class="num">2</div>
            <div class="title">
              <a href="list_view.html"
                >'데이터베이스시스템(7판)'->'데이터베이스 설계와 관계형 이론2/e'
                교환</a
              >
            </div>
            <div class="writer">이승주</div>
          </div>
          <div>
            <div class="num">1</div>
            <div class="title">
              <a href="list_mine.html"
                >'혼자 공부하는 C언어'로 '혼자 공부하는 파이썬' 교환
                원합니다.</a
              >
            </div>
            <div class="writer">윤인성</div>
          </div>
        </div>
          -->
        <div class="bt_wrap">
          <?php
          if(isset($_SESSION['ID'])) {
          ?>
          <a href="list_write.html" class="on">등록</a>
          <?php
          }
          ?>
          <!--로그인 상태일 때만 사용 가능하도록 구현 부탁-->
        </div>
      </div>
    </div>
  </body>
</html>
