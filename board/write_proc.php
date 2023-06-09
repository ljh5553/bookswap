<!--
    Author : JunHyeong Lee
    File Name : write_proc.php
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
// check login status by session
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
		echo "<script>alert('게시글을 작성하려면 로그인해야 합니다!');</script>";
        echo "<script>location.href='../login/login.html'</script>";
	}
?>

<?php
    // variables for posting
    $sub = $_POST['subject'];
    $img = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $cont = $_POST['contents'];

    if(!is_uploaded_file($_FILES['image']['tmp_name'])) // if user upload image
    {
        $sql = 'INSERT INTO post (post_id, writer, subject, contents, date) VALUES (NULL, (SELECT user_nickname FROM user WHERE user_nickname = "' . $NICKNAME . '"), "' . $sub . '", "' . $cont . '", NOW())';
        $result = sq($sql);

        echo "<script>alert('게시글이 작성되었습니다.'); location.href='./board.php'</script>";
    }
    else // if user is not upload image
    {
        $sql = 'INSERT INTO post (post_id, writer, subject, contents, image, date) VALUES (NULL, (SELECT user_nickname FROM user WHERE user_nickname = "' . $NICKNAME . '"), "' . $sub . '", "' . $cont . '", "' . $img . '", NOW())';
        $result = sq($sql);
        echo "<script>alert('게시글이 작성되었습니다.'); location.href='./board.php'</script>";
    }
    
?>