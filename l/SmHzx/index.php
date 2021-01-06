
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta http-equiv="refresh" content="0; url=https://www.youtube.com/watch?v=_-zWpdq3_2s">
  </head>
  <?php
  $click = include "./click.php";
  $clickamount = $click["click"];
  $clickamount = $clickamount + 1;
  $clickfile = "./click.php";
  $cc = fopen($clickfile, "w") or die("Unable! vawWDAHD");
  $clickContent = "
  <?php return [
  "click" => "0"
  ];
  ?>";
  fwrite($cc, $clickContent);
  fclose($cc);
  ?>
  </html>