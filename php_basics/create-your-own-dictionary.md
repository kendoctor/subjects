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
3. Choose action by entering the number, if input not matched, return back to step 2
4. Do action until return back to main menu.

According to the analysis,

* Define functions without implementation.
* Scratch the outlines of program.
* Write comments when needed 

> In the first phase, emphasize to guarantee the main logic of program is right.

 

```php
<?php

/**
 * Display main menu
 */
function display_main_menu()
{
}

/**
 * Get main menu action from input
 */
function get_main_menu_action()
{   
}

/**
 * Action for add vocabulary
 */
function add_vocabulary_action()
{    
}

//cycle until select [5]quit action
while(true) {

    display_main_menu();

    switch(get_main_menu_action())
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
            break;
        default:
            //continue while cycle
            break ;
    }
}
    
```

> Next, writing codes in detail following the main logic until complete the feature. 


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
  
### 2nd Feature : Adding a vocabulary to the dictionary.

Let us list the scenarios and steps for 2nd feature.

1. Choose `Add vocabulary action` on main menu. 
2. Display `Add vocabulary tips` and wait for input
3. User inputs and hit `enter`
    * Add vocabulary and return back to step 2 for continue adding 
        * If successfully added, when return back, show successful tips 
        * Otherwise, show failure tips
    * If input nothing, it will return back to main menu.


According to the analysis,

* Define functions without full implementation.
* Scratch the outlines of Add vocabulary feature.
* Write comments when needed 

```php
<?php
...
    
/**
 * Display adding vocabulary tips
 */
function display_adding_vocabulary_tips()
{
    
}

/**
 * Get adding vocabulary input
 */
function get_adding_vocabulary_input()
{
    
}


/**
 * add a vocabulary to the dictionary
 *
 * @param $headword
 * @param $explanation
 */
function add_vocabulary_to_dictionary($headword, $explanation)
{
}

/**
 * Add vocabulary action
 */
function add_vocabulary_action()
{

    while(true) {
        display_adding_vocabulary_tips();
        $input = get_adding_vocabulary_input();

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
            continue;
        }

        //if input is not matched format, continue while cycle

    }
}

...

```

> Next, writing codes in detail for the feature. 

```php
<?php

...

/**
 * Add vocabulary action
 */
function add_vocabulary_action()
{
    $is_added = null;

    while(true) {
        display_adding_vocabulary_tips($is_added);
        $input = get_adding_vocabulary_input();

        //if input is empty, return back to main menu
        if(empty($input))
        {
            return;
        }

        //do regex match to get : headword and explanation separately
        if(preg_match("/^(.+[^=])=([^=].+)/", $input, $matches))
        {
            //save the vocabulary to dictionary
            add_vocabulary_to_dictionary(trim($matches[1]), trim($matches[2]));
            $is_added = true;
            continue;
        }

        //if input is not matched format, continue while cycle
        //if false, means input not matched
        $is_added = false;

    }

}

/**
 * Display adding vocabulary tips
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
 * Get adding vocabulary input
 */
function get_adding_vocabulary_input()
{
    $handle = fopen("php://stdin", "r");
    $input = fgets($handle);
    fclose($handle);

    return trim($input);
}


/**
 * load vocabularies into array from the dictionary
 */
function loadDictionary()
{
   
}

/**
 * save vocabularies into the dictionary
 *
 * @param $dict
 */
function save_dictionary($dict)
{
   
}

/**
 * add a vocabulary to the dictionary
 *
 * @param $headword
 * @param $explanation
 */
function add_vocabulary_to_dictionary($headword, $explanation)
{
    $dict = load_dictionary();
    //todo: if the vocabulary already exists, should consider more.
    $dict[$headword] = $explanation;
    save_dictionary($dict);
}

...

```

In function `add_vocabulary_to_dictionary`, we defined another two functions for loading and storing vocabularies. 

Write codes in detail to complete the feature.

```php
<?php
...

/**
 * load vocabularies into array from the dictionary
 */
function load_dictionary()
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
function save_dictionary($dict)
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

...
```


### 3rd Feature : List vocabularies from the dictionary.

Let us list the scenarios and steps for this feature.

1. Choose `List vocabularies action` on main menu. 
2. List vocabularies by asc order
    * If the dictionary is empty, show tips
3. Hit 'Enter' return back to main menu.

According to the analysis,

* Define functions.
* Write code for the feature.
* Write comments when needed.

```php
<?php
...
/**
 * List vocabularies by ascending order
 */
function list_vocabularies_action()
{
    //load the dictionary
    $dict = load_dictionary();

    //display vocabularies
    foreach($dict as $headword => $explanation)
    {
        echo sprintf("%s => %s\r\n", $headword, $explanation);
    }

    if(empty($dict))
    {
        echo "The dictionary is empty.\n";
    }

    wait_for_enter_to_continue();
}

/**
 *  Wait until hitting Enter key
 */
function wait_for_enter_to_continue()
{
    $handle = fopen("php://stdin", "r");
    fgetc($handle);
    fclose($handle);
}

//cycle until select [5]quit action
while(true) {

    display_main_menu();

    switch(intval(get_main_menu_action()))
    {
        case 1:
            //add a vocabulary
            add_vocabulary_action();
            break;

        case 2:
            //list vocabularies
            list_vocabularies_action();
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

...


```

### 4th Feature : Find vocabulary by headword in the dictionary.

Let us list the scenarios and steps for this feature.

1. Choose `Find vocabulary action` on main menu. 
2. Show tips and wait for input
3. Input the headword of vocabulary and hit `Enter`
4. Find vocabulary in the dictionary by headword 
    * If found, display the vocabulary
    * Otherwise, display `Not found` tips.
    * If input is empty, return back to main menu
5. Return back to step 2

According to the analysis,

* Define functions.
* Write code for the feature.
* Write comments when needed.

```php
<?php
...
/**
 *  Display find vocabulary tips
 */
function display_find_vocabulary_tips()
{
    echo "Enter the headword of vocabulary which you want to find.\n";
}

/**
 * Listen input from keyboard and trim left-right blanks
 */
function listen_for_input()
{
    $handle = fopen("php://stdin", "r");
    $input = fgets($handle);
    fclose($handle);
    return trim($input);
}

/**
 * Find vocabulary by headword
 */
function find_vocabulary_action()
{
    $dict = load_dictionary();
    print_r($dict);

    while(true)
    {
        display_find_vocabulary_tips();

        $input = listen_for_input();

        if(empty($input))
            return;
        print_r($input);
        if(isset($dict[$input]))
        {
            echo sprintf("%s => %s\n", $input, $dict[$input]);

        }else
        {
            echo "Not found.\n";
        }
    }
}


/**
 * program entry point for running
 */
function run()
{
    //cycle until select [5]quit action
    while(true) {

        display_main_menu();

        switch(intval(get_main_menu_action()))
        {
            case 1:
                //add a vocabulary
                add_vocabulary_action();
                break;

            case 2:
                //list vocabularies
                list_vocabularies_action();
                break;

            case 3:
                //find vocabulary
                find_vocabulary_action();
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
}

run();
...
```


### 5th Feature : Remove vocabulary from the dictionary.

Let us list the scenarios and steps for the feature.

1. Choose `Remove vocabulary action` on main menu. 
2. Show tips and wait for input
3. Input the headword of vocabulary and hit `Enter`
4. Remove the vocabulary in the dictionary by headword 
    * If found, remove and display successful tips
    * Otherwise, display `Not found` tips.
    * If input is empty, return back to main menu
5. Return back to step 2

According to the analysis,

* Define functions.
* Write code for the feature.
* Write comments when needed.

```php
<?php
...

/**
 *  Display remove vocabulary tips
 */
function display_remove_vocabulary_tips()
{
    echo "Enter the headword of vocabulary which you want to remove.\n";
}

/**
 * Remove vocabulary by headword
 */
function remove_vocabulary_action()
{
    $dict = load_dictionary();

    while(true)
    {
        display_remove_vocabulary_tips();

        $input = listen_for_input();

        if(empty($input))
            break;

        if(isset($dict[$input]))
        {
            echo sprintf("Successfully removed: %s => %s\n", $input, $dict[$input]);
            unset($dict[$input]);

        }else
        {
            echo "Not found.\n";
        }
    }

    save_dictionary($dict);
}

/**
 * program entry point for running
 */
function run()
{
    //cycle until select [5]quit action
    while(true) {

        display_main_menu();

        switch(intval(get_main_menu_action()))
        {
            case 1:
                //add a vocabulary
                add_vocabulary_action();
                break;

            case 2:
                //list vocabularies
                list_vocabularies_action();
                break;

            case 3:
                //find vocabulary
                find_vocabulary_action();
                break;
            case 4:
                //remove vocabulary
                remove_vocabulary_action();
                break;
            case 5:
                //quit the program
                break 2;
            default:
                //continue while cycle
                break ;
        }
    }
}

run();

...
```