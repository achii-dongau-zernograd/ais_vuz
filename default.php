<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>Заголовок</title>
</head>
<body>
  <p align=center>
    Привет!!! <?php print date("Y-m-d"); ?>
  </p>

  <p align=center>
    <?php
      echo "3+2=", 3+2;
      echo "<br><br>";
      echo "Привет!";
      $myVar=555.654555;
      echo "<br><br>";
      print($myVar);
      unset($myVar);//Deleting of variable
    ?>
  </p>
</body>
</html>		