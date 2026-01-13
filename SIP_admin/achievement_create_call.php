<?php
require 'database.php';

$achievement_text = $_POST['achievement_text'];
$achievement_year = $_POST['achievement_year'];

$query = "INSERT INTO `sip_achievments`(`achievment_text`, `year_of_achievement`) VALUES ('".$achievement_text."','".$achievement_year."')";

if($is_query_run = mysqli_query($mysqli,$query)){
    echo "Достижение успешно добавлено!"; 
}else
{ 
    echo "Не получилось добавить новое достижение!"; 
} 

?>