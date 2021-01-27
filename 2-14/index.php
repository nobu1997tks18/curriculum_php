<?php
  $users = ["tanaka","ishi","takahashi","saito","aoki"];
?>

<p>count:<?php echo count($users)?></p>

<p>sort
<?php 
  sort($users);
  var_dump($users);
?>
</p>

<p>in_array:
  <?php 
    if(in_array("ishi", $users)){
      echo "石井がいます";
    }else{
      echo "石井はいない";
    } 
  ?>
</p>

<p>implode:
  <?php 
    $all_user = implode(",", $users);
    echo $all_user;
  ?>
</p>

<p>explode:
  <?php 
    $users = explode(",", $all_user);
    var_dump($users);
  ?>
</p>