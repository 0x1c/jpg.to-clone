<?php
// jpg.to clone
// change .local to your domain
// TODO: handle domains.like.this.local better.

$domain = ".local";
$url = $_SERVER["SERVER_NAME"];
$topic = htmlspecialchars(strtok($url,"."));
if ($url == $domain) {
  echo "You should visit <b>any_word.".$url."</b><br />For example, <a          href=\"http://apple.$domain/\">http://apple.$domain/</a>";
} else {  
  $jsrc = 'https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q='.   $topic.'&safe=off&imgc=color';
  # $jsrc = 'https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q='. $topic.'&safe=off&imgc=color&as_filetype=gif&imgsz=xxlarge';
  $json = file_get_contents($jsrc);
  $jset = json_decode($json, true);
  $picture = htmlspecialchars($jset["responseData"]["results"][0]["url"]);
  echo "<img src=\"$picture\" alt=\"$topic\" />"; 
}   
?>  
