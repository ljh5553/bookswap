<!--
    Author : 이서인
    File Name : list_edit.html
    Format : HTML
    Description : 현재 1번 게시물 기준 목업데이터 상태로 세팅
-->

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>교환 게시물 수정</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/list.css" />
  </head>
  <body>
    <h1>
      <a href="../index.php"
        ><img src="../image/logo.png" alt="로고"
      /></a>
    </h1>
    <div class="board_wrap">
      <div class="board_title">
        <strong>교환 게시판</strong>
        <p>교환할 책을 등록하세요</p>
      </div>

      <?php
        include "../db_info.php";

        $postid = $_GET['id'];

        $sql = 'SELECT * FROM post WHERE post_id = ' . '$postid' . '"';
        $result = sq($sql);
        $row_count = mysqli_num_rows($result);

        if($row_count != 0 )
        {
          $rs = $result->fetch_object();

          $sub = $rs->subject;
          $nick = $rs->writer;
          $image = $rs->image;
          $cont = $rs->contents;
        }
        else
        {
          echo "<script>alert('게시글을 불러오는 중 오류가 발생했습니다.');</script>";
        }
      ?>
      <div class="board_write_wrap">
      <form name="edit" action="edit.php" method="post">
        <div class="board_write">
          <div class="title">
            <dl>
              <dt>제목</dt>
              <dd>
                <input
                  type="text"
                  name="subject"
                  placeholder="제목 입력"
                  value="<?php echo $sub ?>"
                />
              </dd>
            </dl>
          </div>
          <div class="info">
            <dl>
              <dt>비밀번호</dt>
              <dd>
                <input
                  type="password"
                  name="password"
                  placeholder="비밀번호 입력"
                  value="1234"
                />
              </dd>
            </dl>
          </div>
          <div class="info">
            <dl>
              <dt>첨부파일</dt>
              <dd>
                <input type="file" name="image" accept="image/png, image/jpeg, image/jpg" />
              </dd>
            </dl>
          </div>
          <div class="info">
            <img src="data:image;base64,'.base64_encode($image).'" style="height: 300px" />
          </div>
          <div class="cont">
            <textarea name="contents" placeholder="내용 입력" required>
              <?php echo $cont ?>
            </textarea>
          </div>
        </div>
        <input type="hidden" name="postid" value="<?php echo $postid?>"/>
        <div class="bt_wrap">
            <button type="sumbit" id="edit_btn">완료</button>
      </form>
          <a href="list_mine.html">취소</a>
        </div>
      </div>
    </div>
  </body>
</html>
