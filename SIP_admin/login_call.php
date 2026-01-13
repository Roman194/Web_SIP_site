<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
      rel="stylesheet"
    />

    <title>SIP admin login</title>

    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>

    <div id="header" class="header">
        <div class="header__inner">
            <img class="header__SIP-logo" src="assets/SIP_label.svg" alt="Smash Into Pieces" />
            <p>
                <?php 

                    require 'database.php'; 

                    $username = $_POST["username_or_email_text"];
                    $password = $_POST["password_text"];

                    $query = "SELECT * FROM `sip_admins` WHERE `username`='".$username."' OR `email`='".$username."'";

                    if($is_query_run = mysqli_query($mysqli,$query)){

                        $user = $is_query_run->fetch_assoc();

                        if($user && $user["password"] == $password){

                            session_start();
                            $_SESSION['user_id'] = $user['id'];
                            $_SESSION['username'] = $user['username'];

                            echo "Добро пожаловать, " . $user['username'] . "!";

                            header("Location: index.php");

                            exit();


                        }else
                        { 
                            echo "Неверное имя пользователя или пароль!"; 
                            //exit();
                        } 
                    }
                ?>
            </p>
            <div class="back__to__login">
                <a href='login.php'>Вернуться к странице входа</a>
            <div>
        </div>
    </div>
    

    </body>
</html>