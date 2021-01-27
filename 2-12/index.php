<form action="result.php" method="post">
  お名前：<input type="text" name="username"><br>
  ご希望商品：
  <input type="radio" name="item" value ="A賞">A賞
  <input type="radio" name="item" value ="B賞">B賞
  <input type="radio" name="item" value ="C賞">C賞<br>
  
  個数：
  <select name="amount">
    <?php for($i = 0; $i <= 10; $i++){?>
    <option value=<?php echo $i?>><?php echo $i ?></option>
    <?php }?>
  </select><br>
  <input type="submit">
</form>