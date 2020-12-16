<?php
$url = $_SERVER['REQUEST_URI'];
$pat = '/home.php/i';
if (preg_match($pat, $url) == 1) {
  header("Location: ../");
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
  <?php
  if (empty($_GET['q'])) {
    $_GET['q'] = null;
  }
  if ($_GET['q'] === "signup") {
    echo '
      <form action="./scripts/signup.inc.php" method="post">
        <label for="username">Sign up</label>
        <input type="text" name="username">
        <input type="password" name="password">
        <input type="password" name="re-password">
        <button type="submit" name="signup-sub">Sign up</button>
      </form>
      ';
  }
  if ($_GET['q'] === "signin") {
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
  ?>
  <nav>
    <a href="./?q=signup"><h3>Sign up</h3></a>
    <a href="./?q=signin"><h3>Sign in</h3></a>
    <a href="./scripts/signout.inc.php"><h3>Sign out</h3></a>
  </nav>
  <?php
  if (!empty($_SESSION['username'])) {
    echo $_SESSION['username'];
  } else {
    echo "";
  }
  ?>
  <section class="container-main">

    <?php
    if ($setting['publicusable'] === 'true') {
    ?>

      <form action="./scripts/create.shortlink.inc.php" method="post">
        <input type="url" name="long-link" placeholder="Long link">
        <button type="submit" name="long-link-sub">Shorten</button>
      </form>

    <?php
    }
    ?>

    <table>
      <tr>
        <th>Long URL</th>
        <th>Short URL</th>
        <th></th>
        <th></th>
      </tr><?php require './scripts/loader.php'; ?>

    </table>
  </section>
</body>

</html>