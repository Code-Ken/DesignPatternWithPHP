<?php
namespace Adapter;

class Adaptee
{
    static function sendParams()
    {
        return array(
            "tb" => "淘宝",
            "tm" => "天猫",
            "jd" => "京东",
        );
    }
}

class Adapter extends Adaptee
{
    static function sendParams()
    {
        $params = parent::sendParams();
        $params = json_encode($params);
        return $params;
    }
}


header("Content-type:text/html;charset = utf-8");

//=====客户端1======

$client1 = Adaptee::sendParams();
echo "tb => " . $client1['tb'] . "<br />";
echo "tm => " . $client1['tm'] . "<br />";
echo "jd => " . $client1['jd'] . "<br />";

//=====客户端1======

$client2 = Adapter::sendParams();
$client2 = json_decode($client2);
echo "tb => " . $client2->tb . "<br />";
echo "tm => " . $client2->tm . "<br />";
echo "jd => " . $client2->jd . "<br />";