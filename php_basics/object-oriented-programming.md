# Object oriented programming

OOP is a programming idea. You can use it in analysis, catalog, design, coding. 

## Prerequisites

1. Finish `What's PHP` subject

## Contents

### Class and Object

People differentiate things into classes, types or catalogs. For examples, human, electronics, fruits etc.

In OOP language, it also has this idea. In PHP, use keyword `class` define a class.

For example, we are persons.
* we have properties, such weight, height, eye color, age etc.
* we have behaviors, such speaking, listening, etc.
* properties hold statuses, it means properties store specific values for representation.
* behaviors achieve objectives, it means behaviors show functionality for this class.

Let us see how to define a `Person` class in PHP below

```php

<?php

//Person.php
class Person 
{
    //weight of one person
    private $weight;
    
    //height of one person
    private $height;
    
    //eye color of one person
    private $eyeColor;
    
    //age of one page
    private $age;
    
    //when one person is born,      
    function __construct()
    {
        //initial weight is 5kg
        $this->weight = 5;
        
        //initial age is 1
        $this->age = 1;
        
    }
    
    //this person can speak
    public function speak()
    {
    }
    
    //this person can listen
    public function listen()
    {
    }
}

```

People differentiate objects of the same type by giving their names.

When you, your brothers, your sisters were born, your parents named you.

We are all one instance of human and the type of person.

In PHP, one instance of a class is called `object`.

PHP object also has birthday.

Let us see how to give birth a PHP object.

```php
<?php

class Person
{
    ....
}

$you = new Person();
$you->speak();

$me = new Person();
$me->listen();

```


```php
<?php


```


### How to start defining a class?

> Before coding ,we need understand what to do, what problems need be solved.

If you define a class which is nothing helpful for real problems, that's nonsense.

Sometimes, others give you questions, you need help them to give the answers.

Sometimes, you discover the problems, you need think to solve them.

Anyway, you need analyze the requirements or problems first, catalog and organize things more understandable and more structured.

Until we've understand `WHAT TO DO`, we begin to analyze `HOW TO DO`.

In this phase, if we use OOP idea, start defining classes from here.

For example, here we have a requirement to achieve.

>  I need a e-dictionary to save vocabularies which I'm easy to forget.

We analyze the requirement and refactor it as

> Add vocabulary into the dictionary.

Next, analyze the steps to achieve this goal.

* Run the program
* User input vocabulary data
* Dictionary save the vocabulary
 

```php
<?php

class Program
{
    protected function getVocabularyFromUserInput()
    {
        //return a Vocabulary object
    }
    
    protected function getDictionary()
    {
        //return a Dictionary object
    }
    
    public function run()
    {
        $vocabulary = $this->getVocabularyFromUserInput();
        $dictionary = $this->getDictionary();
        
        $dictionary->add($vocabulary());
        $dictionary->save();    
        
    }
    
}

class Dictionary
{
    public function add($vocabulary)
    {
    }
    
    public function save()
    {
    }
}

class Vocabulary
{
    $private $headword;
    $private $explanation;
    
}

$program = new Program();
$program->run();


```
 

Catalog and encapsulation


### Organization and Catalog

### White box

### Black box

### Interface and contracts

### Interaction and communication between objects

Object oriented design



classes
1. Dictionary
2. Vocabulary
3. Menu
