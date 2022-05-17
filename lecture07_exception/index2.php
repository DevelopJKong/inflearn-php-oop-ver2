<?php

/**
 * Exception extends
 */

class MyException extends Exception
{
}

//Error class가 있고 ErrorException class가 있는데 두가지 차이점을 알아두면 좋을거 같습니다

try {
    throw new MyException('Hello, world');
} catch(MyException $e){
    var_dump(MyException::class);
} catch (Exception $e) {
    var_dump(Exception::class);
}