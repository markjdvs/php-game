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
      $winner = 'n';
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

        // for($i = 0; $i < 9; $i++) {
        //   $testArray = $lines[$i];
        //   if($board[$testArray[0]] && $board[$testArray[0]] == $board[$testArray[1]] && $board[$testArray[0]] == $board[$testArray[2]]) {
        //     $winner = $board[$testArray[0]];
        //     print $board[$testArray[0]] . "'s win!";
        //   }
        // }

        $empty = 0;
        for ($i = 0; $i < 9; $i++) {
          if ($board[$i] == '') $empty = 1;
        }

        if ($empty == 1 && $winner == 'n') {
          $i = rand(0,8);
          while($board[$i] != '') {
            $i = rand(0,8);
          }
          $board[$i] = 'o';
          for($i = 0; $i < 9; $i++) {
            $testArray = $lines[$i];
            if($board[$testArray[0]] && $board[$testArray[0]] == $board[$testArray[1]] && $board[$testArray[0]] == $board[$testArray[2]]) {
              print $board[$testArray[0]] . "'s win!";
              $winner = $board[$testArray[0]];
            }
          }
        }

        // if($winner == 'n') {
        //   for($i = 0; $i < 9; $i++) {
        //     $testArray = $lines[$i];
        //     if($board[$testArray[0]] && $board[$testArray[0]] == $board[$testArray[1]] && $board[$testArray[0]] == $board[$testArray[2]]) {
        //       print $board[$testArray[0]] . "'s win!";
        //       $winner = $board[$testArray[0]];
        //     }
        //   }
        // }


      }
    ?>
    <form method="POST" action="index.php">
        <?php
          for($i = 0; $i < 9; $i++) {
            print "<input name=$i type=text value=$board[$i]>";
          }
          if ($winner == 'n') {
            print '<input type="submit" name="submit" value="Submit">';
          } else {
            print '<input type="button" name="reset" value="Play again?" onclick="window.location.href=\'index.php\'">';
          }
        ?>
    </form>

  </body>
</html>
