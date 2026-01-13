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

    <title>Smash Into Pieces admin</title>

    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="button.css" />

    <link rel="stylesheet" href="bio.css" />
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="achievements.css" />
    <link rel="stylesheet" href="announces.css" />

    <link rel="stylesheet" href="hero.css" />
    <link rel="stylesheet" href="tab.css" />
  </head>

  <body>
    <?php 
    require 'database.php';
    require 'auth.php';
    ?>

    <div id="header" class="header">
      <div class="header__logout">
        <a href='logout.php'>Выйти</a>
      </div>
      <div class="container">
        <div class="header__inner">
            <img class="header__SIP-logo" src="assets/SIP_label.svg" alt="Smash Into Pieces" />
            <p class="block-title header__title">Добро пожаловать в админ-панель сайта!</p>
        </div>
        <div class="header__support">
              <p class="grey-support-text">Получение справки по работе сайта: 8-800-555-35-35 (звонок бесплатный) или podderzgka_55@gmail.com</p>
        </div>
      </div>
    </div>

    <div class="tab-row">
      <button class="tab active" data-tab="tab-bio">Биография</button>
      <button class="tab" data-tab="tab-achievements">Достижения</button>
      <button class="tab" data-tab="tab-anounces">Анонсы</button>
    </div>

    <div class="tab-content">
      <div class="content active" id="tab-bio">
        <div id="bio" class="bio">
          <div class="container">
            <div class="bio__inner">
              <div class="bio__top">
                <!--https://upload.wikimedia.org/wikipedia/commons/6/6b/Smash_Into_Pieces_-_Melodifestivalen_2023%2C_Malm%C3%B6_207.jpg-->
                <img
                  class="bio__img"
                  src="assets/bio_logo.svg" 
                  alt="BIO logo"
                />
                <div class="bio__top-titles">
                  <p class="bio__suptitle">О Smash Into Pieces</p>
                  <p class="bio__title">Встречайте легендарную шведскую рок-группу!</p>
                </div>
              </div>

              <div class="bio__bottom">

                <div class="bio__bottom__update">
                  <p class="block-title bio__second-title">Биография</p>
                  <button class="outlined">Update</button>
                </div>

                <?php  
                $query = "SELECT * FROM `sip_bio`";
                if ($is_query_run = mysqli_query($mysqli,$query)) 
                { 
                  while ($query_executed = $is_query_run->fetch_assoc()) 
                  {
                ?>

                <div class="bio__text active">
                  <p class="bio__paragraph">
                    <?php echo $query_executed['bio_text']; ?>
                  </p>
                  <div class="bio__text__delete">
                    <button class="outlined">×</button>
                  </div>
                </div>

                <div class="bio__text__delete__confirm">
                  <form method="post" action="bio_delete_call.php">
                    
                    <div class="bio__text__delete-unvisible">
                      <input type="text" name="bio_commited_text" value="<?php echo $query_executed['bio_text'];?>">
                    </div>
                    <p>Подтвердите удаление выбранного абзаца</p>
                    <div class="bio__text__update-buttons">
                          <button type="submit">OK</button>
                          <div class="bio-list__item-reset"> 
                            <button type="reset">Отмена</button>
                          </div>
                      </div>
                    
                  </form>
                </div>

                <div class="bio__text__update">
                  <form method="post" action="bio_update_call.php">
                      <div class="bio__text__update-unvisible">
                        <input type="text" name="bio_commited_text" value="<?php echo $query_executed['bio_text'];?>">
                      </div>

                      <input type="text" name="bio_input_text" value="<?php echo $query_executed['bio_text']; ?>">
                      <div class="bio__text__update-buttons">
                          <button type="submit">OK</button>
                          <div class="bio-list__item-reset"> 
                            <button type="reset">Отмена</button>
                          </div>
                      </div>
                  </form>
                </div>
                <?php
                  }
                } 
                else
                { 
                  echo "Error in execution!"; 
                }  
                ?>

                <div class="bio__text__create">
                  <form method="post" action="bio_create_call.php">
                      <input type="text" name="bio_input_text" placeholder="Введите значение">
                      <div class="bio__text__update-buttons">
                          <button type="submit">OK</button>
                          <div class="bio-list__item-reset"> 
                            <button type="reset">Отмена</button>
                          </div>
                      </div>
                  </form>
                </div>

                <div class="bio__text__create__button active">
                  <button class="outlined extended">+</button>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="content" id="tab-achievements">
        <div id="achievements" class="achievements">
          <div class="container">
            <div class="achievements__inner">
              <div class="achievements__top">
                <p class="block-title">Достижения</p>
                <img class="cup-img" src="./assets/cup.svg" alt="Cup Icon" />
              </div>
              <div class="achievement-list">
                <?php  
                $query = "SELECT * FROM `sip_achievments` ORDER BY id";

                if ($is_query_run = mysqli_query($mysqli,$query)) 
                { 
                  while ($query_executed = $is_query_run->fetch_assoc()) 
                  {
                ?>
                <div class = "achievement-list__default__item active">
                  <div class="achievement-list__item">
                  •
                    <p><?php 
                        echo $query_executed['achievment_text'].' ('; 
                        echo $query_executed['year_of_achievement'].' г.)';
                      ?>
                    </p>
                    
                    <div class="achievement-list__delete__item">
                      <button type="submit" class="outlined">×</button>
                    </div>
                    <div class="achievement-list__update__default__item">
                      <button class="outlined extended">Update</button>
                    </div>
                  </div>
                </div>
                
                <div class="achievement-list__delete__confirm__item">
                  <div class="achievement-list__item"> 
                  • 
                    <form method="post" action="achievement_delete_call.php">
                      <div class="achievement-list__update__item-unvisible">
                        <input type="text" name="achievement_id" value="<?php echo $query_executed['id']; ?>">
                      </div>
                      <p>Подтвердите удаление выбранного достижения</p>
                      <button type="submit">OK</button>
                      <div class="achievement-list__item-reset"> 
                        <button type="reset">Отмена</button>
                      </div>
                    </form>
                  </div>
                </div>
                
                <div class="achievement-list__update__item">
                  <div class="achievement-list__item"> 
                  • 
                    <form method="post" action="achievement_update_call.php">
                      <div class="achievement-list__update__item-unvisible">
                        <input type="text" name="achievement_id" value="<?php echo $query_executed['id']; ?>">
                      </div>
                      <input type="text" name="achievement_text" value="<?php echo $query_executed['achievment_text']; ?>">
                      <input type="text" name="achievement_year" value="<?php echo $query_executed['year_of_achievement']; ?>">
                      <button type="submit">OK</button>
                      <div class="achievement-list__item-reset"> 
                        <button type="reset">Отмена</button>
                      </div>
                    </form>
                  </div>
                </div>

                <?php
                  } 
                } 
                else
                { 
                  echo "Error in execution!"; 
                }  
                ?>

                <div class="achievement-list__extra__item" id="btn-achievements">
                  <div class="achievement-list__item"> 
                  • 
                    <form method="post" action="achievement_create_call.php">
                      <input type="text" name="achievement_text" placeholder="Введите достижение">
                      <input type="text" name="achievement_year" placeholder="Введите год достижения">
                      <button type="submit">OK</button>
                      <div class="achievement-list__item-reset"> 
                        <button type="reset">Отмена</button>
                      </div>
                    </form>
                  </div>

                </div>
                
                <div class="achievement-list-button active"> 
                  <button class="outlined extended" data-achievement-list-button="btn-achievements">+</button>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>

      <div class="content" id="tab-anounces">
        <div id="announces" class="announces">
          <div class="container">
            <div class="announces__inner">
              <p class="block-title">Анонсы</p>
              <div class="cards-grid">
                <?php
                  $query = "SELECT * FROM `sip_announces`";

                  if ($is_query_run = mysqli_query($mysqli,$query)) 
                  {
                ?>
                <?php $query_executed = $is_query_run->fetch_assoc();?>
                <div class="grid-card first active">
                  <div class="grid-card__update">
                    <p class="grid-card__title"><?php echo $query_executed['announce_title'];?></p>
                    <button class="outlined">Update</button>
                  </div>
                  <p class="grid-card__text"><?php echo $query_executed['announce_text'];?></p>
                  <button class="outlined"><?php echo $query_executed['announce_button_text'];?></button>
                </div>
                
                <div class="grid-card__update-item first">
                  <form method="post" action="announce_update_call.php">
                    <div class="grid-card__update-item-unvisible">
                      <input type="text" name="announce_id" value="<?php echo $query_executed['announce_id']; ?>">
                    </div>
                    <input type="text" name="announce_title" value="<?php echo $query_executed['announce_title']; ?>">
                    <input type="text" name="announce_text" value="<?php echo $query_executed['announce_text']; ?>">
                    <input type="text" name="announce_button_text" value="<?php echo $query_executed['announce_button_text'];?>">
                    <div class="grid-card__update-item-buttons">
                      <button type="submit">OK</button>
                      <div class="announces-list__item-reset"> 
                        <button type="reset">Отмена</button>
                      </div>
                    </div>
                  </form>
                </div>


                <?php $query_executed = $is_query_run->fetch_assoc();?>
                <div class="grid-card second active">
                  <img
                    class="grid-card__img"
                    src= <?php echo $query_executed['announce_image'];?>
                    alt="Headphones"
                  />
                  <div class="grid-card__right">
                    <div class="grid-card__update">
                      <p class="grid-card__title"><?php echo $query_executed['announce_title'];?></p>
                      <button class="outlined">Update</button>
                    </div>
                    <p class="grid-card__text"><?php echo $query_executed['announce_text'];?></p>
                    <button class="outlined"><?php echo $query_executed['announce_button_text'];?></button>
                  </div>
                </div>

                <div class="grid-card__update-item second">
                  <form method="post" action="announce_update_call_with_photo.php">
                    <div class="grid-card__update-item-unvisible">
                      <input type="text" name="announce_id" value="<?php echo $query_executed['announce_id']; ?>">
                    </div>
                    <input type="text" name="announce_title" value="<?php echo $query_executed['announce_title']; ?>">
                    <input type="text" name="announce_text" value="<?php echo $query_executed['announce_text']; ?>">
                    <input type="text" name="announce_button_text" value="<?php echo $query_executed['announce_button_text'];?>">
                    <input type="text" name="announce_image" value="<?php echo $query_executed['announce_image'];?>">
                    <div class="grid-card__update-item-buttons">
                      <button type="submit">OK</button>
                      <div class="announces-list__item-reset"> 
                        <button type="reset">Отмена</button>
                      </div>
                    </div>
                  </form>
                </div>

                <?php $query_executed = $is_query_run->fetch_assoc();?>
                <div class="grid-card third active">
                  <div class="grid-card__left">
                    <div class="grid-card__update">
                      <p class="grid-card__title"><?php echo $query_executed['announce_title'];?></p>
                      <button class="outlined">Update</button>
                    </div>
                    <p class="grid-card__text"><?php echo $query_executed['announce_text'];?></p>
                    <button class="outlined"><?php echo $query_executed['announce_button_text'];?></button>
                  </div>
                  
                  <img
                    class="grid-card__img"
                    src= <?php echo $query_executed['announce_image'];?>
                    alt="Group"
                  />
                </div>

                <div class="grid-card__update-item third">
                  <form method="post" action="announce_update_call_with_photo.php">
                    <div class="grid-card__update-item-unvisible">
                      <input type="text" name="announce_id" value="<?php echo $query_executed['announce_id']; ?>">
                    </div>
                    <input type="text" name="announce_title" value="<?php echo $query_executed['announce_title']; ?>">
                    <input type="text" name="announce_text" value="<?php echo $query_executed['announce_text']; ?>">
                    <input type="text" name="announce_button_text" value="<?php echo $query_executed['announce_button_text'];?>">
                    <input type="text" name="announce_image" value="<?php echo $query_executed['announce_image'];?>">
                    <div class="grid-card__update-item-buttons">
                      <button type="submit">OK</button>
                      <div class="announces-list__item-reset"> 
                        <button type="reset">Отмена</button>
                      </div>
                    </div>
                  </form>
                </div>

                <?php $query_executed = $is_query_run->fetch_assoc();?>
                <div class="grid-card forth active">
                  <div class="grid-card__update">
                    <p class="grid-card__title"><?php echo $query_executed['announce_title'];?></p>
                    <button class="outlined">Update</button>
                  </div>
                  <p class="grid-card__text"><?php echo $query_executed['announce_text'];?></p>
                  <button class="outlined"><?php echo $query_executed['announce_button_text'];?></button>
                </div>

                <div class="grid-card__update-item forth">
                  <form method="post" action="announce_update_call.php">
                    <div class="grid-card__update-item-unvisible">
                      <input type="text" name="announce_id" value="<?php echo $query_executed['announce_id']; ?>">
                    </div>
                    <input type="text" name="announce_title" value="<?php echo $query_executed['announce_title']; ?>">
                    <input type="text" name="announce_text" value="<?php echo $query_executed['announce_text']; ?>">
                    <input type="text" name="announce_button_text" value="<?php echo $query_executed['announce_button_text'];?>">
                    <div class="grid-card__update-item-buttons">
                      <button type="submit">OK</button>
                      <div class="announces-list__item-reset"> 
                        <button type="reset">Отмена</button>
                      </div>
                    </div>
                  </form>
                </div>
                <?php
                  } 
                  else
                  { 
                    echo "Error in execution!"; 
                  } 
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   
    <script src="script.js"></script>
  </body>
</html>