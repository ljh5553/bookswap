<!--
    Author : 이혜영
    File Name : my_page.html
    Format : HTML
    Description : 거래현황 페이지
-->

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
  <head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta
      name="author"
      content="Mark Otto, Jacob Thornton, and Bootstrap contributors, 이혜영"
    />
    <meta name="generator" content="Hugo 0.111.3" />
    <title>My Page</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/my_page.css" />
    <link
      rel="canonical"
      href="https://getbootstrap.com/docs/5.3/examples/album/"
    />

    <!--CSS Style copy by URL (Not mine. I just edited it)-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />

    <!-- Favicons -->
    <link
      rel="apple-touch-icon"
      href="/docs/5.3/assets/img/favicons/apple-touch-icon.png"
      sizes="180x180"
    />
    <link
      rel="icon"
      href="/docs/5.3/assets/img/favicons/favicon-32x32.png"
      sizes="32x32"
      type="image/png"
    />
    <link
      rel="icon"
      href="/docs/5.3/assets/img/favicons/favicon-16x16.png"
      sizes="16x16"
      type="image/png"
    />
    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json" />
    <link
      rel="mask-icon"
      href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg"
      color="#712cf9"
    />
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico" />
    <meta name="theme-color" content="#712cf9" />
  </head>

  <body>

    <?php
          // login session check
          session_save_path("../session");
          session_start();
          if(isset($_SESSION['ID']))
          {
              $ID = $_SESSION['ID'];
              $NICKNAME = $_SESSION['NICK'];
          }
          else
          {
            // access deny if user is not logged in
            echo "<script>alert('게시글 현황을 확인하려면 로그인해야 합니다!');</script>";
            echo "<script>location.href='../login/login.html'</script>";
          }

    ?>

    <div
      class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle"
    >
      <button
        class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
        id="bd-theme"
        type="button"
        aria-expanded="false"
        data-bs-toggle="dropdown"
        aria-label="Toggle theme (auto)"
      >
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
          <use href="#circle-half"></use>
        </svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul
        class="dropdown-menu dropdown-menu-end shadow"
        aria-labelledby="bd-theme-text"
      >
        <li>
          <button
            type="button"
            class="dropdown-item d-flex align-items-center"
            data-bs-theme-value="light"
            aria-pressed="false"
          >
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
              <use href="#sun-fill"></use>
            </svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em">
              <use href="#check2"></use>
            </svg>
          </button>
        </li>
        <li>
          <button
            type="button"
            class="dropdown-item d-flex align-items-center"
            data-bs-theme-value="dark"
            aria-pressed="false"
          >
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
              <use href="#moon-stars-fill"></use>
            </svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em">
              <use href="#check2"></use>
            </svg>
          </button>
        </li>
        <li>
          <button
            type="button"
            class="dropdown-item d-flex align-items-center active"
            data-bs-theme-value="auto"
            aria-pressed="true"
          >
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
              <use href="#circle-half"></use>
            </svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em">
              <use href="#check2"></use>
            </svg>
          </button>
        </li>
      </ul>
    </div>

    <main>
      <!--BODY 상단 부분-->
      <h1 class="page_logo">
        <a href="../index.php"
          ><img src="../image/logo.png" alt="로고"
        /></a>
      </h1>

      <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">책 거래 현황</h1>
            <p class="lead text-body-secondary">
              <br />선택한 책의 교환신청 및 등록해놓은 책들을 보실 수 있습니다.
            </p>
            <p>
              <a href="../board/board.php" class="btn btn-primary my-2"
                >메인으로 돌아가기</a
              >
              <!--임시로 시작페이지로 넣어놓음/ 완성되면 main으로 바꿔놓기! -> Modified -->
              <!-- <a href="#" class="btn btn-secondary my-2">Secondary action</a> 버튼2 나중에 필요하다면 부가적으로 사용-->
            </p>
          </div>
        </div>
      </section>

      <!--책 교환 신청 내역 TEXT-->
      <div>
        <h4 style="text-align: center">교환신청 및 등록 내역<br /></h4>
        <hr />
      </div>

      <!--신청한 책 정보 & 이미지 - column 왼쪽에서 오른쪽으로 차례대로-->
      <div class="album py-5 bg-body-tertiary">
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

          <?php
          // connect with DB
            include "../db_info.php";

            $sql = 'SELECT * FROM post WHERE writer = "' . $NICKNAME . '"'; // select post
            $result = sq($sql);
            
            while($posting = mysqli_fetch_array($result)) // print all post
            {
              $postid = $posting['post_id'];
              $sub = $posting['subject'];
              $nick = $posting['writer'];

              if($NICKNAME === $nick)
              {
                $is_mine = 1;
              }
              else
              {
                $is_mine = 0;
              }
              
          ?>

            <div class="col">
              <div class="card shadow-sm">
                <!--db에서 책 이미지 첨부파일 가져와서 src에다가 경로 저장-->
                <?php 
                $img_rs=mysqli_fetch_array(sq('SELECT image FROM post WHERE post_id = '. $postid));
                if(!is_null($img_rs['image']))
                {
                ?>
                <?php echo '<img src="data:image;base64,'. base64_encode($img_rs['image']).
                            '" style="height: 300px" 
                            class="bd-placeholder-img card-img-top"
                            width="100%"
                            height="180"/>'; ?>
                <?php } ?>
                <rect width="100%" />
                <div class="card-body">
                  <!--db에서 책 정보 가져와서 src에다가 경로 저장-->
                  <?php
                    if($is_mine === 0)
                    {
                      $target_url = "../chat/chat.php";
                    }
                    else
                    {
                      $target_url = '../board/view.php?id=' . $postid;
                    }
                  ?>
                  <p class="card-text">
                    <a href="<?php echo $target_url; ?>" class="book_title"><?php echo $sub ?></a>
                  </p>

                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <div class="btn-group">
                      <?php if ($is_mine === 0) { ?>
                      <script>
                        function btn() {
                          alert("책 교환 신청이 취소되었습니다.");
                        }
                      </script>
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                        onclick="javascript:btn()"
                      >수정</button>
                      <?php } else { ?>
                        <form name="editform" action="../board/edit.php" method="post">
                          <input type="hidden" name="postid" value="<?php echo $postid; ?>"/>
                          <button type="submit" id="edit_btn" class="btn btn-sm btn-outline-secondary">수정</button>
                        </form>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          </div>
        </div>
      </div>
    </main>

    <!--javascript source by URL-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
