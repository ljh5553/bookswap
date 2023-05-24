<!--
    Author : 김지성, 이준형
    File Name : login.php
    Format : PHP
    Description : 로그인 기능을 수행하는 PHP
-->

<?php
    include "../db_info.php";
?>

<?php
  error_reporting( E_ALL );
  ini_set( "display_errors", 0 );
?>

<?php
    $ID = $_POST['ID'];
    $PW = $_POST['password'];
    
    $sql = "SELECT * FROM user WHERE user_id = '$ID' AND user_password = '$PW'";
    $result = sq($sql);
    $row_count = mysqli_num_rows($result);
    
    if($row_count != 0) {
        $rs = $result->fetch_object();

        if($rs->active != 1) {
            echo "<script>alert('계정이 활성화되지 않았습니다! 이메일 인증 후 다시 로그인 해주세요.'); history.back();</script>";
        } else {
            session_save_path("../session");
            session_start();
            $session_path = session_save_path().'/sess_'.session_id();
            session_regenerate_id(true);
            $_SESSION['ID']=$rs->user_id;
            $_SESSION['PW']=$rs->user_password;
            $_SESSION['NICK']=$rs->user_nickname;
            echo "<script>location.href='../index.php';</script>";
            // 위 echo 부분은 로그인 성공 시 연결할 페이지로 바꿔줘야함!!
        }
    } else {
        echo "<script>alert('아이디가 없거나, 비밀번호가 틀립니다.');</script>";
    }
?>

<script>
    history.back();
</script>