<!--
    Author : JunHyeong Lee
    File Name :chat.php
    Format : PHP
    Description : Chatting page for basic information exchange, by ajax polling

    NOTE : proc.php and write.php are omitted comments.
    It is because putting comments on them causing errors, so i put their basic infos here.

    Author : JunHyeong Lee
    File Name :chat_proc.php
    Format : PHP
    Description : Getting chat history and new chat in database

    Author : JunHyeong Lee
    File Name : write.php
    Format : PHP
    Description : Add new chat information in database
-->

<!DOCTYPE html>
<html lang="ko">
<head>
<title>Chatting</title>
<meta charset="utf-8">
<script type="text/javascript" src="./chat.js?v=<?php echo date("Y-m-d H:i:s", time());?>"></script>
<link rel="stylesheet" type="text/css" href="../styles/chat.css?v=<?php echo date("Y-m-d H:i:s", time());?>">
</head>
<body>
	
<?php
// check login by session
    session_save_path("../session");
    session_start();
    if(isset($_SESSION['ID'])) // if user is logged in
    {
        $ID = $_SESSION['ID'];
        $NICKNAME = $_SESSION['NICK'];
        $target = $_POST['target_nick'];
        //echo $NICKNAME . "님 환영합니다!";
    }
	else // if user is not loggin in
	{
		echo "<script>alert('채팅 기능을 사용하려면 로그인해야 합니다!');</script>";
        echo "<script>location.href='../login/login.html'</script>";
	}
    ?>

<dl id="list"></dl>
<form onsubmit="chatManager.write(this); return false;">
	<input name="receiver" id="receiver" type="hidden" value="<?php echo $target; ?>"/>
	<input name="msg" id="msg" type="text" />
	<input name="btn" id="btn" type="submit" value="전송" />
</form>
</body>
</html>