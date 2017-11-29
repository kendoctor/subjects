# Diving into PHP

To be familiar with this new world, we have lots of stuffs to memorize and practice.

Be prepared.

## Prerequisites

* Have passed the subject - `What's php?`
* Be able to use a dedicated coding editor

## Contents

### Data types in PHP

> String 

A string is a sequence of characters, here are some features below

* The length is the number of characters in a string
* Characters in a string can be unprintable characters, like TAB represented by "\t"
* A string can be empty.
* A string only contains whitespaces is not empty.
* A string can be double quoted or single quoted, like 'hello world' or "hello world"
* Each character in a string has a index as its position. The first character is 0.


```php
<?php
    //string-data-type.php

    $myQuestion = "What's your name?";

    $bookTitle = "Learning PHP from the real world";

    $yourName = "Jack";

    $lastName = "Chen";

    //use . operator to concatenate the two strings
    $fullName = $yourName." ".$lastName;

    
    $emptyString = "";
    //determine if the string is empty
    echo empty($emptyString);
    echo "\n";

    //SECTION is a mark named by yourself
    $paragrah = <<<SECTION

Use this method, 
we can assign multiple lines to a variable. 

SECTION;
   
    file_put_contents("file-to-read", "text stored in a file.");
    //read texts from file as a string
    $readFromFile = file_get_contents("file-to-read.txt");


    //special characters of string
    $newLine = "\n";
    $tab = "\t";
    $return = "\r";

    //get the length of string
    echo strlen($fullName);
    echo "\n";


    //determine if the value is string data type
    echo is_string($fullName);
    echo "\n";
    echo gettype($fullname);
    echo "\n";

    //escape double quotes in a string
    $quotesInString = "Use \"Escape\" character ";    


    //escape single quotes in a string
    $singleQuoteString = 'Double quotes do "not" need escaping in \'single\' quote string';

    //no escape if doulbe quotes in single-quoted string, vice versa
    $quoteInString = "It's me.";

    //double backslashs equal one blackslah
    $blackslah = "\\";
    echo $blackslah;
    echo "\n";

    //fetch one character by index each time
    for($i=0; $i<strlen($fullName); $i++)
    {
        echo substr($fullName, $i, 1);
    }
    echo "\n";


    //inject variable into a string 
    $php = "PHP";
    $injectedString = "You're leaning $php programming.\n";
    echo $injectedString;

    $notAffected = "\$php is a variable.\n";
    echo $notAffected;

```

> Number

A number is a quantity or amount and holds an arithmetical value.

* Numbers are devided into categories, integer and float(double, real numbers)
* The size of a number depends on the system. 
* A number has its limit because the size is limited.
* A number can be represented in decimal, hexadecimal, otcal or binary form.
* A number maybe be negative or positive.
* A number can be NaN. This value presents an undefined or unpresentable value in floating-point calculations.

```php
<?php
    //number-data-type.php

    $age = 22;
    echo gettype($age);
    echo "\n";

    $width = 10;
    $height = 20;

    $area = $width * $height;

    //Use string to present the unit of a number
    $myMoney = 1000.12;
    echo "I have $myMoney$\n";
    echo gettype($myMoney);
    echo "\n";

    //scientific presentation
    $highPrecision = 1.3e-4;
    echo $highPrecision;
    echo "\n";

    echo 1.3e2 === 1.3 * 10**2;
    echo "\n";

    $negative = -10;
    $zero = 0;
    $positive = 10;

    //UNIT is byte
    echo PHP_INT_SIZE;
    echo "\n";

    echo PHP_INT_MAX;
    echo "\n";
    echo PHP_INT_MIN;
    echo "\n";


    $decimal = 100;
    $octal = 010;
    $hexa = 0xFF;
    $binary = 0b10;

    echo sprintf("d:%s, o:%s, h:%s, b:%s\n", $decimal, $octal, $hexa, $binary);

    echo gettype(NAN);
    echo "\n";

    echo is_numeric(1.0e3);
    echo "\n";

    //if a string holds a valid number
    echo is_numeric("10.10");
    echo "\n";

    //Arithmatic expressions
    $addition = 1+1;
    $subtraction = 1-1;
    $multiplication = 2*2;
    $devision = 4/2;
    $modulo = 10%3;
    $exponentiation = 2**8;

    //increment the value by 1
    $increment = 1;
    $increment++;

    //decrement the value by 1
    $decrement = 0;
    $decrement--;


```

> Boolean

A boolean is the simplest type which expresses a truth value. It can be FALSE or TRUE.
 
* Case-insensitive, It can also be True or False
* Making decision depends on a boolean value or a boolean expression
* A value will be automatically converted, if an operator, function or control structure requires a boolean.

```php
<?php
    //boolean-data-type.php

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

```

> Array

An array in PHP is actually an ordered map. A map is a type that associates values to keys.
 
* An array can be created by using array() or []
* The length is the number of elements in an array.
* Each element in an array has an associated index or key
* An element in an array can be any type.
* PHP array is much different in other languages.
* An element can be accessed by using its assoicated index or key.


```php
<?php
    //array-data-type.php

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

```

> More data types

There are other data types in PHP, but we will discuss them more in detail in the future. Here, we introduce them briefly.

* null, means no value .
* object, an instance of an class. 
* resource, a special variable, holding a reference to an external resource.
* callback/callable, functions, methods of functions, static methods of classes


```php
<?php
    //more-data-types.php

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

    //The type is object, but it is a special object
    speak("gettype(\$myFunction)", gettype($myFunction));

    //determine if a variable is a callable
    speak("is_callable(\$myFunction)", is_callable($myFunction));

```


### Variables and Constants

Variable - A container holds a value which maybe will change.
Constant -  A container holds a fixed value.

* A variable should have a identifier.
* A constant maybe have a identifer.
* The scope of a varialbe or a constant is the content within which it is defined. We will discuss it in the future.
* There are predefined varaibles in PHP. We will introduce them one by one in the future. 
* There are prefedined constants in PHP. We will introduce them one by one in the future. 
* variable variables

```php
<?php
    //variables-constants.php


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


```



## Conclusions


## Excercies

