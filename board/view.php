<!--
    Author : SeoIn Lee(HTML), JunHyeong Lee(PHP)
    File Name : list_view.html -> view.php (Modified by JunHyeong Lee)
    Format : HTML
    Description : viewer for postings
-->

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>교환 게시물 상세</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/list.css" />

    <!-- Popup function for chatting page -->
    <script type="text/javascript" language="javascript">
        function open_pop(frm)
        {
            var title = "chatopener";
            var url = "../chat/chat.php";
            window.open("", title, "width = 430, height = 666, resizable = no");

            frm.action = url;
            frm.method = "post";
            frm.target = title;
            frm.submit();
        }
    </script>

  </head>
  <body>

  <?php
  // login session check
    session_save_path("../session");
    session_start();
    if(isset($_SESSION['ID'])) // if user login already
    {
        $ID = $_SESSION['ID'];
        $NICKNAME = $_SESSION['NICK'];
    }
	  else // if user is not logged in
	  {
		  echo "<script>alert('게시글을 보려면 로그인해야 합니다!');</script>";
      echo "<script>location.href='../login/login.html'</script>";
	  }

    include_once("../header/header.php"); // put header
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

        $postid = $_GET['id']; // get post id by GET method

        $sql = 'SELECT * FROM post WHERE post_id = ' . $postid; // sql query
        $result = sq($sql);
        $row_count = mysqli_num_rows($result);

        if($row_count != 0 ) // if result is found
        {
          $rs = $result->fetch_object();

          $sub = $rs->subject;
          $nick = $rs->writer;
          $cont = $rs->contents;
        }
        else // if posting is not exist
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
          // checking image is available
                $img_rs=mysqli_fetch_array(sq('SELECT image FROM post WHERE post_id = '. $postid));
                if(!is_null($img_rs['image'])) // if image exists
                {
          ?>
          <div class="info">
            <?php echo '<img src="data:image;base64,'. base64_encode($img_rs['image']).'" style="height: 300px" />'; // print image?>
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
            if($NICKNAME !== $nick) // if the posting is not mine, display chatting button
            {
          ?>
            <form name="chatting">
              <input type="hidden" name="target_nick" value="<?php echo $nick?>"/>
              <input type="button" value="채팅" onclick="javascript:open_pop(this.form)">
            </form>
          <?php
            }
            else // if the posting is mine, display edit button
            {
          ?>
          <form name="editform" action="./edit.php" method="post">
            <input type="hidden" name="postid" value="<?php echo $postid; ?>"/>
            <button type="submit" id="edit_btn" >수정</button>
          </form>
          <?php
            }
          ?>
        </div>
      </div>
    </div>
    <?php include_once("./header/footer.php")?>
  </body>
</html>
