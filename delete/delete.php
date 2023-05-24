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
    $sql = 'SELECT * FROM user WHERE user_id = "' . $ID . '" AND user_password "' . $PW . '"';
    $result = sq($sql);
    $row_count = mysqli_num_rows($result);

    if($row_count != 0)
    {
        $del = 'DELETE FROM user WHERE user_id = "' . $ID . '" AND user_password "' . $PW . '"';
        $temp = sq($sql);
    }
    else
    {
        echo "<script>alert('아이디 또는 비밀번호가 틀립니다.');</script>";
    }
?>