<?php
namespace DecoratorPattern;

class Person
{
    protected $component;

    public function __construct(Person $component = null)
    {
        $this->component = $component;
    }

    public function show()
    {
        if ($this->component != null) {
            $this->component->show();
        }else{
            echo "人";
        }
    }
}

class Tshirt extends Person
{
    public function show()
    {
        echo "穿Tshirt的";
        parent::show();
    }
}

class Glass extends Person
{
    public function show()
    {
        echo "戴眼镜的";
        parent::show();
    }
}
class Trouser extends Person
{
    public function show()
    {
        echo "穿裤子的";
        parent::show();
    }
}



header("Content-type: text/html; charset=utf-8");
$p = new Person();
$t = new Tshirt($p);
$g = new Glass($t);
$t = new Trouser($g);

$t->show();
