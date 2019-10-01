<?php
function Dbconnect()
{
    $link = mysql_connect("localhost", "root", "");
    if (!$link) {
        exit();
    }

    $con = mysql_select_db("project_db", $link);
    if (!$con) {
        exit();
    }

    return $link;

}
