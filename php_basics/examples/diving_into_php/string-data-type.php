<?php

/**
 * A string is a sequence of characters
 *
 * 1. The length is the number of characters in a string
 * 2. Characters in a string can be unprintable characters, like TAB represented by "\t"
 * 3. A string can be empty.
 * 4. A string only contains whitespaces is not empty.
 * 5. A string can be double quoted or single quoted, like 'hello world' or "hello world"
 * 6. Each character in a string has a index as its position. The first character is 0.
 */

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
   
    file_put_contents("file-to-read.txt", "text stored in a file.");
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
    echo gettype($fullName);
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