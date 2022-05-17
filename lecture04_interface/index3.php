<?php

/**
 * Trait
 */

/**
 * php 같은 경우에는 다중 상속을 지원하지 않습니다 그것을 위해서 나온것이
 * Trait 라고 생각하면 좋습니다
 */

trait A
{
    private $message = "Hello, world";

    public function sayHello()
    {
        return $this->message;
    }

    abstract protected function foo();
}

trait AA
{
    public function sayHello()
    {
        return __TRAIT__;
    }
}

trait AAA
{
    use A, AA {
        A::sayHello insteadof AA;
    }
}

class B
{
    use AAA;

    public function foo()
    {
        return __CLASS__;
    }
}

$b = new B();
//var_dump($b->sayHello());

class C
{
    private $message = 'Hello, world';

    public function sayHello()
    {
        return $this->message;
    }

}

trait D
{
    // public function sayHello()
    // {
    //     return __TRAIT__;
    // }
}

class E extends C
{
    use D;

    // public function sayHello()
    // {
    //     return __CLASS__;
    // }
}

$e = new E();
var_dump($e->sayHello());

// 본래 클래스 => trait => 상속 (부모) 클래스