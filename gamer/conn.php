<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 16-1-28
 * Time: 下午4:42
 */
header("Content-type: text/html; charset=utf-8");
$db=new PDO('mysql:host=localhost;dbname=mydb','root','will1314') or die("数据库打开失败！");
$db->query("set names utf8");//发送无需结果集命令
$db->query("use gamerDB");