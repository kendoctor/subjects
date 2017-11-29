<?php

    
/**
* There are other data types in PHP, but we will discuss them more in detail in the future. Here, we introduce them briefly.
* 
* 1. null, means no value .
* 2. object, an instance of an class. 
* 3. resource, a special variable, holding a reference to an external resource.
* 4. callback/callable, functions, methods of functions, static methods of classes
**/

   function speak($subject, $result)
    {
        static $index = 0;
        $index ++;
        if(is_bool($result))
            $result = $result ? "true" : "false";
        echo "($index)$subject : $result \n";
    }


    $initAsNull = null;    

    $value = 1;
    unset($value);

    //accessing an unset variable will cause a warning, except using isset
    speak("unset variable", isset($value));
    speak("\$value == null", $value === null);


    //create an object of class \DateTime
    $initAsNull = new \DateTime();

    speak("gettype(\$initAsNull)", gettype($initAsNull));


    //open a stream resource for listening keyboard input
    $handle = fopen("php://stdin", "r");
    speak("gettype(\$handle)", $handle);

    //closed resource is not allowed for access
    fclose($handle);

    speak("gettype(\$handle)", $handle);


    //an anonymous function can be assigned to a varialbe
    $myFunction = function() { };

    //determine if a variable is a callable
    speak("gettype(\$myFunction)", gettype($myFunction));

    //determine if a variable is a callable
    speak("is_callable(\$myFunction)", is_callable($myFunction));

