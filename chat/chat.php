<!DOCTYPE html>
<html lang="ko">
<head>
<title>Chatting</title>
<meta charset="utf-8">
<script type="text/javascript" src="chat.js"></script>
<link rel="stylesheet" type="text/css" href="chat.css" />
</head>
<body>

<?php
    include "./db_info.php";
    
    session_save_path("./session");
    session_start();
    if(isset($_SESSION['ID']))
    {
        $ID = $_SESSION['ID'];
        $NICKNAME = $_SESSION['NICK'];
    }
	else
	{
		echo "<script>alert('채팅 기능은 로그인 후 이용할 수 있습니다!');</script>";
        echo "<script>location.href='../login/login.html'</script>";
	}
?>

<dl id="list"></dl>
<form onsubmit="chatManager.write(this); return false;">
	<input name="receiver" id="receiver" type="text" value="받을 사람 입력" />
	<input name="msg" id="msg" type="text" />
	<input name="btn" id="btn" type="submit" value="전송" />
</form>
</body>
</html>