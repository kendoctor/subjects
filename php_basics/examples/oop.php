<?php
/**
 * Created by PhpStorm.
 * User: kendoctor
 * Date: 17/11/16
 * Time: 下午1:27
 */

class File
{

    private $handle;
    private $filename;


    public function __construct($filename = null)
    {
        if($filename !== null)
            $this->open($filename, "w+");
    }

    public static function create($filename)
    {
        if(file_exists($filename))
        {
            return new self($filename, "w");
        }
    }

    public function open($filename, $mode = "r")
    {
        if($this->handle)
            $this->close();

        $this->filename = $filename;

        if (file_exists($filename)) {
            $this->handle = fopen($this->filename, $mode);
        }

        if(!$this->handle)
            throw new \Exception(sprintf("file %s open failed.\n", $filename));
    }

    public function readLine()
    {
        return fgets($this->handle);
    }

    public function close()
    {
        fclose($this->handle);
    }
}


class Menu
{
    private $title;
    private $description;

    private $menuItems = array();

    public function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function addMenuItem($name, $callback)
    {
        $this->menuItems[] = array(
            "name" => $name,
            "callback" => $callback
        );
    }

    protected function display()
    {
        echo $this->title."\n";
        echo $this->description."\n";

        foreach ($this->menuItems as $index => $menuItem) {
            echo sprintf("[%s] %s\n", $index, $menuItem["name"]);
        }
    }

    protected function readInput()
    {
        $handle = fopen("php://stdin", "r");
        $input = fgets($handle);
        fclose($handle);

        return trim($input);
    }

    protected function getMenuItem($name)
    {
        foreach($this->menuItems as $index => $menuItem )
        {
            if($index == $name)
                return $menuItem;
        }

        return null;
    }

    public function listen()
    {
        while (true) {
            $this->display();
            $input = $this->readInput();
            $menuItem = $this->getMenuItem($input);
            if ($menuItem === null) {
                continue;
            }

            if(call_user_func_array($menuItem["callback"], array()))
                break;
        }
    }

}


class Program
{
    private $dictionaries;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $this->loadDictionaries();
    }

    protected function loadDictionaries()
    {
    }

    protected function unloadDictionaries()
    {

    }

    public function run()
    {

    }

    public function __destruct()
    {
        $this->unloadDictionaries();
    }
}

class Dictionary
{

}

class Vocabulary
{

}

class Program2
{
    function run()
    {
        $mainMenu  = new Menu("Vocabularies management", "Type words in [] to do actions.");
        $mainMenu->addMenuItem("Add", function() {
                echo "something\n";

        } );
        $mainMenu->addMenuItem("Quit", function() {
                return true;
        } );


        $mainMenu->listen();

    }
}


$p = new Program();
$p->run();





class Taxi {
    
    private $currentLocaltion;
    private $currentDestination;

    public function __construct()
    {
        $this->currentLocaltion = "Washington";
    }

    public function setDestination($dest)
    {
        $this->currentDestination = $dest;
    }

    /**
     * Change current location
     * 
     * @return [type] [description]
     */
    protected function changePosistion($location)
    {
        $this->currentLocaltion = $location;
    }

    /**
     * Plan how to reach the desitination, maybe need a roadmap
     * 
     */
    public function run()
    {
        /**
         * 1. go to this road
         * 2. go to that road
         * 3. go to this road
         * ...
         * finally reach the destination
         */
    }
}


$taxi = new Taxi();
$taxi->setDestination("New York");
$taxi->run();



class QAProgram {

    private $maxTimes;

    public function __construct($maxTimes = 3)
    {
        $this->setMaxTimes($maxTimes);
    }

    public function setMaxTimes($maxTimes)
    {
        $this->maxTimes = $maxTimes;
    }
    
    protected function listen()
    {
        return $heard;
    }

    protected function speak($answer)
    {
        echo $answer."\n";
    }

    public function run()
    {
        for($i=0; $i<$this->maxTimes; $i++)
        {
            $heard = $this->listen();
            if($heard = "Question - 1")
            {
                $this->speak("Answer - 1");
            }
            else if($heard = "Question - 2 ")
            {
                $this->speak("Answer - 2");
            }
            else
            {
                $this->speak("I have no idea.");
            }

        }
    }
}

$qaProgram = new QAProgram();
$qaProgram->setMaxTimes(5);
$qaProgram->run();




