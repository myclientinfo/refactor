<?php
$dbh = @mysql_connect('localhost', 'homestead', 'secret');

if (!$dbh) {
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db('Refactor');
if (!$db_selected) {
    die ('Cannot use foo : ' . mysql_error());
}
?>