<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 16-1-16
 * Time: 上午2:17
 */
$tableName='stu';
$insertData='贾六';
header("Content-type: text/html; charset=utf-8");
$db=new mysqli('localhost','root','will1314','mydb') or die("数据库打开失败！");
$db->query("set names utf8");//发送无需结果集命令
$db->query("use mydb");
$sql="create table IF NOT EXISTS {$tableName} (id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,name varchar(14))";
$db->query($sql) or die("数据表创建失败!");
$sql="insert into {$tableName} (name) values ('{$insertData}')";
if($db->query($sql))
{
    echo "输入插入成功";
}
else
{
    echo "数据插入失败";
}
echo "<br/>";
$sql="select * from {$tableName}";
$result=$db->query($sql);
while($row=$result->fetch_assoc())//PDO::FETCH_ASSOC参数表示得到一个关联数组，不加的话会索引数组和关联数组都返回
{
    foreach($row as $v)
    {
        echo $v."\t";
    }
    echo "<br/>";
}
$result=NULL;
$db->close();
?>
