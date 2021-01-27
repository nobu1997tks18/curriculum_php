<?php
  for($i=1, $fields=40; $fields>0; $i++){
    $num = rand(1,6);
    echo $i."回目=".$num."<br>";
    
    $fields -= $num;
  };
  echo $i."回目でゴールしました"."<br>"
?>
<br>
<br>
<br>
<?php
$now = date("Y:m:d H:i:s", "Asia/Tokyo");
$hour = (int)substr($now, -8,2);
if($hour >= 5 && $hour <= 11){
  printf("今%d時台です<br>%s",$hour,"おはようございます");
}elseif($hour >= 12 && $hour <= 15){
  printf("今%d時台です<br>%s",$hour,"こんにちわ");
}elseif($hour <= 4 || $hour >= 16 && $hour <=23){
  printf("今%d時台です<br>%s",$hour,"こんばんわ");
}
?>