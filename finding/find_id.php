<?php
    include "../db_info.php";
?>

<?php
  error_reporting( E_ALL );
  ini_set( "display_errors", 0 );
?>

<?php
    $NICK = $_POST['nickname'];
    $sql = 'SELECT user_id FROM user WHERE user_nickname = "' . $NICK . '"';
    $result = sq($sql);
    $row_count = mysqli_num_rows($result);

    if($row_count != 0)
    {
        $rs = $result->fetch_object();
        echo "<script>alert('아이디는 $rs->user_id 입니다.'); location.href='../login/login.html'</script>";
    }
    else
    {
        echo "<script>alert('아이디가 없거나, 닉네임이 틀립니다.'); location.href='../login/login.html'</script>";
    }
?>