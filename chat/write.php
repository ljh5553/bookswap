<?php
    include "../db_info.php";

	session_save_path("../session");
    session_start();
    if(isset($_SESSION['ID']))
	{
        $ID=$_SESSION['ID'];
    }
	else
	{
        echo "<script>alert('채팅을 사용하려면 먼저 로그인해야 합니다!');</script>";
        echo "<script>location.href='../login/login.html'</script>";
    }
?>

<?php
$db->query('SET NAMES utf8');
$db->query('
	INSERT INTO chat(sender, receiver, msg, date)
	VALUES(
		"' . $db->real_escape_string($ID) . '",
		"' . $db->real_escape_string($_POST['receiver']) . '",
		"' . $db->real_escape_string($_POST['msg']) . '",
		NOW()
	)
');
?>
