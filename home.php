<?php
$url = $_SERVER['REQUEST_URI'];
$pat = '/home.php/i';
if (preg_match($pat, $url) == 1) {
  header("Location: ../");
  exit();
}
?>

<body>
  <script>
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('./service-worker.js');
    }
  </script>

  <?php
  if (empty($_GET['q'])) {
    $_GET['q'] = null;
  }
  if ($_GET['q'] === "signup") {
    echo '
      <form class="signup" action="./scripts/signup.inc.php" method="post">
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
      <form class="signin" action="./scripts/signin.inc.php" method="post">
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
    <?php
    if ($setting['newuser'] === "true") {
      echo '
    <a href="./?q=signup">
      <h3>Sign up</h3>
    </a>
      ';
    }
    if (!isset($_SESSION['username'])) {
      echo '
    <a href="./?q=signin">
      <h3>Sign in</h3>
    </a>
      ';
    }
    ?>
    <a href="./scripts/signout.inc.php">
      <h3>Sign out</h3>
    </a>
  </nav>
  <?php
  if (!empty($_SESSION['username'])) {
    echo "Hello <b>".$_SESSION['username']."</b> welcome";
  } else {
    echo "";
  }
  ?>
  <section class="container-main">

    <?php
    if ($setting['publicusable'] === 'true') {
    ?>

      <form action="./scripts/create.shortlink.inc.php" method="post">
        <label for="long-link">Long Link</label>
        <input type="url" name="long-link">
        <button type="submit" name="long-link-sub">Shorten</button>
      </form>

    <?php
    }
    ?>

    <table>
      <tr>
        <th>Long URL</th>
        <th>Short URL</th>
        <?php
        if ($setting['view-counter'] === "true") { echo '<th>Clicks</th>';}
        ?>
        <th></th>
        <th></th>
      </tr><?php require './scripts/loader.php'; ?>

    </table>
  </section>
</body>

</html>