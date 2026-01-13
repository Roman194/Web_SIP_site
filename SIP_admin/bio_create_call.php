<?php
require 'database.php';
require 'auth.php';

$bio_text = $_POST['bio_input_text'];

$query = "INSERT INTO `sip_bio`(`bio_text`) VALUES ('".$bio_text."')";

if($is_query_run = mysqli_query($mysqli,$query)){
    echo "Абзац успешно добавлен!"; 
}else
{ 
    echo "Не получилось добавить новый абзац!"; 
} 

?>