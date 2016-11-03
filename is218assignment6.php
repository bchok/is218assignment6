<?php
    //function that can take any two arguments
    function foo($arg1 = '', $arg2 = ''){
        
        echo "arg1: $arg1\n";
        echo "arg2: $arg2\n";

    }
    foo('hello', 'world');
    foo();

    //function that can take an arbitrary number of arguments
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

    //glob function that can find filesize
    //get all php files 
    $files = glob('*.php');
    print_r($files);

    //get all php and text files 
    $files = glob('*.{php, txt}', GLOB_BRACE);
    print_r($files);

    //files returned with a path 
    $files = glob('../images/a*.jpg');
    print_r($files);

    //files returned with the full path of each file
    $files = glob('../images/a*.jpg');

    //applies the function to each array element
    $files = array_map('realpath', $files);
    print_r($files);




?>