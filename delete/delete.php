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
    $sql = 'DELETE FROM user WHERE user_id = "' . $ID . '" AND user_password = "' . $PW . '"';
    $result = sq($sql);
    $affected_count = $db->affected_rows;

    if($affected_count == 0)
    {
        echo "<script>alert('아이디 또는 비밀번호가 틀립니다.');  history.back();</script>";
    }
    else
    {
        echo "<script>alert('삭제되었습니다.'); location.href='../index.php'</script>";
        require_once("../logout/logout.php");
    }
?>