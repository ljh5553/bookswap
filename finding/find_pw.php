<?php
    include "../db_info.php";
?>

<?php
  error_reporting( E_ALL );
  ini_set( "display_errors", 0 );
?>

<?php
    $ID = $_POST['ID'];
    $sql = 'SELECT user_password FROM user WHERE user_id = "' . $ID . '"';
    $result = sq($sql);
    $row_count = mysqli_num_rows($result);

    if($row_count != 0)
    {
        $rs = $result->fetch_object();
        echo "<script>alert('비밀번호는 $rs->user_password 입니다.'); location.href='../login/login.html'</script>";
    }
    else
    {
        echo "<script>alert('아이디가 없거나 틀립니다.'); location.href='../login/login.html'</script>";
    }
?>