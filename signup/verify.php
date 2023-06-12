<!--
    Author : JunHyeong Lee
    File Name : verify.php
    Format : PHP
    Description : Processing verification E-mail
-->

<?php
    include "../db_info.php";
    error_reporting(E_ALL);
    ini_set('display_errors', '0');
    session_start();

    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
    { // get email and hash info by GET method
    $email = $_GET['email']; 
    $hash = $_GET['hash']; 

    $sql1 = "SELECT user_id, hash, active FROM user WHERE user_id= '$email' AND hash= '$hash' AND active='0'";
    $result1 = sq($sql1) or die("result1에 문제가 있습니다.");
    $row_count1  = mysqli_num_rows($result1);
            
        if($row_count1 > 0) // all inputs are correct
        {
            $sql2 = "UPDATE user SET active = 1 WHERE user_id= '$email' AND hash = '$hash' AND active = 0";
            $result2 = sq($sql2) or die("result2에 문제가 있습니다.");
            echo "<script>alert('계정이 활성화 되었습니다 ! 로그인 후 이용해주세요 !'); location.href='../index.php'</script>";
        }
        else // there is error on inputs
        {
            echo "<script>alert('이미 활성화 되어있는 계정이거나 유효하지 않는 URL입니다. !'); location.href='../index.php'</script>";
        }
    
    }
    else
    {
        echo "<script>alert('이미 활성화 되어있는 계정이거나 유효하지 않는 URL입니다. !'); location.href='../index.php'</script>";
    }

?>