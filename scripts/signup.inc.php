<?php

if (!isset($_POST['signup-sub'])) {
  header("Location: ../?error=1");
  exit();
} elseif (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['re-password'])) {
  header("Location: ../?error=2");
  exit();
} else {
  $uname = $_POST['username'];
  $pword = $_POST['password'];
  $rpwrd = $_POST['re-password'];
  if ($pword !== $rpwrd) {
    header("Location: ../?error=3");
    exit();
  }
  $uname = htmlspecialchars($uname);
  $pword = htmlspecialchars($pword);
  $rpwrd = htmlspecialchars($rpwrd);
  $uname = stripslashes($uname);
  $pword = stripslashes($pword);
  $rpwrd = stripslashes($rpwrd);

  if (!file_exists("../users/")) {
    mkdir("../users", 0700);
  }
  $userfile = '../users/'.$uname.'.php';
  if (file_exists($userfile)) {
    header("Location: ../?error=4");
    exit();
  }
  $passwordhash = password_hash($pword, PASSWORD_BCRYPT);
  $filename =  "../users/".$uname.".php";
  $newUser = fopen($filename, "w") or die("Unable! bLtmHQFE1b");
  $txtUser = "
  <?php return [
    'uname' => '".$uname."',
    'pword' => '".$passwordhash."'
  ];
  ?>";
  fwrite($newUser, $txtUser);
  fclose($newUser);
  header("Location: ../?success");
  exit();
}