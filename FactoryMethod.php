<?php

namespace FactoryMethod;

//=====共同接口=====

interface db
{
    function conn();
}

interface Factory
{
    function createDB();
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


class mysqlFactory implements Factory
{
    function createDB()
    {
        return new dbmysql();
    }
}




class sqliteFactory implements Factory
{
    function createDB()
    {
        return new dbsqlite();
    }
}


//=====服务器端新增oracle类=====

class dboracle implements db{
    function conn()
    {
        echo "connect oracle!";
    }
}

class oracleFactory implements Factory
{
    function createDB()
    {
        return new dboracle();
    }
}



//=====客户器端=====

$fact = new mysqlFactory();
$db = $fact->createDB();
$db->conn();

$fact1 = new oracleFactory();
$db1 = $fact1->createDB();
$db->conn();
