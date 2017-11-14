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
        //if 0, means input not matched
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
function saveDictionary($dict)
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
    $dict = loadDictionary();
    //todo: if the vocabulary already exists, should consider more.
    $dict[$headword] = $explanation;
    saveDictionary($dict);
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

...
```






