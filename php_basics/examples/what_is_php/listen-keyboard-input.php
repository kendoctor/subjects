<?php
    
    //open input stream
    $handle = fopen("php://stdin", "r");

    //listen for input and assign to a variable
    $heard = fgets($handle);
    
    //close input stream
    fclose($handle);  
    
    echo $heard;