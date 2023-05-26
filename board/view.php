<!--
    Author : 이서인
    File Name : list_view.html
    Format : HTML
    Description : 다른 유저가 올린 게시물로, 2번 게시물 기준 목업데이터 상태로 세팅
-->

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>교환 게시물 상세</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/list.css" />
  </head>
  <body>

  <script language="JavaScript">

      function post_popup(frm_name)
      {
        frm = document.getElementById(frm_name);
        window.open('', 'viewer', 'width = 1000, height = 700');
        frm.action = "../chat/chat.html";
        frm.target = "viewer";
        frm.method = "post";
        frm.submit();
      }
  </script>

  <?php
    session_save_path("../session");
    session_start();
    if(isset($_SESSION['ID']))
    {
        $ID = $_SESSION['ID'];
        $NICKNAME = $_SESSION['NICK'];
    }
	  else
	  {
		  echo "<script>alert('게시글을 보려면 로그인해야 합니다!');</script>";
      echo "<script>location.href='../login/login.html'</script>";
	  }

    include_once("../header/header.php");
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

      <?php
        include "../db_info.php";

        $postid = $_GET['id'];

        $sql = 'SELECT * FROM post WHERE post_id = ' . $postid;
        $result = sq($sql);
        $row_count = mysqli_num_rows($result);

        if($row_count != 0 )
        {
          $rs = $result->fetch_object();

          $sub = $rs->subject;
          $nick = $rs->writer;
          $cont = $rs->contents;
        }
        else
        {
          echo "<script>alert('게시글을 불러오는 중 오류가 발생했습니다.');</script>";
        }
      ?>
      
      <div class="board_view_wrap">
        <div class="board_view">
          <div class="title">
            <?php echo $sub?>
          </div>
          <div class="info">
            <dl>
              <dt>번호</dt>
              <dd><?php echo $postid?></dd>
            </dl>
            <dl>
              <dt>글쓴이</dt>
              <dd><?php echo $nick?></dd>
            </dl>
          </div>
          <?php 
                $img_rs=mysqli_fetch_array(sq('SELECT image FROM post WHERE post_id = '. $postid));
                if(!is_null($img_rs['image']))
                {
          ?>
          <div class="info">
            <?php echo '<img src="data:image;base64,'. base64_encode($img_rs['image']).'" style="height: 300px" />'; ?>
          </div>
          <?php } ?>
          <div class="cont">
            <?php echo $cont?>
          </div>
        </div>
        <div class="bt_wrap">
          <a href="./board.php">목록</a>

          <!-- below code is added by junhyeong lee, nickname convey for chatting -->

          <?php
            if(strcmp($NICKNAME, $nick) == 1)
            {
          ?>
            <form name="chatform" action="" method="post">
              <input type="hidden" name="target_nick" value="<?php echo $nick?>"/>
              <input type="button" onClick="post_popup('chatform')" value="채팅">
            </form>
          <?php
            }
            else
            {
          ?>
          <form name="editform" action="./edit.php" method="post">
            <input type="hidden" name="postid" value="<?php echo $postid; ?>"/>
            <button type="submit" id="edit_btn" >수정</button>
          </form>
          <?php
            }
          ?>

          
          <!-- until this line -->
          <!-- <a href="../chat/chat.html" class="on">채팅</a> -->

          <!--로그인 상태일 때만 사용 가능하도록 구현 부탁 + already implemented in chat.html by session (junhyeong lee)-->
        </div>
      </div>
    </div>
    <?php include_once("./header/footer.php")?>
  </body>
</html>
