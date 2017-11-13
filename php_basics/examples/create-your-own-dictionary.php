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
    while(true) {
        display_adding_vocabulary_tips();
        $input = trim(get_adding_vocabulary_input());

        //if input is empty, return back to main menu
        if(empty($input))
        {
            return;
        }

        //if input is not matched format, continue while cycle



        //write add vocabulary logic
    }

}

/**
 * display adding vocabulary tips
 */
function display_adding_vocabulary_tips()
{
    system('cls');
    echo "Input vocabulary, for example:\n";
    echo "PHP=a web programming language\n";
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