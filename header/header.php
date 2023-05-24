<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/reset.css">
        <link rel="stylesheet" href="../styles/main_page.css">
    </head>
<body>

    <?php
        session_save_path("./session");
        if (isset($_SESSION)){session_start();}
    ?>

    <header>
        <div class="wrapper" > <!--상단매뉴-->
            <h1>Book Swap</h1>
            <nav>
            <ul class="menu">
                <?php
                if(!isset($_SESSION['ID'])) {
                ?>
                    <li><?php echo "로그인 후 이용하세요."?></li>
                    <li><a href="../login/login.html">로그인</a></li>
                    <li><a href="../finding/find_pw.html">비밀번호 찾기</a></li>
                    <li><a href="../finding/find_id.html">아이디 찾기</a></li>
                <?php
                }else {
                ?>
                    <li><?php echo $NICKNAME . "님 환영합니다!"?></a></li>
                    <li><a href="../logout/logout.php">로그아웃</a></li>
                    <li><a href="../delete/delete.html">탈퇴하기</a></li>
                    <li><a href="../board/board.php">책 등록</a></li> <!--추후 연결링크 수정-->
                    <li><a href="../board/board.php">거래현황</a></li> <!--추후 연결링크 수정-->
                <?php
                }
                ?>
            </ul>
            </nav>
        </div>
    </header>
</body>