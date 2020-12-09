<?php

  $connect = new PDO('mysql:host=localhost;dbname=future-comment-system', 'root', '');
  $query = "
    SELECT * FROM comments
    ORDER BY comment_id DESC";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $cur_time = date('H:i');
  $cur_date = date('d.m.Y');
  
  foreach ($result as $row) {
    $output .= '
            <li class="comments__item">
              <div class="comments__information">
                <strong class="comments__user-name">'.$row["name"].'</strong>
                <span class="comments__time">'.$cur_time.'</span>
                <span class="comments__date">'.$cur_date.'</span>
              </div>
              <p class="comments__message">'.$row["comment"].'</p>
            </li>';
  }
  
  echo $output;
?>