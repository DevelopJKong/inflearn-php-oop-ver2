<?php


include_once "./Hello.php";
use Test\Hello;

$a = new Hello(10,"jeong","1234");

var_dump($a->getId());
