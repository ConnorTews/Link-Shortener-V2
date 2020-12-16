<?php
session_start();
if (!isset($_POST['long-link-sub'])) {
  header("Location: ../?error1");
  exit();
} elseif (empty($_POST['long-link'])) {
  header("Location: ../?error2");
  exit();
} else {
  require './gen.php';
  $longlink = $_POST['long-link'];
  $setting = require '../settings.php';
  $dirpath = "../" . $setting['file-path'];
  if (!file_exists($dirpath) && !is_dir($dirpath)) {
    mkdir($dirpath);
  }
  $randomID = linkgen();
  $linkpath = "../l/$randomID/";
  if (!file_exists($linkpath) && !is_dir($linkpath)) {
    mkdir($linkpath);
  }
  $filename =  "../" . $setting['file-path'] . $randomID . "/index.php";
  $newLink = fopen($filename, "w") or die("Unable! bLtmHQFE1b");
  $txtLink = '
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta http-equiv="refresh" content="0; url=' . $longlink . '">
  </head>
  </html>';
  fwrite($newLink, $txtLink);
  fclose($newLink);
  $shortlink = $setting['domainname'] . $setting['file-path'] . $randomID;
  $filename = "../l/" . $randomID . "/data.php";
  $newLink = fopen($filename, "w") or die("Unable! f5r51u3XMo");
  $txtLink = "
  <?php 
  return [
    'longlink' =>  '" . $longlink . "',
    'shortlink' => '" . $shortlink . "',
    'id' =>        '" . $randomID . "',
    'username' =>          '".$_SESSION['username']."'
  ];
  ?>";
  fwrite($newLink, $txtLink);
  fclose($newLink);
  echo "done";
  header("Location: ../");
}
