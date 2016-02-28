<?php

class subject implements SplSubject
{
    private $observers;

    public function __construct()
    {
        $this->observers = array();
    }

    public function attach(SplObserver $observer)
    {
        return array_push($this->observers, $observer);
    }

    public function detach(SplObserver $observer)
    {
        $idx = array_search($observer, $this->observers, true);
        if ($idx) {
            unset($this->observers[$idx]);
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
        return true;
    }
}

class observe implements SplObserver
{

    public function update(SplSubject $subject)
    {
        echo "通知观察者</br>";
    }
}

class observe1 implements SplObserver
{

    public function update(SplSubject $subject)
    {
        echo "通知另一观察者</br>";
    }
}

$subject = new subject();
$observer = new observe();
$observer1 = new observe1();

header("Content-type: text/html; charset=utf-8");
$subject->attach($observer);
$subject->attach($observer1);

$subject->notify();

$subject->detach($observer1);
$subject->notify();