<?php

/**
* Person simulation class in PHP 
*/
class Person
{
    /**
     * name of a person
     * 
     * @var string
     */
    private $name;

    /**
     * age of a person
     * 
     * @var int
     */
    private $age;


    /**
     * job of a person
     * 
     * @var string
     */
    private $job;
    

    /**
     * memory for remember things
     * 
     * @var array
     */
    private $memory;

    /**
     * when I am born, give me the properties.
     * 
     * @param string  $name [description]
     * @param integer $age  [description]
     * @param string  $job  [description]
     */
    function __construct($name = "kendoctor", $age = 40,  $job = "trainer")
    {
        $this->name = $name;
        $this->age = $age;
        $this->job = $job;
        $this->memory = [];
    }

    /**
     * Self introduction
     * 
     * @return [type] [description]
     */
    public function introduceMyself()
    {
        $this->speak(sprintf("My name is %s.", $this->name)); 
        $this->speak(sprintf("I'm %s years old.", $this->age));
        $this->speak(sprintf("I'm a %s.", $this->job)); 
    }

    /**
     * Speak something (output words to the console)
     * 
     * @param  [type] $words [description]
     * @return [type]        [description]
     */
    public function speak($words)
    {
        //Remember what I've talked 
        $this->remember($words);
        echo $words."\n";
    }

    /**
     * Listen something (get input from console)
     * 
     * @return [type] [description]
     */
    public function listen()
    {
        $handle = fopen("php://stdin", "r");
        $heard = trim(fgets($handle));
        fclose($handle);

        //Remember what I've heard.
        $this->remember($heard);
        return $heard;
    }

    /**
     * Remember stuff
     * 
     * @param  [type] $stuff [description]
     * @return [type]        [description]
     */
    protected function remember($stuff)
    {
        $this->memory[] = $stuff;

        //merge the same memorized stuff to one
        array_unique($this->memory);
    }

    /**
     * Recall memory
     * 
     * @return [type] [description]
     */
    public function recall()
    {
        echo "These are what I remembered.\n";

        foreach($this->memory as $stuff)
        {
            $this->speak($stuff);
        }
    }

}


//I'm borm now. (instancing $me object)
$me = new Person();

//introduction about me
$me->introduceMyself();

//Speak what I've heard
$me->speak($me->listen());


//Recall the past
$me->recall();






