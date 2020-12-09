<?php

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Future Testing</title>
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/normalize.css" type="text/css">
  <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
</head>
<body>
  <header class="page-header">
    <div class="container">
      <section class="page-header__columns">
        <h1 class="visually-hidden">Future - internet agency</h1>
        <div class="page-header__column-left">
          <div class="page-header__contacts">
            <a class="page-header__phone link" href="tel:+74993409471" aria-label="Contact phone">Телефон: (499) 340-94-71</a>
            <a class="page-header__email link" href="mailto:info@future-group.ru" aria-label="Contact email">Email: <span class="page-header__email--underline">info@future-group.ru</span></a>
          </div>
          <h2 class="page-header__title">Комментарии</h2>
        </div>
        <div class="page-header__column-right">
          <a class="page-header__logo" href="https://future-group.ru/" aria-label="Link to main site" target="_blank">
            <img class="page-header__logo-image" src="images/main-page-logo.png" widht="163" height="172" alt="Main logo company">
          </a>
        </div>
      </section>
    </div>
  </header>
  <main class="page-main">
    <div class="container">
      <section class="page-main__comments comments">
        <h2 class="visually-hidden">All comments</h2>
        <div class="comments__container">
          <ul class="comments__list" id="display_comment" aria-label="List of comments">
            <li class="comments__item">
              <div class="comments__information">
                <strong class="comments__user-name">Савва</strong>
                <span class="comments__time">18:05</span>
                <span class="comments__date">07.02.2014</span>
              </div>
              <p class="comments__message">Спасибо за Ваше тестовое задание. Оно, действительно, изумительное</p>
            </li>
            <li class="comments__item">
              <div class="comments__information">
                <strong class="comments__user-name">Евдоким</strong>
                <span class="comments__time">17:42</span>
                <span class="comments__date">07.02.2014</span>
              </div>
              <p class="comments__message">Если включить мозги, то все элементарно Ватсон!</p>
            </li>
            <li class="comments__item">
              <div class="comments__information">
                <strong class="comments__user-name">Артемий</strong>
                <span class="comments__time">16:10</span>
                <span class="comments__date">07.02.2014</span>
              </div>
              <p class="comments__message">Почему такое сложное задание??? Мне кажется, нужно быть первоклассным программистом, чтобы выполнить его  :(</p>
            </li>
          </ul>
        </div>
        <div ></div>
      </section>
      <section class="page-main__form-container form-container">
        <h2 class="form-container__title">Оставить комментарий</h2>
        <form class="sending-form" id="comment_form" method="POST" aria-label="Message sending field">
          <label class="sending-form__label" for="comment_name">Ваше имя</label>
          <input class="sending-form__input" id="comment_name" type="text" name="comment_name" placeholder="Введите имя" required>
          <label class="sending-form__label" for="comment_content">Ваш комментарий</label>
          <textarea class="sending-form__textarea" id="comment_content" name="comment_content" placeholder="Введите сообщение" required></textarea>
          <input type="hidden" name="comment_id" id="comment_id" value="0">
          <button class="sending-form__button button" name="submit" id="submit" type="submit">Отправить</button>
        </form>
        <span id="comment_message"></span>
      </section>
    </div>
  </main>
  <footer class="page-footer">
    <div class="container">
      <section class="page-footer__columns">
        <h2 class="visually-hidden">Контактная информация</h2>
        <div class="page-footer__column-left">
          <a class="page-footer__logo" href="https://future-group.ru/" aria-label="Link to main site" target="_blank">
            <img class="page-footer__logo-image" src="images/main-page-logo.png" widht="101" height="106" alt="Main logo company">
          </a>
        </div>
        <div class="page-footer__column-right">
          <div class="page-footer__contacts">
            <a class="page-footer__phone link" href="tel:+74993409471" aria-label="Contact phone">Телефон: (499) 340-94-71</a>
            <a class="page-footer__email link" href="mailto:info@future-group.ru" aria-label="Contact email">Email: <span class="page-footer__email--underline">info@future-group.ru</span></a>
            <address class="page-footer__address"><a class="page-footer__address-link link" href="https://goo.gl/maps/iJB7QsmeVkdmQgS46" aria-label="Contact address" target="_blank">Адрес: <span class="page-footer__address--underline">115088 Москва, ул. 2-я Машиностроения, д. 7 стр. 1</span></a></address>
          </div>
          <p class="page-footer__copyright">&copy; 2010 - 2014 Future. Все права защищены</p>
        </div>
      </section>
    </div>
  </footer>
<script>
  $(document).ready(function() {
    $('#comment_form').on('submit', function(event) {
      event.preventDefault();

      var form_data = $(this).serialize();
      $.ajax({
        url: "add_comment.php",
        method: "POST",
        data: form_data,
        dataType: "JSON",
        success: function(data) {
          if (data.error != '') {
            $('#comment_form')[0].reset();
            $('#comment_message').html(data.error);
            $('#comment_id').val('0');
            load_comment();
          }
        }
      })
    });
    load_comment();
  
    function load_comment() {
      $.ajax({
        url: "fetch_comment.php",
        method: "POST",
        success: function(data) {
          $('#display_comment').html(data);
        }
      })
    }
  });
</script>
</body>
</html>