# Create your own dictionary

## Prerequisites

## Contents 

### Analyzing First

> Analyze **WHAT TO DO**.
> It's very important phase before do any coding things.

Analyze what to do and determine which features we should implement at first.

Prioritize features in orders. Choose most important feature to do first.

Preconditions and constraints:
1. The dictionary program should be run in console.

Let us list our features to implement for our dictionary.
1. Adding a vocabulary to the dictionary.
2. List vocabularies from the dictionary.
3. Find vocabulary by headword in the dictionary.
4. Remove vocabulary from the dictionary.

Let us think more about how to interact with the console, because running in console is in preconditions and constraints.

We need text-menu functionality first. Feature list should be adjusted.
1. Create text-menu for performing actions.
2. Adding a vocabulary to the dictionary.
3. List vocabularies from the dictionary.
4. Find vocabulary by headword in the dictionary.
5. Remove vocabulary from the dictionary.
 
  

### 1st Feature : Create text-menu for performing actions

> We already know what to do, but still do not know how to do.

> Analyze again for **HOW TO DO**. 

More complex problem is, more analysis need to be done.

A clear clue to step forward is very important. 

Let us list the scenarios and steps for 1st feature.

1. Run the program
2. Display main menu list for add, list, find, remove and quit actions
3. Choose `[1]Add` action by entering number indicator of actions
    * If input not matched, return back to step 2
4. Display `Add vocabulary tips` and wait for input
5. Input vocabulary information and hit `Enter`, 
    * Do `add_vocabulary` logic and return back to step 4 for continue adding 
        * If successfully added, when return back, show successful tips 
        * Otherwise, show failure tips
    * If input nothing, it will return back to main menu.


According to the analysis,

* Define functions without implementation.
* Scratch the outlines of program.
* Write comments when needed 

> In the first phase, emphasize to guarantee the main logic of program is right.

 

```php
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
    
```

> Next, writing codes in details following the main logic until complete the feature. 



```php
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
```
  
  










