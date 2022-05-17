<?php

/**
 * Visibility
 */
// public 은 전부 들어올수있습니다
// protected 상속 받은 내부에서는 사용할수있습니다 property나 method는 사용가능
// private는 내부에서만 접근 가능합니다

 class A
 {
     public $public = 'public';
     protected $protected = 'protected';
     private $private = 'private';

     public function __construct()
     {}
 }

 $a = new A();
 //var_dump($a->public);
 //var_dump($a->protected);
 //var_dump($a->private);


class B extends A {

    private $message = 'hi,world';

    public static $instance;

    public function __construct()
    {
        parent::__construct();
        var_dump($this->message);
    }

    public static function getInstance()
    {
       // return self::$instance ?: self::$instance = new self();
       return new self();
    }
}
// $b = new B();
// var_dump($b->foo());

$b = B::getInstance();
$bb = B::getInstance();
var_dump($b === $bb);