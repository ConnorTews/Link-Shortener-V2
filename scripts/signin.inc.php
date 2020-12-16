<?php

if (!isset($_POST['signin-sub'])) {
  header("Location: ../?error=1");
  exit();
} elseif (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['re-password'])) {
  header("Location: ../?error=2");
  exit();
} else {
  $uname = $_POST['username'];
  $pword = $_POST['password'];
  $rpwrd = $_POST['re-password'];
  $uname = htmlspecialchars($uname);
  $pword = htmlspecialchars($pword);
  $rpwrd = htmlspecialchars($rpwrd);
  $uname = stripslashes($uname);
  $pword = stripslashes($pword);
  $rpwrd = stripslashes($rpwrd);
  if ($pword !== $rpwrd) {
    header("Location: ../?error=3");
    exit();
  }
  $usernamefile = '../users/'.$uname.'.php';
  if (!file_exists($usernamefile)) {
    header("Location: ../?error=4");
    exit();
  }
  $user = require '../users/'.$uname.'.php';
  if (!$uname === $user['uname']) {
    header("Location: ../?error=5");
    exit();
  } elseif (password_verify($pword, $user['pword'])) {
    session_start();
    $_SESSION['username'] = $uname;
    header("Location: ../?success");
  }
}