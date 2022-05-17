<?php
/**
 * Exception
 */

//try {
//    throw new Exception('Hello, world');
//} catch (Exception $e) {
//    var_dump($e->getMessage());
//} finally {
//    var_dump("finally");
//}


set_error_handler(function($errno,$errstr) {
    throw new ErrorException($errstr,$errno);
});

set_exception_handler(fn (Exception $e) => var_dump($e->getMessage()));

/**
 * Error
 * 
 * 에러 중에서도 못 잡는 에러들이 발생할수있는데 그것이 fatal error 입니다
 */

try {
    new MyClass();
} catch(Error $e) {
    var_dump($e->getMessage());
}