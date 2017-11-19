# What is PHP?

> Learn PHP from our real world.

PHP is a programming language mainly for web application. You can create your own website in PHP.

## Prerequisites

1. Having common experience about web surfing and basic knowledge about browsers, HTTP.
2. Understanding how to setup PHP run-time environment.

## Imaginative terms

* behaviors, actions, verbs -> functions
* conditions, objects of sentences -> arguments or parameters
* speak-listen, eat-vomit, write-read -> input-output
* container, holder, paper, memory  -> variable, file, database
* making decisions -> if, if...else...
* repeating or cycling -> for, foreach


## Contents

### What should I do in the first ?

To run a PHP program we will need to setup PHP runtime environment.

### How do I make a PHP program ?

To create your first PHP program, write codes in a text editor and save it as a .php file. 

For example **hello-world.php**

### How can I make a simple PHP program?

```php
<?php
    //hello-world.php
    echo "Hello world! I'm a php program.";
```

Write the code above in a text editor, and save as `hello-world.php`.

**NOTE**:
 
1. Contents following `//` are comments which give descriptive explanation, not codes.
2. `<?php` indicates that we are coding in PHP. 

### How to run PHP programs?

We can run php programs in two different environments.

#### Run in console environment

Open console or terminal in the same directory as `hello-world.php`. 
ie. example c:\php_programs\hello-world.php means to open the terminal/console in c:\php_programs
Then run:
```
    php hello-world.php
```

This will output contents in the terminal as below 

```
    Hello world! I'm a php program.
```
 
#### Run on web server

Open a console or terminal, and launch the web server using:

```
    php -S localhost:8080
``` 

Open your browser (chrome, firefox, safari, opera or ie), and enter the address: `localhost:8080/hello-world.php`

This will output `Hello world! I'm a php program.`, in browser.


### What PHP programs can do ?

PHP programs can do a lot of things.

We can speak, listen, eat, dance, sing.

PHP programs are similar and have behaviors that can do actions like people.

A television has the functionality to be turned on or turn off, switch channels, and show video on the display.

PHP programs have their own functionality like devices and machines.

We see in the PHP example above that a PHP program can speak words to a terminal, or browser.


### Can PHP programs listen?

Yes, people can listen to people and to radios.

PHP programs can listen to input from keyboards, and can listen to files.

We can consider speaking as an output action and listening as an input action.

When a PHP program outputs information we can consider it as speaking or writing.

When a PHP program inputs information we can consider it as listening or reading.

> `Speak` to a file

```php
<?php
    //speak-to-a-file.php
    
    file_put_contents("a-file-to-speak.txt", "I'm a php program, I can speak to a file.");
    
```

> `Listen` to a file and `Speak` to terminal

```php
<?php
    //listen-and-speak-from-file-to-terminal.php
    
    $memorize_what_i_have_heard = file_get_contents("a-file-to-listen.txt");
    
    echo $memorize_what_i_have_heard;
    
```

> `Listen` to terminal input from keyboard

```php
<?php
    //listen_to_terminal_input_from_keyboard.php
    
    $handle = fopen("php://stdin", "r");
    $holds_input_from_keyboard = fgets($handle);
    fclose($handle);  
    
    echo $holds_input_from_keyboard;
    
```

**NOTE**, the program above can only be run in the terminal for keyboard input to work

```php
    php listen_to_terminal_input_from_keyboard.php
    
```

In the future we will learn how to speak and listen to a database for data processing.
 

### How to store things?

People can memorize information using their brain, and save information by writing on papers for later use.

PHP programs can store information, or data, in two different ways.

#### Store information or data in temporarily.

We can pour water into cups, and when we need to we can empty the cups. Cups are considered as temporary containers.

PHP programs use variables to store temporary data, and when program is finished the data is lost.

In the example above `$memorize_what_i_have_heard` is a variable; just like a cup which can holding water.

First, we need give a name to a variable and then assign data to it.

```php
<?php
    $holds_number = 99;
    $holds_text = "characters, words, sentences";
    $holds_from_input = file_get_contents("data.txt");

```
        

#### Store information or data in permanently.

When we write information into books we can permanently record information.

PHP programs can store information, or data, into files and databases. When needed we can retrieve the information.

```php
    $information_read = file_get_contents("file-to-read.txt");
    file_put_contents("file-to-write.txt", $information_read);
    
```   


### How to classify information type


### How to identify behaviors or actions

People can do lots of things. In order to  differentiate these behaviors, we give a name to each one. 

* speak - output your words, ideas to others
* listen - listen ideas, musics, sounds from outside, even you can listen to yourself. 
* dance - show a sequence series of actions to show what people want to express  
* sing - output words in a special way to show which people want to express
* eat - take food for input energy or nutrition for life.

We call these as verbs in our languages.

In program, we also give names for behaviors.

* echo - output information to terminal, cache, or to browser.
* file_put_contents - output information to a file 
* file_get_contents - read information from a file
* fopen - open a stream for reading information just like opening water tap for getting water.
* fgets - read information from stream just like getting water when tap is open.
* fclose - close a stream just like closing water tap. 

We call these as functions in programming language.
  

### What's the object of verb for PHP functions?

In sentences, as we know, there are subjects, verbs and objects.  

* They are dancing. - subject + verb
* We eat food for life. - subject + verb + object
* She took a book and a pen. - subject + verb + object + object
* Take care of yourself. - verb + object

In program, there are also these concepts.

* echo "some strings or texts"; - verb + object
* fopen("filename", "r"); - verb + two objects
    1. "filename" - which file to open 
    2. "r" - open this file only for reading without writing permission.

In program call these objects as arguments or parameters.

**NOTE**
  
Then, where are subjects? We will discuss this topic later.


### How to create new behaviors

When phone was invented, new behaviors occurred. 

> `Make a phone call`.

How to make a phone call?
1. Fetch phone
2. Dial phone numbers
3. Wait for answer
4. When accepted, speak to the other side, or listen to the other side
5. When communication finished, hang up phone

As wee can see, we compose these basic actions and perform them step by step for making a phone call to others.

In program, you can also create your own functions based on already existed functions. 

This is called **customizing functions**.

Let us create a customized function named `listen_keyboard_input_from_terminal`.
1. open stream for listening just like dialing and being accepted
2. read stream and store in a temporary variable just like communication
3. close the stream just like hanging up phone
4. return input 

Define customized function and implement its logic in the brackets.

When created, this function can be called or invoked if needed.

```php
<?php

    //define customized function and implement the function's logic
    function listen_keyboard_input_from_terminal()
    {
        $handle = fopen("php://stdin", "r");
        $holds_input_from_keyboard = fgets($handle);
        fclose($handle);
        
        return $holds_input_from_keyboard;
    }
    
    //call function and echo the immediate return result 
    echo listen_keyboard_input_from_terminal();    

```

### How to make decision

> Decision in the past can not be changed. Decision can be designed for the future.

Deciding is the great ability for humans.
1. If I have 10$, I will buy this toy.
2. If it will not rain in the afternoon, I will go to see a film. Otherwise, I will stay at home and play games.

  
Program also has the ability of making decisions.

```php
<?php
    
    function speak($words)
    {
        echo $words."\n";
    }
    
    function listen_keyboard_input_from_terminal()
    {
        speak("I'm ready for u to ask questions.");
        
        $handle = fopen("php://stdin", "r");
        $holds_input_from_keyboard = fgets($handle);
        fclose($handle);
        
        return $holds_input_from_keyboard;
    }
    
    if(listen_keyboard_input_from_terminal() == "What's your name?")
    {
        speak("My name is Robot.");
    }
    else
    {
        speak("I can not understand your questions!");
    }
    
    $next_question = listen_keyboard_input_from_terminal();
    
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
    
```

### How to repeat doing things

When you can not sleep, maybe you will count sheep in bed, repeating numbers incrementally.

Programs also can do this.

```php
<?php

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
    
    count_sheep_in_bed(100);
``` 

Before products to be labelled as qualified, they will be checked by workers one bye one.

Programs also can do checking for a collection of stuffs.

```php
<?php

    function speak($words)
    {
        echo $words."\n";
    }
    
    function get_numbers_from_a_collection_of_data($data)
    {
        $numbers = [];
        
        for($i=0; $i<count($data); $i++)
        {
            if(is_numeric($data[$i])){
                array_push($numbers, $data[$i]);           
            }
        }
        return $numbers;
    }
    
    $data = ["jack", 123, "rose1", "321", "1william", "12.1", 99.99 ];
    
    $numbers = get_numbers_from_a_collection_of_data($data);
    
    speak("There are these numbers below:");
    
    foreach($numbers as $single_number)
    {
        speak($single_number);
    }
    
```

## Conclusions

Learn how to imagine from the real word to the virtual world of programming.

Comparing and relating with concepts between these two worlds will help you more easily to understand the cores of programming ideas.  

## Exercises



