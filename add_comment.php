<?php


  $connect = new PDO('mysql:host=localhost;dbname=future-comment-system', 'root', '');
  $error = '';
  $comment_name = '';
  $comment_content = '';

    //ПРОВЕРКА
    if (mb_strlen($_POST["comment_name"]) > 15) {
      $error .= '<p>Количество символов в имени пользователя превышено!</p>';
    } else {
      $comment_name = $_POST["comment_name"];
    }
    if (mb_strlen($_POST["comment_content"]) > 535) {
      $error .= '<p>Количество символов в сообщении превышено!</p>';
    } else {
      $comment_content = $_POST["comment_content"];
    }

    if ($error == '') {
      $query = "
        INSERT INTO comments
        (name, comment)
        VALUES (:name, :comment)";
      $statement = $connect->prepare($query);
      $statement->execute(array(
        ':name'     => $comment_name,
        ':comment'  => $comment_content));
      $error = '<p>Комментарий добавлен</p>';
    }

    $data = array('error'  => $error);
    echo json_encode($data);
?>