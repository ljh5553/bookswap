<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>
<body>
    <?php
    include "./db_info.php";
    
    session_save_path("./session");
    session_start();
    if(isset($_SESSION['ID']))
    {
        $ID = $_SESSION['ID'];
        $NICKNAME = $_SESSION['NICK'];
        echo $NICKNAME . "님 환영합니다!";
    }
    else
    {
        echo "기능을 전부 사용하려면 로그인하세요.";
    }
    ?>

    <h1>세상에서 가장 단촐한 메인 페이지</h1>
    <button type="button" onclick="location.href='./signup/signup.html' ">회원가입</button>
    <button type="button" onclick="location.href='./login/login.html' ">로그인</button>
    <button type="button" onclick="location.href='./chat/chat.php' ">채팅</button>
    <button type="button" onclick="location.href='./logout/logout.php' ">로그아웃</button>
</body>
</html>
