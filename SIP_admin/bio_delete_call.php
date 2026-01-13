<?php
require 'database.php';
require 'auth.php';

$bio_commited_text = $_POST['bio_commited_text'];

$query = "DELETE FROM `sip_bio` WHERE `bio_text`='".$bio_commited_text."'";

if($is_query_run = mysqli_query($mysqli,$query)){
    echo "Абзац успешно удалён!"; 
}else
{ 
    echo "Не получилось удалить абзац!"; 
} 
        
?>