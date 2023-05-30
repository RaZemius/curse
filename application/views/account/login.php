<!DOCTYPE html>
<html>

<head>
  <?php

  use application\lib\styles;
  
  styles::get('style');
  styles::get('login');
  ?>
</head>

<body>


  <main>
    <div class="register-form-container">
      <h1 class="form-title">
        вход
      </h1>
      <div class="form-fields">
        <form method="post" action="">
          <div class="form-field">
            <input type="text" name="login" id = "login"placeholder="ник или почта" required>
          </div>
          <div class="form-field reg">
            <input type="text" name="email" id = "email" placeholder="Почта">
          </div>
          <div class="form-field">
            <input type="text" name="pass" id="pass" placeholder="Пароль" required>
          </div>
          <div class="form-field reg">
            <input type="text" name= "repeat" id = "repeat"placeholder="Повторите пароль">
          </div>
          <div class="form-buttons">
            <input type="submit" value = "войти" class="button" id = "submit"name="enter">
          </div>
        </form>

        <div class="divider">или</div>
        <button class="button" id="js">Регистрация</button>
      </div>
    </div>
  </main>

</body>
<?php
styles::setjs('form'); ?>
</html>