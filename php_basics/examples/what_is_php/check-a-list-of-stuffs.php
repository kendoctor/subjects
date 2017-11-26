<?php

    function speak($words)
    {
        echo $words."\n";
    }
    
    /**
     * filter nubmers from a list of data items
     * 
     * check each item in an array vairable
     */
    function get_numbers_from_a_collection_of_data($data)
    {
        $numbers = [];
        
        for($i=0; $i<count($data); $i++)
        {
            if(is_numeric($data[$i])){
                array_push($numbers, $data[$i]);
            }
        }

        return $numbers;
    }
    
    $data = ["jack", 123, "rose1", "321", "1william", "12.1", 99.99 ];
    
    $numbers = get_numbers_from_a_collection_of_data($data);
    
    speak("There are these numbers below:");
    
    //this is another method for iterating a array
    foreach($numbers as $single_number)
    {
        speak($single_number);
    }
