<?php

$user = 'root';
$password = '';

$database = 'sip_info';

$servername='localhost:3307';
$mysqli = new mysqli($servername, $user,
                $password, $database);

// Checking for connections
if (!$mysqli){
    echo "Connection Unsuccessful!!!";
}

?>