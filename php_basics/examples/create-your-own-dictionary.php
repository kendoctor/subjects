<?php

/**
 * display main menu
 */
function display_main_menu()
{
    //clear previous info on screen
    //display main menu
}

/**
 * Get main menu action from input
 */
function get_main_menu_action()
{
    //wait and read console input
    //return input
}

/**
 * Add vocabulary
 */
function add_vocabulary()
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

}

/**
 * get adding vocabulary input
 */
function get_adding_vocabulary_input()
{

}

//cycle until select [5]quit action
while(true) {

    display_main_menu();

    switch(get_main_menu_action())
    {
        case 1:
            add_vocabulary();
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
            break;
        default:
            //continue while cycle
            break ;
    }
}