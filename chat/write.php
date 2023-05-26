<?php
    include "../db_info.php";

	session_save_path("../session");
    session_start();
    if(isset($_SESSION['ID']))
	{
        $ID=$_SESSION['ID'];
		$NICKNAME=$_SESSION['NICK'];
    }
?>

<?php
$db->query('SET NAMES utf8');
$db->query('
	INSERT INTO chat(sender, receiver, msg, date)
	VALUES(
		"' . $db->real_escape_string($NICKNAME) . '",
		"' . $db->real_escape_string($_POST['receiver']) . '",
		"' . $db->real_escape_string($_POST['msg']) . '",
		NOW()
	)
');
?>
