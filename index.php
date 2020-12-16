<?php session_start();
$setting = require 'settings.php';

if ($setting['public'] === 'true') {
  require './home.php';
}

if (empty($_SESSION['username'])) {
  if ($setting['public'] === 'false') {
    echo '
  <form action="./scripts/signin.inc.php" method="post">
    <label for="username">Sign in</label>
    <input type="text" name="username">
    <input type="password" name="password">
    <input type="password" name="re-password">
    <button type="submit" name="signin-sub">Sign in</button>
  </form>
    ';
  }
}

if (isset($_SESSION['username']) && $setting['public'] === 'false') {
  require './home.php';
}

?>
