<?php
  session_start();

  $nickname;
  $class;
  $username;

  if(isset($_POST['class']) && isset($_POST['nickname']))
  {
    $class = $_POST['class'];
    $nickname = $_POST['nickname'];
    $username = $_SESSION['username'];
  }

  $db = new PDO('sqlite:../game_PDO.sqlite');

  $sql = "UPDATE users
  SET
    nickname='$nickname',
    class='$class',
    str=10,
    int=10,
    dex=10,
    gold=100
  WHERE username='$username'";

  if($db->query($sql))
  {
    echo 'Successfully created!';

    $_SESSION['nickname'] = $nickname;
    $_SESSION['class'] = $class;
    $_SESSION['str'] = 10;
    $_SESSION['int'] = 10;
    $_SESSION['dex'] = 10;
    $_SESSION['gold'] = 100;

    header("Location:index.php");
  }
  else
  {
    echo 'Could not create the character';
  }

  $db->close();
?>
