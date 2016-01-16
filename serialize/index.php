<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 16-1-16
 * Time: 上午12:18
 */
header("Content-type: text/html; charset=utf-8");
//header("Content-type: text/html; charset=utf-8");

include_once "Log.php";
session_start();
?>

<html>
<head>
    <title>
        前端页面
    </title>
</head>
<body>
  <?php

    $now = strftime("%c");

    if(!isset($_SESSION['log']))
    {
      echo "没有 session log";
      $logger=new Log("/tmp/persistent_log");
      $logger->write("创建$now");
      $_SESSION['log']=$logger;
      echo ("<p>创建session和持续的log对象</p>");
    }
    else
    {
      $logger= $_SESSION['log'];
      echo "从session读取成功";
      $logger->write("视图首页{$now}");
      echo "<p>log内容</p>";
      echo nl2br($logger->read());
    }
  ?>
<a href="next.php">进入下一页</a>
</body>
</html>
