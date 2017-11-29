<?php

/**
* Variable - A container holds a value which maybe will change.
* Constant -  A container holds a fixed value.
* 
* 1. A variable should have a identifier.
* 2. A constant maybe have a identifer.
* 3. The scope of a varialbe or a constant is the content within which it is defined. We will discuss it in the future.
* 4. There are predefined varaibles in PHP. We will introduce them one by one in the future. 
* 5. There are prefedined constants in PHP. We will introduce them one by one in the future. 
* 6. variable variables
*/

    function speak($subject, $result)
    {
        static $index = 0;
        $index ++;
        if(is_bool($result))
            $result = $result ? "true" : "false";
        echo "($index)$subject : $result \n";
    }

    //left side is a variable, right side is a constant string without an identifier
    $variable = "constant string";

    //define a constant with an identifier. The value of an constant can not be reassigned.
    //by default, the identifier is case-sensitive.
    
    define("PI", 3.1415926);

    //case-insensitive
    define("Sunday", 1, true);
    speak("Sunday is the same with SUNDAY", Sunday === SUNDAY);

    //another defining constants method
    //always case-sensitive
    const ME = "Jack";

    {
        $age = 22;

        //not allowed, invalid
        //const SECOND = "2nd";
        
        //valid
        define("IT", "Information Tech.");
    }

    speak("IT", IT);
    speak("\$age", $age);

    function diffBetweenDefineAndConst()
    {
        //not allowed, invalid
        //const FIRST = "1st";
        
        //valid
        define("YOU", "Rose");
    }

    //not allowed
    //echo YOU; 
   
    //not allowed, invalid
    //define("WE", ME.ME.ME);
    
    //valid
    const WE = ME.ME.ME;
    speak("ME.ME.ME", WE);
    

    //characters in an identifier can be a-z and A-Z and _ and 0-9 digits
    //but the first character should not be a digit.    
    //varaible identifiers prefix $ 
    $_underscore = "Valid identifier";
    $NO1 = 1;

    //variable variables
    $prop = "name";
    $name = "Jack";

    speak("\$\$prop is the same with \$name now.", $$prop === $name);

    //to avoid ambiguity, place curly braces
    speak("\${\$prop}", ${$prop});

    function myFunc() {
        echo "Hello world\n";
    }

    $myFunc = "myFunc";
    //use function name in a varialbe to call the function
    $myFunc();





