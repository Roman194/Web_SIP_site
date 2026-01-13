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

    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="button.css" />
    <link rel="stylesheet" href="header.css" />
    

  </head>
  <body>
    <div id="header" class="header">
      <div class="container">
        <div class="header__inner">
            <img class="header__SIP-logo" src="assets/SIP_label.svg" alt="Smash Into Pieces" />
            <p class="block-title header__title">Вход в админ-панель сайта</p>
        </div>
      </div>
    </div>

    <div class="container">
        <div class="login">
            <form action="login_call.php" method="POST">
                <div class="login__form">
                    <label for="username_or_email_text">Имя пользователя / email:</label>
                    <input type="text" name="username_or_email_text">
                    <label for="password_text">Пароль:</label>
                    <input type="password" name="password_text">
                    <div class="login__submit__button">
                        <button type="submit">Войти</button>
                    </div>
                </div>
            </form>
            
        </div>

        <div class="login__vk">
          <div class="login__form">
            <script src="https://unpkg.com/@vkid/sdk@<3.0.0/dist-sdk/umd/index.js"></script>
            <script type="text/javascript">
              if ('VKIDSDK' in window) {
                const VKID = window.VKIDSDK;

                VKID.Config.init({
                  app: 54246055,
                  redirectUrl: 'https://badly-esteemed-jackrabbit.cloudpub.ru/vk-auth',
                  responseMode: VKID.ConfigResponseMode.Callback,
                  source: VKID.ConfigSource.LOWCODE,
                  scope: 'email', // Заполните нужными доступами по необходимости
                });

                const oneTap = new VKID.OneTap();

                oneTap.render({
                  container: document.currentScript.parentElement,
                  showAlternativeLogin: true
                })
                .on(VKID.WidgetEvents.ERROR, vkidOnError)
                .on(VKID.OneTapInternalEvents.LOGIN_SUCCESS, function (payload) {
                  const code = payload.code;
                  const deviceId = payload.device_id;

                  VKID.Auth.exchangeCode(code, deviceId)
                    .then(vkidOnSuccess)
                    .catch(vkidOnError);
                });
              
                function vkidOnSuccess(data) {
                  // Обработка полученного результата
                  VKID.Auth.userInfo(data.access_token)
                    .then(vkUserInfoOnSuccess)
                    .catch(vkUserInfoOnError);
                }
              
                function vkidOnError(error) {
                  // Обработка ошибки
                  alert("Не удалось получить ваш VK ID. \n\r Попробуйте авторизоваться с помощью классической формы авторизации");
                  console.log(error);
                }

                function vkUserInfoOnSuccess(data){

                  fetch('login_vk_call.php', {
                      method: 'POST',
                      headers: {
                          'Content-Type': 'application/x-www-form-urlencoded'
                      },
                      body: new URLSearchParams({
                          email: data.user.email
                      })
                  })
                  .then(response => response.json())
                  .then(result => {
                      if(result.redirect){
                        window.location.href = result.redirect;
                      }else{
                        alert(result.registration_fail);
                      }
                  })
                  .catch(error => {
                      alert("Не удалось проверить полученную информацию о пользователе. \n\r Попробуйте авторизоваться с помощью классической формы авторизации");
                      console.error('Ошибка при отправке данных:', error);
                  });
                }

                function vkUserInfoOnError(error){
                  alert("Не удалось получить информацию о пользователе. \n\r Попробуйте авторизоваться с помощью классической формы авторизации");
                  console.log(error);
                }
              }
            </script>
          </div>
        </div>
    </div>
  </body>
</html>