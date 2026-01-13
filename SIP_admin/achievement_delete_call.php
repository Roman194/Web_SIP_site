<?php
require 'database.php';
require 'auth.php';

$achievement_id = $_POST['achievement_id'];

$query = "DELETE FROM `sip_achievments` WHERE `id`='".$achievement_id."'";


if($is_query_run = mysqli_query($mysqli,$query)){
    echo "Достижение успешно удалёно!"; 
}else
{ 
    echo "Не получилось удалить достижение!"; 
} 
?>