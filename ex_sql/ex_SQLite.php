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
$db=new SQLite3("/tmp/test.db") or die("数据库打开失败！");
$db->exec("set names utf8");//发送无需结果集命令
//$db->exec("use mydb");//SQLite一个文件就是一个数据库，所以不需要再选择数据库
$sql="create table IF NOT EXISTS {$tableName} (id INTEGER NOT NULL PRIMARY KEY,name varchar(14))";//在sqlite中声明为integer Primary key的字段就具有自动增长属性
$db->exec($sql) or die("数据表创建失败!");
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
while($row=$result->fetchArray(SQLITE3_ASSOC))//SQLite只得到管理数组的方式
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
