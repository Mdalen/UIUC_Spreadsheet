<?php

//db_conn.php
//this serves as another layer of abstraction for ease of use
//just make sure this is included, and the connection you specify in db_info.php
//will always be in the $db variable

//including the connection information
//be sure to edit this file instead of modifying the code in this file to make things easy
include 'db_info.php';


//connecting to the database using PDO
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset='.$db_charset, $db_user, $db_pass);

//setting a few values to ensure security
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
