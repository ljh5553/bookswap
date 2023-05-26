<!--
    Author : JunHyeong Lee
    File Name : write.php
    Format : PHP
    Description : Write posting on board by connecting MariaDB
-->

<?php
    include "../db_info.php";
?>

<?php
  error_reporting( E_ALL );
  ini_set( "display_errors", 0 );
?>

<?php
    session_save_path("../session");
    session_start();
    if(isset($_SESSION['ID']))
    {
        $ID = $_SESSION['ID'];
        $NICKNAME = $_SESSION['NICK'];
        //echo $NICKNAME . "님 환영합니다!";
    }
	else
	{
		;
	}
?>

<?php
    $sub = $_POST['subject'];
    $img = file_get_contents($_FILES['image']['tmp_name']);
    $cont = $_POST['contents'];

    if(!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name']))
    {
        //INSERT INTO post (post_id, writer, subject, contents, image, date) VALUES (NULL, (SELECT user_nickname FROM user WHERE user_nickname = "$NICKNAME"), "$sub", "$cont", "$img", NOW())
        $sql = 'INSERT INTO post (post_id, writer, subject, contents, date) VALUES (NULL, (SELECT user_nickname FROM user WHERE user_nickname = "' . $NICKNAME . '"), "' . $sub . '", "' . $cont . '", NOW())';
        $result = sq($sql);
        //$affected_count = $db->affected_rows;
        
        //if($affected_count != 0) {
            echo "<script>alert('게시글이 작성되었습니다.'); location.href='./list_main.php'</script>";
        //} else {
        //    echo "<script>alert('게시글 작성 중 오류가 발생했습니다.'); history.back();</script>";
        //}
    }
    else
    {
        $sql = 'INSERT INTO post (post_id, writer, subject, contents, image, date) VALUES (NULL, (SELECT user_nickname FROM user WHERE user_nickname = "' . $NICKNAME . '"), "' . $sub . '", "' . $cont . '", "' . $img . '", NOW())';
        $result = sq($sql);
        //$affected_count = $db->affected_rows;
        
        //if($affected_count != 0) {
            echo "<script>alert('게시글이 작성되었습니다.'); location.href='./list_main.php'</script>";
        //} else {
        //    echo "<script>alert('게시글 작성 중 오류가 발생했습니다.'); history.back();</script>";
        //}
    }
    
?>