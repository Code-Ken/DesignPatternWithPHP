<?php
namespace Bridge;

abstract class info
{
    protected $send = null;

    public function __construct($send)
    {
        $this->send = $send;
    }

    abstract public function msg($content);

    public function send($to, $content)
    {
        $content = $this->msg($content);
        $this->send->send($to, $content);
    }
}

class email
{
    public function send($to, $content)
    {
        echo 'email给' . $to . '的内容是' . $content;
    }
}

class sns
{
    public function send($to, $content)
    {
        echo 'sns给' . $to . '的内容是' . $content;
    }
}



class commonInfo extends info
{
    public function msg($content)
    {
        return '普通' . $content;
    }
}

class warnInfo extends info
{
    public function msg($content)
    {
        return '紧急' . $content;
    }
}

//====客户端====
header("Content-type:text/html;charset = utf-8");

$send = new warnInfo(new email());
$send->send("小明","内容");