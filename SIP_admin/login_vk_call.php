<?php 
    require 'database.php'; 

    $email = $_POST["email"];

    $query = "SELECT * FROM `sip_admins` WHERE `email`='".$email."'";

    if($is_query_run = mysqli_query($mysqli,$query)){

        $user = $is_query_run->fetch_assoc();

        if($user){

            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            //echo "Добро пожаловать, " . $user['username'] . "!";

            echo json_encode(['redirect' => 'index.php']);

            exit();
        }else
        { 
            echo json_encode(['registration_fail' => "Не удалось найти зарегистрированного пользователя! \n\r Попробуйте войти с помощью классической формы входа"]); 
            //exit();
        } 
    }
?>