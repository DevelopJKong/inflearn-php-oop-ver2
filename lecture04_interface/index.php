<?php

function foo(A $a) 
{
    $a->foo();
}


/**
 * Class Abstraction
 */

abstract class A
{
    protected $message = 'Hello,world';

    public function sayHello()
    {
        return $this->message;
    }

    abstract protected function foo();

}

class B extends A
{
    public function foo()
    {
        return __CLASS__;
    }
}

$b = new B();
var_dump($b->sayHello());
var_dump(foo($b));