<?php
namespace ChainOfResponsibility;

class Hander
{
    /**
     * 持有后继的责任对象
     */
    public $successor;

    /**
     * 示意处理请求的方法，虽然这个示意方法是没有传入参数的
     * 但实际是可以传入参数的，根据具体需要来选择是否传递参数
     */
    public function handleRequest()
    {

    }

    /**
     * 赋值方法，设置后继的责任对象
     */
    public function setSuccessor(Hander $hander)
    {
        $this->successor = $hander;
    }
}

class ConcreteHandler extends Hander
{
    public function handleRequest()
    {
        if ($this->successor == null) {
            echo "处理请求</br>";
        } else {
            echo "放过请求</br>";
            $this->successor->handleRequest();
        }
    }
}

class ProjectManager extends Hander
{
    public function payMoney($dollar)
    {
        if ($dollar < 100) {
            echo "项目经理出钱</br>";
        } else {
            echo "项目经理不出钱</br>";
            $this->successor->payMoney($dollar);
        }
    }

}

class DeptManager extends Hander
{
    public function payMoney($dollar)
    {
        if ($dollar < 200) {
            echo "部门经理出钱</br>";
        } else {
            echo "部门经理不出钱</br>";
            $this->successor->payMoney($dollar);
        }
    }
}

class GeneralManager extends Hander
{
    public function payMoney($dollar)
    {
        if ($dollar < 300) {
            echo "总经理出钱</br>";
        } else {
            echo "总经理不出钱</br>";
            $this->successor->payMoney($dollar);
        }
    }
}


header("Content-type: text/html; charset=utf-8");

$client1 = new ConcreteHandler();
$client2 = new ConcreteHandler();
$client1->setSuccessor($client2);
$client1->handleRequest();


$h1 = new ProjectManager();
$h2 = new DeptManager();
$h3 = new GeneralManager();

$h1->setSuccessor($h2);
$h2->setSuccessor($h3);

$h1->payMoney(250);

