<?php
class Log
{
    private $filename;
    private $fh;

    function __construct($filename)
    {
        $this->filename=$filename;
        $this->open();
    }

    function open()
    {
        $this->fh=fopen($this->filename,'a') or die("Can't open{$this->filename}");
    }
    function write($note)
    {
        fwrite($this->fh,"{$note}\n") or die("log内写失败");
        echo "log写入成功";
    }
    function read()
    {
        return join('',file($this->filename));
    }
    function __wakeup()
    {
        echo "wakeup被调用";
        $this->open() or die("唤醒后无法打开");
    }
    function __sleep()
    {
        echo "sleep被调用";
        fclose($this->fh);
        return array("filename");
    }
}
?>

