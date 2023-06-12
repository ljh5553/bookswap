<?php
    $db = new mysqli("localhost", "root", "database_password", "bookswap");

    if(!$db) {
        die("Database connection error : " .mysql_error());
    }

    function sq($query) {
        global $db;
        return $db->query($query);
    }
?>
