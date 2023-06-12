<!--
    Author : SeoIn Lee
    File Name : list_write.html -> write.php (Modified by JunHyeong Lee)
    Format : HTML
    Description : For posting on board
-->

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>교환 게시물 작성</title>
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
      <div class="board_write_wrap">
        <form name="write" action="write_proc.php" method="post" enctype="multipart/form-data">
          <div class="board_write">
            <div class="title">
              <dl>
                <dt>제목</dt>
                <dd><input type="text" name="subject" placeholder="제목 입력" /></dd>
              </dl>
            </div>
            <div class="info">
              <dl>
                <dt>첨부파일</dt>
                <dd>
                  <input
                    type="file"
                    name="image"
                    accept="image/png, image/jpeg, image/jpg"
                  />
                </dd>
              </dl>
            </div>
            <div class="cont">
              <textarea name="contents" placeholder="내용 입력"></textarea>
            </div>
          </div>
        <div class="bt_wrap">
          <button type="sumbit" id="write_btn">등록</button>
          </form>
          <a href="javascript:window.history.back();">취소</a>
        </div>
      </div>
    </div>
    <?php include_once("./header/footer.php"); // put footer on page?>
  </body>
</html>
