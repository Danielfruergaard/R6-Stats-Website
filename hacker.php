Check telegram.....

<?php
  // Headshoot to kill ratio. Most hackers use aimbot.
  if ($headShoots -100 < $kills) {
    $hacker1 = 4;
      elseif ($headShoots -50 < $kills) {
        $hacker1 = 5;
      }
  }
  // Win/Loss ratio since most hackers have a high win/loss
  if ($winLoss >= 60) {
    $hacker2 = 1;
      elseif ($winLoss >= 70) {
        $hacker2 = 2;
          elseif ($winLoss >= 80) {
            $hacker2 =3;
          }
      }
  }
  // Level for hackers. Most hackers have low lvl accounts
  if ($lvl <= 40 && $sumHacker >=5 && $mmr > 3000) {
    $hacker3 = 5;
      elseif ($lvl <= 60) {
        $hacker3 = 4;
          elseif ($lvl <= 100) {
            $hacker3 = 4;
          }
      }
  }

  $sumHacker = array($hacker1, $hacker2, $hacker3);
  echo "Hacker Points =" array_sum($sumHacker);

 ?>
