<?php
function databasePing()
{
    $result = '';
    if (mysql_ping() == 0) {
        $result = mysql_error();
    } else {
        $result = 'Database connection successful.';
    }
    return $result;
}

?>