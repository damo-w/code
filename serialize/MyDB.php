<?php

/**
 * Created by PhpStorm.
 * User: wang
 * Date: 16-1-18
 * Time: 下午3:32
 */
class MyDB
{
    private $myconn;
    private $result;

    function __construct($host,$user,$pwd,$db)
    {
        ($this->myconn=mysql_connect($host,$user,$pwd)) or die("链接失败!");
        $this->done("set names utf8");
        $cmd="create database IF NOT EXISTS ".$db;
        $this->done("set charset utf8");
        $this->done($cmd);
        $cmd="use ".$db;
        $this->done($cmd);
    }

    function done($cmd)
    {
        $this->result=mysql_query($cmd);
    }

    function show()
    {
        while($arr=mysql_fetch_assoc($this->result))
        {
            foreach($arr as $key=>$value)
            {
                echo $key,":",$value,"\t";
            }
            echo "<br/>";
        }
    }
    function __destruct()
    {
        // TODO: Implement __destruct() method.
        mysqli_close($this->myconn);
    }
}