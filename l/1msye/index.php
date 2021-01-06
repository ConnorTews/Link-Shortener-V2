
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <!-- <meta http-equiv="refresh" content="0; url=https://github.com/ConnorTews/Link-Shortener-V2"> -->
  </head>
  <?php
  $click = include "./click.php";
  $clickamount = $click["click"];
  $clickamount = $clickamount + 1;
  $clickfile = "./click.php";
  $cc = fopen($clickfile, "w") or die("Unable! vawWDAHD");
  $clickContent = '
  <?php return [
  "click" => "'.$clickamount.'"
  ];
  ?>';
  fwrite($cc, $clickContent);
  fclose($cc);
  ?>
  </html>