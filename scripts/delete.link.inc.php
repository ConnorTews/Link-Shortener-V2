<?php
session_start();
if (!isset($_POST['link-delete'])) {
  header("Location: ../?error=1");
  exit();
} elseif (empty($_POST['filename'])) {
  header("Location: ../?error=2");
  exit();
} else {
  $setting = require '../settings.php';
  $filename = $_POST['filename'];
  $filepath = '../' . $setting['file-path'] . $filename . '/';
  $data = require '../' . $setting['file-path'] . $filename . '/data.php';
  echo $_SESSION['username'];
  echo "<br>";
  echo $data['username'];
  if ($_SESSION['username'] !== $data['username']) {
    header("Location: ../?error=3");
    exit();
  }
  if ($setting['linkbackup'] === 'true') {
    $dirpath = "../" . $setting['backupfoldername'] . "/";
    if (!file_exists($dirpath) && !is_dir($dirpath)) {
      mkdir($dirpath);
    }
    $deleted_file =  '../' . $setting['backupfoldername'] . '/deleted_' . $filename . '.txt';
    $newBackup = fopen($deleted_file, "w") or die("Unable! bLtmHQFE1b");
    $txtBackup = '
    date: ' . date("Y/m/d h:i:sa") . '
    longlink: ' . $data['longlink'] . '
    shortlink: ' . $data['shortlink'] . '
    id: ' . $data['id'] . '
    ';
    fwrite($newBackup, $txtBackup);
    fclose($newBackup);
    $ind = '../' . $setting['file-path'] . '/' . $filename . '/index.php';
    $dat = '../' . $setting['file-path'] . '/' . $filename . '/data.php';
    $file = '../' . $setting['file-path'] . '/' . $filename;
    unlink($ind);
    unlink($dat);
    rmdir($file);
  } else {
    $ind = '../' . $setting['file-path'] . '/' . $filename . '/index.php';
    $dat = '../' . $setting['file-path'] . '/' . $filename . '/data.php';
    $file = '../' . $setting['file-path'] . '/' . $filename;
    unlink($ind);
    unlink($dat);
    rmdir($file);
  }
  header("Location: ../");
  exit();
}