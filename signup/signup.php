<!--
    Author : 김지성, 이준형
    File Name : singup.php
    Format : PHP
    Description : 회원가입 기능을 수행하는 PHP, phpmailer로 연동됨
-->

<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1);
?>
<?php
    include "../db_info.php";
    include('../phpmailer/src/Exception.php');
    include('../phpmailer/src/PHPMailer.php');
    include('../phpmailer/src/SMTP.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
?>
<?php
    $ID = addslashes($_POST['ID']);
    $PW1 = addslashes($_POST['password1']);
    $PW2 = addslashes($_POST['password2']);
    $NICKNAME = addslashes($_POST['nickname']);
    //$EMAIL = addslashes($_POST['email']); Legacy 코드로 사용하지 않음
    
    if($PW1 == $PW2) {
        $sql1 = "SELECT * FROM user WHERE `user_id` = '" . $ID . "'";
        $result1 = sq($sql1);
        $row_count1 = mysqli_num_rows($result1);

        if($row_count1 == 0) {
            $hash = md5(rand(0, 1000));

            $mail = new PHPMailer(true);
            $mail->IsSMTP();

            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Port = 465;
            $mail->SMTPSecure = "ssl";
            $mail->Username   = "ljh5553@gmail.com";
            $mail->Password   = "구글메일_비밀번호";
            $mail->CharSet = "utf-8";
            $mail->SetFrom('bookswap@gmail.com', 'email verify');
            $mail->AddAddress($ID."@gachon.ac.kr", $ID);

            $mail->Subject = 'BOOKSWAP EMAIL VERIFY';       
            $mail->MsgHTML("Click url to verify your email ! 
                            http://211.243.231.147:808/signup/verify.php?email=$ID&hash=$hash");

            $mail->send();

            $sql2 = "INSERT INTO user VALUES(NULL, '$ID', '$PW1', '$NICKNAME', 0, '$hash')";
            $result2 = sq($sql2);
            echo "<script>alert('성공적으로 회원가입되었습니다. 이메일로 계정을 인증해주세요.');location.href = '../index.php';</script>";
        } else {
            echo "<script>alert('이미 같은 ID로 가입한 유저가 있습니다.'); history.back();</script>";
        }
    } else {
        echo "<script>alert('비밀번호가 서로 다릅니다.'); history.back();</script>";
    }
?>

<script>
</script>
