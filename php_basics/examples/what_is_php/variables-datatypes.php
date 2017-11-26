<?php

    //integer
    $age = 22;
    echo gettype($age); //get the data type of the varaible
    echo "\n";

    //float number
    $weight = 55.55;
    echo gettype($weight);
    echo "\n";

    //string or text
    $text = "characters, words, sentences and unprintable characters";
    echo gettype($text);
    echo "\n";

    //array, [] is a shorthand for defining an array
    $fruits = array("apple", "banana", "orange");
    $mixedItems = [1, 2, "you", 3, "me"]; 
    echo gettype($fruits);
    echo "\n";
