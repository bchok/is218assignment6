<?php
    function foo($arg1 = '', $arg2 = ''){
        
        echo "arg1: $arg1\n";
        echo "arg2: $arg2\n";

    }
    foo('hello', 'world');
    foo();

    function foo2(){

        //returns an array of all passed arguments
        $args = func_get_args();

        foreach($args as $k => $v){
            echo "arg".($k+1).": $v\n";
        }
    }
    foo2();
    foo2('hello');
    foo2('hello', 'world', 'again');

?>