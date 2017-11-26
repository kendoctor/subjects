<?php

    //read data from one file and assign to a varaible temporarily
    $data_to_store = file_get_contents("file-to-read.txt");

    //write data into another file for persistance
    file_put_contents("file-to-write.txt", $data_to_store);
