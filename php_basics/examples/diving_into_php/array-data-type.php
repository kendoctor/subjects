<?php


/**
* An array in PHP is actually an ordered map. A map is a type that associates values to keys.
* 
* 1. An array can be created by using array() or []
* 2. The length is the number of elements in an array.
* 3. Each element in an array has an associated index or key
* 4. An element in an array can be any type.
* 5. PHP array is much different in other langauges.
* 6. An element can be accessed by using its assoicated index or key.
* 
*/
   function speak($subject, $result)
    {
        static $index = 0;
        $index ++;
        if(is_bool($result))
            $result = $result ? "true" : "false";
        echo "($index)$subject : $result \n";
    }


    //Initialize arrays
    $fruits = array("apple", "banana", "orange");

    //access one element via its associated index, the first element is 0 by default
    speak("echo \$fruits[0];", $fruits[0]);
    $fruits[0] = "mac";
    speak("echo \$fruits[0];", $fruits[0]);

    //append one element to the end of an array
    $fruits[] = "pear";
    speak("echo \$fruits[3];", $fruits[3]);   

    //dump an array for checking
    print_r($fruits);

    //a list of numbers
    $numbers = [1, 2, 3, 4, 5];

    //mixed data types values, one element in the array is also an array
    $mixedTypes = [1, false, 1.1, "string", [1,2,3], null];

    //key/value pair map
    $map = [
        "Jack" => "teacher",
        "Rose" => "nurse",
        "Robot" => "developer"
    ];

    //access one element via its associated key
    speak("echo \$map[\"Jack\"];", $map["Jack"]);

    print_r($map);

    //use function count or sizeof to get the length of an array
    speak("count([1,2,3]);", count([1,2,3]));
    speak("sizeof([1,2,3]);", sizeof([1,2,3]));

    //check if an array is empty.
    speak("empty([])", empty([]));
    
    //remove one element from an array
    $dices = [1,2,3,4,5,6];
    unset($dices[0]);
    print_r($dices);

    //use function isset to check the key if exists
    $obj = [
        "name" => "Jack",
        "age" => 22,
        "sex" => false
    ];

    speak("isset(\$obj['height']);", isset($obj['height']));
    speak("isset(\$obj['age']);", isset($obj['age']));

    //check array operators to see more examples
    //union two arrays
    $arr1 = [ "name" => "Jack"];
    $arr2 = [ "age" => 22 ];    
    $unionArray = $arr1 + $arr2;
    print_r($unionArray);

    //empty array converted to boolean is false
    speak("[] == false", [] == false);

    //comparing two arrays have the same key/value pairs   
    speak("[1,2] == [1,2]", [1,2] == [1,2]);

    