<?php

/**
 * Namespaces
 */

namespace A {
    const MESSAGE = __NAMESPACE__;

    class A
    {
        public function foo()
        {
            return __METHOD__;
        }
    }

    function foo()
    {
        return __FUNCTION__;
    }
}

namespace A\B
{
    class A
    {
        public function foo()
        {
            return __METHOD__;
        }
    }
}

namespace
{
    use const A\MESSAGE;

    // $a = new A();
    // $a = new AB();
    var_dump(MESSAGE);
}