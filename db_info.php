<?php
    $db = new mysqli("localhost", "root", "데이터베이스_비밀번호", "bookswap");

    if(!$db) {
        die("Database connection error : " .mysql_error());
    }

    function sq($query) {
        global $db;
        return $db->query($query);
    }
?>
