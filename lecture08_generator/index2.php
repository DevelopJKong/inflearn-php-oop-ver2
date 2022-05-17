<?php
/**
 * Iterartor Interface Implements
 *
 * 이터레이터를 사용하면 번거로우니 결국에는
 * generator를 사용하는것이 또 다른 이유가 되겠다
 */

class NumberIterator implements Iterator
{
    private $i;

    public function __construct($start,$end,$step=1)
    {
        $this->start = $i = $start;
        $this->end= $end;
        $this->step = $step;
    }

    public function rewind(): void
    {
        // TODO: Implement rewind() method.
        $this->i = 0;
    }

    public function valid(): bool
    {
        // TODO: Implement valid() method.
        return $this->i <= $this->end;
    }

    public function current(): mixed
    {
        // TODO: Implement current() method.
        return $this->i;
    }

    public function key(): mixed
    {
        // TODO: Implement key() method.
        return $this->i;
    }

    public function next(): void
    {
        // TODO: Implement next() method.
        $this->i += $this->step;
    }

}

foreach(new NumberIterator(0,10) as $number) {
    var_dump($number);
}