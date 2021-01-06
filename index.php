<?php 
// session_start();
$setting = require 'settings.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $setting['website-name']; ?></title>
  <link rel="shortcut icon" href="<?php echo $setting['website-image-link']; ?>" type="image/x-icon">
  <link rel="manifest" href="./manifest.json">
  <meta name="description" content="Link shortener">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/index.min.css">
</head>
<?php
if ($setting['public'] === 'true') {
  require './home.php';
}

if (empty($_SESSION['username'])) {
  if ($setting['public'] === 'false') {
    echo '
  <form class="non-form" action="./scripts/signin.inc.php" method="post">
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
