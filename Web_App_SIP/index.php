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

    <title>Smash Into Pieces</title>

    <!-- Общие стили -->
    <link rel="stylesheet" href="index.css" />

    <!-- Переиспользуемые компоненты -->
    <link rel="stylesheet" href="button.css" />

    <!-- Разделы сайта -->
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="hero.css" />
    <link rel="stylesheet" href="bio.css" />
    <link rel="stylesheet" href="achievements.css" />
    <link rel="stylesheet" href="announces.css" />
    <link rel="stylesheet" href="footer.css" />
  </head>
  <body>
    <?php require 'database.php'; ?>
    
    <div id="header" class="header">
      <div class="container">
        <div class="header__inner">
          <img class="SIP-logo" src="assets/SIP_label.svg" alt="Smash Into Pieces" />
          <div class="top-navigation">
            <a href="#bio" class="top-navigation__link">Биография</a>
            <a href="#achievements" class="top-navigation__link">Достижения</a>
            <a href="#announces" class="top-navigation__link">Анонсы</a>
            <a href="#official_pages" class="top-navigation__link">Официальные страницы (справка)</a>
          </div>
        </div>
      </div>
    </div>

    <div class="hero">
      <div class="container">
        <div class="hero__inner">
          <div class="hero__title">Сайт самого большого фан-сообщества Smash Into Pieces в СНГ</div>
          <button>Мы во ВКонтакте</button>
        </div>
      </div>
    </div>

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
            <p class="block-title bio__second-title">Биография</p>
            <p class="bio__paragraph">
              Группа была основана в 2008 году в Эребо (Швеция) Бенджамином Женеббо, Пьером Беркюистом (бывш. член
              CLOSER), Исааком Сноу, Виктором Видлундом и Крисом-Адамом Сорбье. Они выпустили первый сингл “Faded” в
              2009 году, который сумел достичь 33 место в “Swedish single charts”.
            </p>
            <p class="bio__paragraph">
              В 2012 году они заключили контракт с лэйблом “Gain Music Entertaintment” (подраздел “Sony Music
              Entertaintment”) Несколько месяцев спустя в рамках “Bandit Rock Avards” им удалось получить награду в
              номинации “Главное открытие года”. В 2013 году “Смэши” выпустили дебютный альбом “Unbreakable”, достигший
              7-го места в “Swedish Albums chart ”. За этим последовал первый европейский тур совметно с такими
              популярными рок-группами, как “Aaranthe”, “Alter bridge” и “Halestorm”.
            </p>
            <p class="bio__paragraph">
              В 2015 году Smash Into Pieces выпустили второй альбом под названием “The Apocalypse DJ”. Незадолго до
              выхода второго альбома Исаак Сноу покинул группу и был заменён таинственным барабанщиком-инкогнито под
              псевдонимом “APOC”. Их 3 альбом “Rise and Shine” был выпущен в 2017 году. В 2023 году “Смэши” учавстовали
              в “Melodifestivalen 2023” с песней “Six feet under” и сумели получить 3-е место, уступив только “Loreen” с
              песней “Tatoo” и “Marcus & Martinius” с песней “Air”.
            </p>
          </div>
        </div>
      </div>
    </div>

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
            <div class="achievement-list__item">
              •
              <p><?php 
                    echo $query_executed['achievment_text'].' ('; 
                    echo $query_executed['year_of_achievement'].' г.)';
                  ?>
              </p>
            </div>
            <?php
              } 
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
            <div class="grid-card first">
              <?php $query_executed = $is_query_run->fetch_assoc();?>
              <p class="grid-card__title"><?php echo $query_executed['announce_title'];?></p>
              <p class="grid-card__text"><?php echo $query_executed['announce_text'];?></p>
              <button class="outlined"><?php echo $query_executed['announce_button_text'];?></button>
            </div>
            <div class="grid-card second">
              <?php $query_executed = $is_query_run->fetch_assoc();?>
              <img
                class="grid-card__img"
                src= <?php echo $query_executed['announce_image'];?>
                alt="Headphones"
              />
              <div class="grid-card__right">
                <p class="grid-card__title"><?php echo $query_executed['announce_title'];?></p>
                <p class="grid-card__text"><?php echo $query_executed['announce_text'];?></p>
                <button class="outlined"><?php echo $query_executed['announce_button_text'];?></button>
              </div>
            </div>
            <div class="grid-card third">
              <?php $query_executed = $is_query_run->fetch_assoc();?>
              <div class="grid-card__left">
                <p class="grid-card__title"><?php echo $query_executed['announce_title'];?></p>
                <p class="grid-card__text"><?php echo $query_executed['announce_text'];?></p>
                <button class="outlined"><?php echo $query_executed['announce_button_text'];?></button>
              </div>
              
              <img
                class="grid-card__img"
                src= <?php echo $query_executed['announce_image'];?>
                alt="Group"
              />
            </div>
            <div class="grid-card forth">
               <?php $query_executed = $is_query_run->fetch_assoc();?>
              <p class="grid-card__title"><?php echo $query_executed['announce_title'];?></p>
              <p class="grid-card__text"><?php echo $query_executed['announce_text'];?></p>
              <button class="outlined"><?php echo $query_executed['announce_button_text'];?></button>
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

    <div class="footer">
      <div class="container">
        <div class="footer__inner">
          <div class="footer__main">
            <img class="SIP-logo" src="assets/SIP_label.svg" alt="Smash Into Pieces" />
            <div class="footer__right">
              <table class="contacts-table">
                <tr>
                  <td></td>
                  <td class="contacts-table__header">Наши контакты</td>
                  <td id="official_pages" class="contacts-table__header">Контакты SIP</td>
                </tr>
                <tr>
                  <td>Email:</td>
                  <td>lizz_22@gmail.com</td>
                  <td>smashmail@mail.se</td>
                </tr>
                <tr>
                  <td>Сайт:</td>
                  <td>SIPfans.ru</td>
                  <td>smashintopieces.com</td>
                </tr>
                <tr>
                  <td>ВК:</td>
                  <td>@SIP_ru_fans</td>
                  <td>@smash_into_pieces</td>
                </tr>
              </table>
              <!-- https://logowik.com/content/uploads/images/svg-right-arrow-icon1716584944.logowik.com.webp-->
              <div class="footer__buttons">
                <a class="button" href="#header"
                  >Вверх
                  <img
                    src="assets/up_arrow.svg"
                    alt="Up Arrow"
                /></a>
                <button class="outlined">Хочу на концерт!</button>
              </div>
            </div>
          </div>
          <div class="footer__all">
            <div class="footer__minor">
              <p class="footer__copyright grey-text">© SIP_ru_fans, Inc. 2025. Самые преданные фанаты SIP!</p>
              <div class="footer__media">
                <p class="grey-text">Наше сообщество в соц сетях:</p>
                <div class="media-icons">
                  <img src="./assets/vk_network.svg" alt="" class="media-icons__icon" />
                  <img src="./assets/telegram_network.svg" alt="" class="media-icons__icon" />
                  <img src="./assets/ok_network.svg" alt="" class="media-icons__icon" />
                  <img src="./assets/email.svg" alt="" class="media-icons__icon" />
                </div>
              </div>
            </div>
            <div class="footer__support">
              <p class="grey-support-text">Получение справки по работе сайта: 8-800-555-35-35 (звонок бесплатный) или podderzgka_55@gmail.com</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>
