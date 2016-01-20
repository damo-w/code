<?php

/**
 * Created by PhpStorm.
 * User: wang
 * Date: 16-1-16
 * Time: 上午11:18
 */
class TempClass
{
    private $t;
    function __construct($t)
    {
        $this->t=$t;
    }
    function __sleep()
    {
        echo "sleep调用<br/>";
    }
    function __wakeup()
    {
        // TODO: Implement __wakeup() method.
        echo "wakeup调用<br/>";
    }
    function put()
    {
        echo $this->t."<br/>";
    }
}
?>