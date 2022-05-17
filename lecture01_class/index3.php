<?php

/**
 * Anonymous Classes
 */

class A
{
    public function foo()
    {

    }
}



class B 
{
    public function create()
    {
        return new class {
            // 익명클래스는 클래스 자체가 값이 된다
        };
    }
}

$b = new B();
var_dump($b->create()-foo());