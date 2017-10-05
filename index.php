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

        $lines = array(
          array(0,1,2),
          array(3,4,5),
          array(6,7,8),
          array(0,3,6),
          array(1,4,7),
          array(2,5,8),
          array(0,4,8),
          array(2,4,6)
        );

        function calculateWinner() {
          for($i = 0; $i < 9; $i++) {
            $testArray = $lines[$i];
            if($board[$testArray[0]] && $board[$testArray[0]] == $board[$testArray[1]] && $board[$testArray[0]] == $board[$testArray[2]]) {
              print $board[$testArray[0]] . "'s win!";
            }
          }
        }

        calculateWinner();

        $empty = 0;
        for ($i = 0; $i < 9; $i++) {
          if ($board[$i] == '') $empty = 1;
        }

        if ($empty == 1) {
          $i = rand(0,8);
          while($board[$i] != '') {
            $i = rand(0,8);
          }
          $board[$i] = 'o';
        }

        calculateWinner();

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
