<!--
    Author : 이서인
    File Name : list_write.html
    Format : HTML
    Description : 등록 시, 현재 1번 게시물 목업데이터 업로드
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
        <form name="write" action="write.php" method="post">
          <div class="board_write">
            <div class="title">
              <dl>
                <dt>제목</dt>
                <dd><input type="text" name="subject" placeholder="제목 입력" /></dd>
              </dl>
            </div>
            <div class="info">
              <dl>
                <dt>비밀번호</dt>
                <dd>
                  <input type="password" placeholder="비밀번호 입력" />
                </dd>
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
          <a href="list_main.html">취소</a>
        </div>
      </div>
    </div>
  </body>
</html>
