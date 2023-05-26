<!--
    Author : JunHyeong Lee
    File Name : edit.php
    Format : PHP
    Description : Edit posting on board by connecting MariaDB
-->

<?php
    include "../db_info.php";
?>

<?php
  error_reporting( E_ALL );
  ini_set( "display_errors", 0 );
?>

<?php
    $postid = $_POST['postid'];
    $sub = $_POST['subject'];
    $img = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $cont = $_POST['contents'];
    
    if(is_uploaded_file($_FILES['image']['tmp_name'])) // if user is uploaded picture
    {
        $sql = 'UPDATE post SET subject = "' . $sub . '", contents = "' . $cont . '", image = "' . $img . '" WHERE post_id = ' . $postid;
    }
    else // if user is NOT uploaded picture
    {
        $sql = 'UPDATE post SET subject = "' . $sub . '", contents = "' . $cont . '" WHERE post_id = ' . $postid;
    }

    $result = sq($sql);
    echo "<script>alert('수정되었습니다.'); location.href='./board.php'</script>";
?>