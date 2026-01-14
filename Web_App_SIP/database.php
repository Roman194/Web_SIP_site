<?php

$user = 'root';
$password = '';

$database = 'sip_info';

$servername='localhost:3308';
$mysqli = new mysqli($servername, $user,
                $password, $database);

// Checking for connections
if (!$mysqli){
    echo "Connection Unsuccessful!!!";
}

?>