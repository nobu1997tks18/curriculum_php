<?php 
  function devide($int1, $int2){
    try{
      if($int2==0){
        throw new Exception("0では割れません");
      }
      return $int1 / $int2;
    }catch(Exception $e){
      echo "例外処理が発生しました";
      echo "<br>";
      echo $e->getMessage();
    }
  }

  devide(2,0);
?>