<?php
    include "../db_info.php";

	session_save_path("../session");
    session_start();
    if(isset($_SESSION['ID']))
    {
        $ID = $_SESSION['ID'];
        $NICKNAME = $_SESSION['NICK'];
    }
?>

<?php
$target_nick = $_GET['user'];

if(!$_GET['date'])
{
	$_GET['date'] = date('Y-m-d H:i:s');

	$db->query('SET NAMES utf8');
	$res = $db->query('SELECT * FROM chat WHERE (sender = "' . $NICKNAME . '" AND receiver = "' . $target_nick . '") OR (sender = "' . $target_nick . '" AND receiver = "' . $NICKNAME . '")');
	$data = array();
	$date = $_GET['date'];

	while($v = $res->fetch_array(MYSQLI_ASSOC))
	{
		$data[] = $v;
		$date = $v['date'];
	}

	echo json_encode(array('date' => $date, 'data' => $data));
}

else
{
	$db->query('SET NAMES utf8');
	$res = $db->query('SELECT * FROM chat WHERE date > "' . $_GET['date'] . '" AND ((sender = "' . $NICKNAME . '" AND receiver = "' . $target_nick . '") OR (sender = "' . $target_nick . '" AND receiver = "' . $NICKNAME . '"))');
	$data = array();
	$date = $_GET['date'];
	
	while($v = $res->fetch_array(MYSQLI_ASSOC))
	{
		$data[] = $v;
		$date = $v['date'];
	}
	
	echo json_encode(array('date' => $date, 'data' => $data));
}

?>
