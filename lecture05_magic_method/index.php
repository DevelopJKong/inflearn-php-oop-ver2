<?php

/**
 * Magic Method: Methods
 */

class A
{
    //..1
    //foo()를 선언했지만 만약에 foo()가 존재하지 않는다면 이 함수를 호출해줍니다
    public function __call($name, $args)
    {
        return __METHOD__;
    }

//     public function foo()
//     {
//         var_dump(__METHOD__);
//     }

    //string(3) "foo" array(2) { [0]=> string(2) "hi" [1]=> string(5) "hello" } 이런식으로 배열로 받아옵니다
    public static function __callStatic($name, $args)
    {
        var_dump($name, $args);
    }

    public function __invoke(...$args)
    {
        var_dump($args);
    }

}

$a = new A();
//var_dump($a->foo());
//A::foo("hi", "hello");