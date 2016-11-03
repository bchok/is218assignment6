<?php
    echo 'this demonstrates arbitrary number of arguments<br>';
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
///////////////////////////////////////////////////////////////////////
    echo 'this demonstrates the glob function<br>';
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
////////////////////////////////////////////////////////////////////////
    echo 'This demonstrates the memory usage functions<br>';
    echo "Initial: ".memory_get_usage()." bytes \n";

    //lets use up some memory 
    for($i = 0; $i < 100000; $i++){
        unset($array[$i]);
    }

    echo "Final: ".memory_get_usage()." bytes \n";
    echo "Peak: ".memory_get_peak_usage()." bytes \n";
///////////////////////////////////////////////////////////////////////////
    echo 'This demonstrates the cpu usage functions<br>';
    print_r(getrusage());

    //sleep for 3 seconds (non-busy)
    sleep(3);
    $data = getrusage();
    echo "User time: ".
        ($data['ru_utime.tv_sec'] + $data['ru_utime.tv_usec'] / 1000000);
    echo "System time: ".
        ($data['ru_stime.tv_sec'] + $data['ru_stime.tv_usec'] / 1000000);


    //loop 10 million times (busy)
    for($i = 0; $i < 10000000; $i++){

    }    
    $data = getrusage();
    echo "User time: ".
        ($data['ru_utime.tv_sec'] + $data['ru_utime.tv_usec'] / 1000000);
    echo "System time: ". 
        ($data['ru_stime.tv_sec'] + $data['ru_stime.tv_usec'] / 1000000);
    
    $start = microtime(true);
    //keep calling microtime for about 3 seconds
    while(microtime(true) - $start < 3){

    }
    $data = getrusage();
    echo "User time: ". 
        ($data['ru_utime.tv_sec'] + $data['ru_utime.tv_usec'] / 1000000);
    echo "System time: ". 
        ($data['ru_stime.tv_sec'] + $data['ru_stime.tv_usec'] / 1000000);
//////////////////////////////////////////////////////////////////////////////
    echo 'This demonstrates the magic constants functions<br>';
    //this is relative to the loaded script's path 
    //it may cause problems when running scripts from different directories
    require_once('config/database.php');

    //this is always relative to this files path 
    //no matter where it was included from
    require_once(dirname(__FILE__) . '/config/database.php');

    //some code 
    // ... 
    my_debug("some debug message", __LINE__);
    //some more code 
    //... 
    my_debug("another debug message", __LINE__);

    function my_debug($msg, $line){
        echo "Line $line: $msg\n";
    }
//////////////////////////////////////////////////////////////////////////////
    echo 'This demonstrates generating unique ids<br>';
    //generate unique string 
    echo md5(time() . mt_rand(1, 1000000));
    echo '<br><br>';

    //generate unique string 
    echo uniqid();
    echo '<br>';

    echo uniqid();
    echo '<br>';

    //with prefix 
    echo unqiqid('foo_');
    echo '<br>';
    //with more entropy 
    echo uniqid('', true);
    echo '<br>';
    //both 
    echo uniqid('bar_', true);
    echo '<br>';
/////////////////////////////////////////////////////////////////////////////
    echo 'This demonstrates serialization<br>';
    //a complex array 
    $myvar = array (
        'hello', 42,
        array(1, 'two'),
        'apple'
    );

    //convert to a string 
    $string = serialize($myvar);
    echo $string;
    echo '<br>';

    //you can reproduce the original variable
    $newvar = unserialize($string);

    print_r($newvar);

    //a complex array
    $myvar2 = array(
        'hello', 
        42,
        array(1, 'two'),
        'apple'
    );
    //convert to a string 
    $string = json_encode($myvar2);
    echo $string;
    echo '<br>';

    $newvar2 = json_decode($string);
    print_r($newvar2);
//////////////////////////////////////////////////////////////////////////////
    echo 'This demonstrates compressing strings<br>';
    $string =
    "Lorem ipsum dolor sit amet, consectetur
    adipiscing elit. Nunc ut elit id mi ultricies
    adipiscing. Nulla facilisi. Praesent pulvinar,
    sapien vel feugiat vestibulum, nulla dui pretium orci,
    non ultricies elit lacus quis ante. Lorem ipsum dolor
    sit amet, consectetur adipiscing elit. Aliquam
    pretium ullamcorper urna quis iaculis. Etiam ac massa
    sed turpis tempor luctus. Curabitur sed nibh eu elit
    mollis congue. Praesent ipsum diam, consectetur vitae
    ornare a, aliquam a nunc. In id magna pellentesque
    tellus posuere adipiscing. Sed non mi metus, at lacinia
    augue. Sed magna nisi, ornare in mollis in, mollis
    sed nunc. Etiam at justo in leo congue mollis.
    Nullam in neque eget metus hendrerit scelerisque
    eu non enim. Ut malesuada lacus eu nulla bibendum
    id euismod urna sodales. ";

    $compressed = gzcompress($string);
    echo "Original size: ". strlen($string)."\n";
    echo "Compressed size: ". strlen($compressed)."\n";

    //getting it back
    $original = gzuncompress($compressed);

?>