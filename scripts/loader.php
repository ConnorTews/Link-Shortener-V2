<?php
$setting = include './settings.php';
$fpath = $setting['file-path'];
$fpath = $fpath."*";
// echo $fpath;
$fileList = glob($fpath);
foreach ($fileList as $filename) {
  // echo $filename;
  $data = include './' . $filename . '/data.php';
  $longlink = $data['longlink'];
  $shortlink = $data['shortlink'];
  $id = $data['id'];
  echo  '
      <tr>
        <th>
          <a target="_blank" href="'.$longlink.'">'.$longlink.'</a>
        </th>
        <th>
          <a target="_blank" href="' . $shortlink . '">' . $shortlink . '</a>
        </th>
        <th>
          <input type="text" name="' . $filename . '" id="' . $id . '" value="' . $shortlink . '">
          <button type="button" onclick="copy' . $id . '()">Copy Link</button>
        </th>
        <script> 
        function copy' . $id . '() { 
          var copyText = document.getElementById("' . $id . '");
          copyText.select();
          copyText.setSelectionRange(0, 99999) 
          document.execCommand("copy"); 
          alert("Copied the text: " + copyText.value); 
        }
        </script>
        <th>
          <form action="./scripts/delete-link.php" method="POST">
            <input type="hidden" name="filename" value="' . $id . '">
            <button type="submit" name="link-delete">Delete</button>
          </form>
        </th>
      </tr>
  ';
}
