<? session_start();
$setting = require 'settings.php';
if ($setting['public'] === 'false') {
  echo "NO Access";
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $setting['website-name']; ?></title>
  <link rel="shortcut icon" href="<?php echo $setting['website-image-link']; ?>" type="image/x-icon">
  <link rel="stylesheet" href="./css/index.min.css">
</head>

<body>
  <nav>
    <?php
    if ($setting['newuser'] === 'true') {
    ?>

      <form action="./scripts/signup.inc.php" method="post">
        <label for="username">Sign up</label>
        <input type="text" name="username">
        <input type="password" name="password">
        <input type="password" name="re-password">
        <button type="submit" name="signup-sub">Sign up</button>
      </form>
      
    <?php
    }
    ?>
    <a href="./scripts/signout.inc.php">Sign out</a>
  </nav>
  <section class="container-main">
    <form action="./scripts/create.shortlink.inc.php" method="post">
      <input type="url" name="long-link" placeholder="Long link">
      <button type="submit" name="long-link-sub">Shorten</button>
    </form>
    <table>
      <tr>
        <th>Long URL</th>
        <th>Short URL</th>
        <th></th>
        <th></th>
      </tr><?php require './scripts/loader.php';?>

    </table>
  </section>
</body>

</html>