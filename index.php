<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./index.css">
    <title>Little PHP Game</title>
  </head>
  <body>
    <?php
      $board = array();
      for ($i = 0; $i < 9; $i++) array_push($board, '');
      if(isset($_POST["submit"])) {
        for ($i = 0; $i < 9; $i++) {
          $board[$i] = $_POST[$i];
        }
      }
    ?>
    <form method="POST" action="index.php">
        <?php
        for($i = 0; $i < 9; $i++) {
          print "<input name=$i type=text value=$board[$i]>";
        }
        print "<input type=submit name=submit value=submit>";
        ?>
    </form>

  </body>
</html>
