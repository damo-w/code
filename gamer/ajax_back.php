<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 16-1-16
 * Time: 上午2:17
 */
include "conn.php";
$tableName='user_info';
$sql="select user_logname from {$tableName} where user_logname = '{$_GET['q']}'";
$result=$db->prepare($sql);
$result->execute();
if($row=$result->fetch(PDO::FETCH_ASSOC))//PDO::FETCH_ASSOC参数表示得到一个关联数组，不加的话会索引数组和关联数组都返回
{
    echo "合法用户";
}
else {
    echo "无此用户";
}
//$db->close();PDO自带垃圾回收机制，一段时间数据库没有访问会自动关闭，所以没有close方法
?>
