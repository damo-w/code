<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 16-1-16
 * Time: 上午1:08
 */
header("Content-type: text/html; charset=utf-8");
include_once "Log.php";
session_start();
?>
<html>
<head>
    <title>
        下一页
    </title>
</head>
<body>
<?php
  $now=strftime("%c");
  $logger=$_SESSION['log'];
  $logger=unserialize($logger);
  $logger->write("视图2在{$now}\n");
  echo "<p>log内容:";
  echo nl2br($logger->read());
  echo "</p>";
?>
</body>
</html>
