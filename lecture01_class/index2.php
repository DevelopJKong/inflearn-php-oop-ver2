<?php

/**
 * Properties and Methods
 */
class A
{
    public $message = 'Hello, world';

    public function foo()
    {
        return $this->message;
    }
}

$a = new A();
//var_dump($a->foo());

/**
 * Inherit
 */

class B extends A
{
}

$b = new B();
//var_dump($b->foo());

/**
 * in Functions
 */
// 이 부분을 정확하게 이해를 못하겠다
// 왜? 이렇게 사용이 가능한거지?
function foo(A $a)
{
    return $a->foo();
}
var_dump(foo($a));
var_dump($a->foo());

/**
 *  Context
 */
class C extends A
{
    public function foo()
    {
        // C
        //return new self(); //자기 자신을 의미를 한다

        // 정적 바인딩이라고 표현한다
        // D
        //return new static();

        // A
        return new parent();
    }
}

class D extends C
{

}

$d = new D();
//var_dump($d->foo());

/**
 * Constants
 */
class E
{
    const MESSAGE = 'Hi, world';

    public function getConstants()
    {
        //:: scope 해결 연산자
        //상수에 들어갈때 일단 사용한다
        return self::MESSAGE;
    }

    public function getClassName()
    {
        return __CLASS__;
    }
}
$e = new E();
//var_dump($e->getConstants());
var_dump($e->getClassName());
/**
 *  instanceof
 */

 $d = new D();
 var_dump($d instanceof C);