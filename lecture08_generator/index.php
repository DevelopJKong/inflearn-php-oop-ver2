<?php


/**
 * Generator
 *
 * 매 포인터 마다 데이터를 던져준다 라고 생각하면 좋을거 같습니다
 */

function gen()
{
    yield 1;
    yield 2;
    yield 3;
}

$gen = gen();

//var_dump($gen->current());
//$gen->next();
//var_dump($gen->current());

//foreach ($gen as $numbers) {
//    var_dump($numbers);
//}

function gen2()
{
    yield 1;
    yield from gen();
    yield 2;
}

foreach (gen2() as $numbers) {
    var_dump($numbers);
}

function gen3()
{
    yield 'message' =>'hello, world';
}

foreach(gen3() as $key => $value) {
    var_dump($key,$value);
}

function gen4()
{
    $data = yield;
    yield $data;
}

$gen4 = gen4();

var_dump($gen4->current());
var_dump($gen4->send("hello"));

function __range($start, $end,$step = 1)
{
    for($i = 0; $i <= $end; $i+= $step) {
        yield $i;
    }
}

$s = microtime(true);
foreach(__range(0,10000 ) as $number) {}
//var_dump(microtime(true) -$s, memory_get_peak_usage());

foreach(range(0,10000)  as $number) {}
var_dump(microtime(true) -$s, memory_get_peak_usage());
//generator를 사용하는 이유는 결국에는 메모리 소모를 조금더
//적게 하기 위해서 generator를 사용합니다


