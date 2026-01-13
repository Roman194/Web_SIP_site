<?php
require 'database.php';
require 'auth.php';

$achievement_id = $_POST['achievement_id'];
$achievement_text = $_POST['achievement_text'];
$achievement_year = $_POST['achievement_year'];

$query = "UPDATE `sip_achievments` SET `achievment_text`='".$achievement_text."',`year_of_achievement`='".$achievement_year."' WHERE `id`='".$achievement_id."'";

if($is_query_run = mysqli_query($mysqli,$query)){
    echo "Достижение успешно обновлено!"; 
}else
{ 
    echo "Не получилось обновить достижение!"; 
} 

?>