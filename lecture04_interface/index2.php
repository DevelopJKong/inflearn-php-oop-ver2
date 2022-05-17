<?php

function foo(A $a)
{
    return $a->foo();
}

/**
 * interface
 */
//interface는 기능적인 부분을 보여주고 싶을때 사용하고
//abstract 같은 경우에는 특정 함수를 구현하고 싶을때 사용한다

interface A extends AA
{
    public function foo();
}
// interface를 확장하고 싶을때

interface AA
{
    public function sayHello();
}

class B implements A
{
    public function foo()
    {
        return __CLASS__;
    }

    public function sayHello()
    {
        return "HELLO!";
    }
}

$b = new B();
var_dump(foo($b));