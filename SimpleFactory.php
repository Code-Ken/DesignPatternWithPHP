<?php

namespace SimpleFactory;
use Exception;
//=====共同接口=====
interface db
{
    function conn();
}

//=====服务器端=====
class dbmysql implements db
{
    function conn()
    {
        echo "connect mysql!";
    }
}

class dbsqlite implements db
{
    function conn()
    {
        echo "connect sqlite!";
    }
}
//新增dboracle类
//简单工厂模式通过这种做法实现了对责任的分割，当系统引入新的类的时候无需修改调用者。

class dboracle implements db{
    function conn()
    {
        echo "connect oracle";
    }
}

//模式的核心是工厂类。这个类含有必要的逻辑判断，
//可以决定在什么时候创建哪一个实例，而调用者则可以免除直接创建对象的责任。
class SimpleFactory {

    public static function createDB($type){
        if($type == 'mysql'){
            return new dbmysql();
        }elseif($type == 'sqlite'){
            return new dbsqlite();
        }elseif($type == 'oracle'){
            //必须要新加判断语句来完成新的new类,违背了开闭原则
            return new dboracle();
        }else{
            throw new Exception("Error db type");
        }
    }
}

//=====客户端====

$mysql = SimpleFactory::createDB('mysql');
$mysql->conn();

$sqlite = SimpleFactory::createDB('sqlite');
$sqlite->conn();


//新增oracle类
$oracle = SimpleFactory::createDB('oracle');
$oracle->conn();

