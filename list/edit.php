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
    
    if(isset($img))
    {
        $sql = 'UPDATE post SET subject = "' . $sub . '", contents = "' . $cont . '", image = "' . $img . '" WHERE post_id = ' . $postid;
        $result = sq($sql);
        $affected_count = $db->affected_rows;
        
        if($affected_count != 0) {
            echo "<script>alert('수정되었습니다.'); location.href='.list_main.php'</script>";
        } else {
            echo "<script>alert('게시글 수정 중 오류가 발생했습니다.'); history.back();</script>";
        }
    }
    else
    {
        $sql = 'UPDATE post SET subject = "' . $sub . '", contents = "' . $cont . '" WHERE post_id = ' . $postid;
        $result = sq($sql);
        $affected_count = $db->affected_rows;
        
        if($affected_count != 0) {
            echo "<script>alert('수정되었습니다.'); location.href='.list_main.php'</script>";
        } else {
            echo "<script>alert('게시글 수정 중 오류가 발생했습니다.'); history.back();</script>";
        }
    }
?>