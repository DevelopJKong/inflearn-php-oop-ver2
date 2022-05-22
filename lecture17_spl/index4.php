<?php

//include './Classes/MyClass.php'; // 객체지향처럼 사용하고 싶어서 autoload를 사용하는것이다
use  Classes\MyClass;

spl_autoload_register(function ($classname) {
    include $classname.'.php';
});

$a = new MyClass();

var_dump($a->show());