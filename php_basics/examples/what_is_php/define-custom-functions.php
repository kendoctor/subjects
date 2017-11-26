<?php

    //define custom function and implement the function's logic
    function listen_keyboard_input_from_terminal()
    {
        //open the stream
        $handle = fopen("php://stdin", "r");

        //listen and get the input when press enter
        $read = fgets($handle);

        //close the stream
        fclose($handle);
        
        //return the read
        return $read;
    }
    
    //call the function and echo the return result immediately
    echo listen_keyboard_input_from_terminal();  