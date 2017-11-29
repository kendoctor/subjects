<?php

/**
 * A boolean is the simplest type which expresses a truth value. It can be FALSE or TRUE.
 *
 * 1. Case-insensitive, It can also be True or False
 * 2. Making decision depends on a boolean value or a boolean expression
 * 3. A value will be automatically converted, if an operator, function or control structure requires a boolean.
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


    //The following values are considered False, when converted to boolean.
        
    //the integer 0
    speak("false == 0", false == 0);

    //the float 0.0 
    speak("false == 0.0", false == 0.0);

    //the empty string or "0" 
    speak("false == \"\"", false == "");
    speak("false == \"0\"", false == "0");

    //an empty array
    speak("[] == false", [] == false);

    //null 
    speak("null == false", null == false);

    speak("gettype(false)", gettype(false));
    
    //0 is a numeric type, not a boolean 
    speak("is_bool(0)", is_bool(0));

    //string "false" is not false
    speak('is_bool("false")', is_bool("false"));

    //echo false will output nothing, echo true will be 1
    
    echo false;
    echo "\n";
    echo true;
    echo "\n";





