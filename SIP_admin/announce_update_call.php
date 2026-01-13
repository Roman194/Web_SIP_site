<?php
require 'database.php';
require 'auth.php';

$announce_id = $_POST['announce_id'];
$announce_title = $_POST['announce_title'];
$announce_text = $_POST['announce_text'];
$announce_button = $_POST['announce_button_text'];

$query = "UPDATE `sip_announces` SET `announce_title`='".$announce_title."',`announce_text`='".$announce_text."',`announce_button_text`='".$announce_button."' WHERE `announce_id`='".$announce_id."'";

if($is_query_run = mysqli_query($mysqli,$query)){
    echo "Анонс успешно изменён!"; 
}else
{ 
    echo "Не получилось изменить анонс!"; 
} 

?>