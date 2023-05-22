<?php
    include "../db_info.php";
?>

<?php
if(!$_GET['date'])
{
	$_GET['date'] = date('Y-m-d H:i:s');

	$db->query('SET NAMES utf8');
	$target_id = "chattest";
	$res = $db->query("SELECT * FROM chat WHERE sender = '$ID' AND receiver = '$target_id'");
	//target_id 변수는 테스트용이므로 꼭 HTML과 연동해 받는 사람 아이디로 바꿔줘야함
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
	$res = $db->query('SELECT * FROM chat WHERE date > "' . $_GET['date'] . '" AND sender = "' . $ID . '" AND receiver = "' . $target_id . '"');
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
