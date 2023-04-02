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
            <input type="text" name="login" placeholder="ник или почта" required>
          </div>
          <div class="form-field reg">
            <input type="text" name="email" placeholder="Почта">
          </div>
          <div class="form-field">
            <input type="text" name="pass" placeholder="Пароль" required>
          </div>
          <div class="form-field reg">
            <input type="text" name= "repeat" placeholder="Повторите пароль">
          </div>
          <div class="form-buttons">
            <input type="submit" class="button" name="enter">
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