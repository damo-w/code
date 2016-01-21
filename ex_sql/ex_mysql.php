<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 16-1-21
 * Time: 上午9:34
 */

header("Content-type:text/html;charset=utf-8");

$db=mysql_connect("localhost","root","will1314") or die("数据库打开失败");
mysql_query("set names utf8",$db);
//mysql_query("use mydb",$db);
mysql_select_db("mydb",$db);
$sql="create table if not EXISTS stu (id INTEGER not null AUTO_increment primary key,name varchar(12) )";
if(mysql_query($sql,$db)) {
    echo "表创建成功";
}
else {
    echo "表创建失败";
}
echo "<hr/>";
$sql="insert into stu (name) values ('张三')";
mysql_query($sql,$db) or die("插入失败");//执行插入语句

$sql="select * from stu";
$result=mysql_query($sql,$db);
while($row=mysql_fetch_assoc($result))
{
    foreach($row as $v)
    {
        echo $v,"\t";
    }
    echo "<hr/>";
}

close($db);
?>