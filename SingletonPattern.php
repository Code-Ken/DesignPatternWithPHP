<?php
namespace SingletonPattern;

class single
{
    protected static $ins = null;

    public static function getins()
    {
        if (self::$ins == null) {
            self::$ins = new self();
        }

        return self::$ins;
    }

    //方法前加final,则方法不能被覆盖,不能被继承
    final protected function __construct()
    {
    }

    //方法前加final,则方法不能被覆盖,不能被克隆
    final protected function __clone()
    {
    }
}

$s1 = single::getins();
$s2 = single::getins();

header("Content-type: text/html; charset=utf-8");

if ($s1 === $s2) {
    echo "一个对象";
} else {
    echo "不是一个对象";
}