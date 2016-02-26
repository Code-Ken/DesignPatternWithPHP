<?php

namespace AbstractFactory;
//=====共同接口=====

interface db
{
    function conn();

}

//新增user接口
interface user
{
    function insertUser();
}

interface Factory
{
    function createDB();

    //新增createUser函数
    function createUser();
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

//新增user**类
class userMysql implements user
{
    function insertUser()
    {
        echo "insert mysql user!";
    }
}

class userSqlite implements user
{
    function insertUser()
    {
        echo "insert sqlite user!";
    }
}


class mysqlFactory implements Factory
{
    function createDB()
    {
        return new dbmysql();
    }

    function createUser()
    {
        return new userMysql();
    }
}

class sqliteFactory implements Factory
{
    function createDB()
    {
        return new dbsqlite();
    }

    function createUser()
    {
        return new userSqlite();
    }
}

//=====客户器端=====

$fact = new mysqlFactory();

$db = $fact->createDB();
$db->conn();

$user = $fact->createUser();
$user->insertUser();




