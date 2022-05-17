<?php

/**
 * Constructor, Destructor
 */

 class A
 {
     public function __construct()
     {
         var_dump(__METHOD__);
     }
     
     //modern 한 상황이 아니면 지원을 안할수도 있어서 construct가 훨씬 중요하다
     public function __destruct()
     {
         var_dump(__METHOD__);
     }
 }

// $a = new A();
// var_dump($a);


/**
 * Constructor Parameters
 */

 class B
 {
     public $message;

     public function __construct($message)
     {  
        $this->message = $message;
     }
 }


 $b = new B('Hello, world');
 var_dump($b->message);



/**
 * Inherit
 */

 class C extends A
 {
     //php 가 유연한 언어이기 때문에 자식 클래스에서 constructor를 선언하면
     //parent를 입력해주지 않으면 자식이 가지고 있는 constructor만 유효해지는데
     //꼭 부모가 가지고 있는 constructor로 선언해줘야한다
    public function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        parent::__destruct();
    }
 }

 $c = new C();

 var_dump($c);