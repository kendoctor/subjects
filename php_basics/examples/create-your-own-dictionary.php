<?php

/**
 * display main menu
 */
function display_main_menu()
{
    $mainMenu = [
        "Welcome to use self-made dictionary.",
        "Enter the number of which action you want to do!",
        "[1] Add",
        "[2] List",
        "[3] Find",
        "[4] Remove",
        "[5] Exit",
    ];

    //clear previous info on screen
    system('cls');

    //display main menu
    for($i=0; $i<count($mainMenu); $i++)
    {
        echo $mainMenu[$i]."\n";
    }


}

/**
 * Get main menu action from input
 */
function get_main_menu_action()
{
    //wait and read console input and return input

    $handle = fopen("php://stdin", "r");
    $input = fgets($handle);
    fclose($handle);

    return $input;
}

/**
 * Add vocabulary
 */
function add_vocabulary_action()
{
    $is_added = null;

    while(true) {
        display_adding_vocabulary_tips($is_added);
        $input = trim(get_adding_vocabulary_input());

        //if input is empty, return back to main menu
        if(empty($input))
        {
            return;
        }

        //do regex match to get : headword and explanation separately
        if(preg_match("/^(.+[^=])=([^=].+)/", $input, $matches))
        {
            //save the vocabulary to dictionary
            //open or create new file for storing
            add_vocabulary_to_dictionary(trim($matches[1]), trim($matches[2]));
            $is_added = true;
            continue;
        }

        //if input is not matched format, continue while cycle
        //if 0, means input not matched
        $is_added = false;

    }

}

/**
 * display adding vocabulary tips
 */
function display_adding_vocabulary_tips($is_added)
{
    system('cls');
    echo "Input vocabulary, for example: PHP=a web programming language\n";
    echo "Enter nothing to return back to main menu.\n";

    if($is_added === true)
    {
        echo "Successfully added.\n";
    }
    elseif($is_added === false)
    {
        echo "Failed to add.\n";
    }
}

/**
 * get adding vocabulary input
 */
function get_adding_vocabulary_input()
{
    $handle = fopen("php://stdin", "r");
    $input = fgets($handle);
    fclose($handle);

    return $input;
}


/**
 * load vocabularies into array from the dictionary
 */
function loadDictionary()
{
    $dict = [];

    if(!file_exists(__DIR__."/dict.dat"))
    {
        return $dict;
    }

    $handle = fopen("dict.dat", "r");
    if(!$handle)
    {
        die("Exception: can not read dictionary data.");
    }

    while($line = fgets($handle))
    {
        //match as: php=it's a web programming language.
        if(preg_match("/^(\w+)=([\w\s]+)$/", trim($line), $matches))
        $dict[$matches[1]] = $matches[2];
    }

    fclose($handle);

    return $dict;
}

/**
 * save vocabularies into the dictionary
 *
 * @param $dict
 */
function saveDictionary($dict)
{
    $handle =  fopen(__DIR__."/dict.dat", "w");
    if(!$handle)
    {
        die("Exception: create dictionary.");
    }

    //sort headword by ascending
    ksort($dict);
    foreach($dict as $headword => $explanation)
    {
        fputs($handle, sprintf("%s=%s\r\n", $headword, $explanation));
    }


    fclose($handle);
}

/**
 * add a vocabulary to the dictionary
 *
 * @param $headword
 * @param $explanation
 */
function add_vocabulary_to_dictionary($headword, $explanation)
{
    $dict = loadDictionary();
    //todo: if the vocabulary already exists, should consider more.
    $dict[$headword] = $explanation;
    saveDictionary($dict);
}


//cycle until select [5]quit action
while(true) {

    display_main_menu();

    switch(intval(get_main_menu_action()))
    {
        case 1:
            add_vocabulary_action();
            break;

        case 2:
            //list vocabularies
            break;

        case 3:
            //find vocabulary
            break;
        case 4:
            //remove vocabulary
            break;
        case 5:
            //quit the program
            break 2;
        default:
            //continue while cycle
            break ;
    }
}