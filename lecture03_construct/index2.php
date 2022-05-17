<?php

/**
 * Final
 */
//final 를 하면 재정의를 할수없고
//final 상속할수 없는것이 final 키워드 다 정도로 이해하면 좋을거 같습니다


class A
{
    public $message;

    public final function foo()
    {

    }
}


class B extends A
{
    //public function foo(){}
    //cannot override error 발생
}


