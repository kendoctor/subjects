<?php

    /**
     * 1. define two custom functions
     * 2. speak - each output ending with a new line
     * 3. listen_keyboard_input_from_terminal - listen and read the input from keyboard
     */

    function speak($words)
    {
        echo $words."\n";
    }
    

    function listen_keyboard_input_from_terminal()
    {
        speak("I'm ready for u to ask questions.");
        
        $handle = fopen("php://stdin", "r");


        $holds_input_from_keyboard = trim(fgets($handle)); //trim function will strip whitespaces from the beginning and end of a string
        
        fclose($handle);
        
        return $holds_input_from_keyboard;
    }
    
    //make a decision here
    if(listen_keyboard_input_from_terminal() == "What's your name?")
    {
        speak("My name is Robot.");
    }
    else
    {
        speak("I can not understand your questions!");
    }
    
    $next_question = listen_keyboard_input_from_terminal();
    
    //make another decision
    if($next_question == "How old are u?")
    {
        speak("I was just born for answering your questions.");
    }
    else if($next_question == "How long can you live?")
    {
        speak("After I answered your question, I will die.");
        
        speak("But don't worry, you can run me again.");
    }
    else
    {
        speak("I have no idea.");        
    }
    