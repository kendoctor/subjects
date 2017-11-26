<?php
    //count-sheeps.php

    function speak($words)
    {
        echo $words."\n";
    }
    
    function count_sheep_in_bed($times)
    {
        for($i=1; $i<=$times; $i++)
        {
            speak($i);
        }
    }
    
    speak("I need let myself go to sleep, maybe counting sheep is a good way.");
    
    //couting until over 100 times
    count_sheep_in_bed(100);