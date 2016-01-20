<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 16-1-18
 * Time: 下午3:49
 */
header("Content-type:text/html;charset='utf-8'");
include "MyDB.php";
$obj=new MyDB("localhost","root","will1314","mydb");
//$str=trim($_POST['txt']);
//$str=htmls
//$str="insert into stu values('0005','贾六',21,'1996-12-01')";
$str="select * from stu where name='张三'";
//$str=$str."'张三'";
$obj->done($str);
$obj->show();
?>