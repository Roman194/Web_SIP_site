<?php
require 'database.php';
require 'auth.php';

$bio_commited_text = $_POST['bio_commited_text'];
$bio_text = $_POST['bio_input_text'];

$query = "UPDATE `sip_bio` SET `bio_text`='".$bio_text."' WHERE `bio_text`='".$bio_commited_text."'";

if($is_query_run = mysqli_query($mysqli,$query)){
    echo "Абзац успешно изменён!"; 
}else
{ 
    echo "Не получилось изменить абзац!"; 
} 

?>