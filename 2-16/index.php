<?php
  $testFile="test.txt";
  $content ="こんにちわ";

  if(is_writable($testFile)){
      $fp = fopen($testFile, "a");
      fwrite($fp, $content);
      fclose($fp);
      echo "finish writing!";
  }else{
    echo "not writable!";
    exit;
  };
?>

<?php
  $test_file = "test2.txt";
  if(is_readable($test_file)){
    $fp = fopen($test_file,"r");
    while($line = fgets($fp)){
      echo $line."<br>";
    }
    fclose($fp);
  }else{
    echo "not readable!!";
    exit;
  }
?>

