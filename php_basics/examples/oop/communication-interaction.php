<?php

class Phone {

    const PHONE_STATUS_IDLE = "idle";
    const PHONE_STATUS_CONNECTED = "connected";
    const PHONE_STATUS_DIALING = "dialing";
    const PHONE_STATUS_ONCALL = "oncall";
    const PHONE_STATUS_DISCONNECTED = "disconnected";

    private $telcom;
    private $phoneNumber;
    private $status;
    private $sessionId;


    //Event callback
    public $onCall;
    public $onRecieveVoice;
    public $onAnswered;

    public function __construct()
    {
        $this->status = self::PHONE_STATUS_IDLE; 
    }

    public function getSessionId()
    {
        return $this->sessionId;
    }

    public function setSessionId($sessionId)
    {
        return $this->sessionId = $sessionId;
    }
    
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }    
    
    public function setTelcom($telcom)
    {
        $this->telcom = $telcom;           
    }    
    
    public function dial($phoneNumber, $onAnswered = null)
    {
        if($this->status === self::PHONE_STATUS_IDLE)
        {
            $this->onAnswered = $onAnswered;            
            $this->telcom->connect($this, $phoneNumber);             
        }
    }

    public function hangup()
    {
        if($this->status === self::PHONE_STATUS_CONNECTED)
        {
            $this->telcom->disconnected($this);            
        }
        else if($this->status === self::PHONE_STATUS_DISCONNECTED)
        {
            $this->status = self::IDLE;
        }
    }

    public function acceptCall()
    {
        if($this->status === self::PHONE_STATUS_ONCALL)
        {
             $this->telcom->acceptCall($this);
        }
    }
    
    public function sendVoice($voice)
    {
        if($this->status === self::PHONE_STATUS_CONNECTED)
        {
            $this->telcom->sendVoice($this, $voice);
        }
    }
    
   
    
}

class Telcom {

    private $registeredPhones;
    private $sessons;

    public function __construct()
    {
        $this->registeredPhones = [];
        $this->sessions = [];
    }

    /**
     * A phone should be registered and get a phone number before it works at Telcom.
     * 
     * @param  Phone  $phone       [description]
     * @param  [type] $phoneNumber [description]
     * @return [type]              [description]
     */
    public function registerPhone(Phone $phone, $phoneNumber)
    {
        //Phone number is unique, so if others has already registered, you will fail.
        if(isset($this->registeredPhones[$phoneNumber]))
        {
            throw new Exception(sprinft("Phone number %s already exists."));
        }

        $phone->setTelcom($this);

        $this->registeredPhones[$phoneNumber] = $phone;
        $phone->setPhoneNumber($phoneNumber);        
    }

    protected function getPhoneByNumber($phoneNumber)
    {
        if(isset($this->registeredPhones[$phoneNumber]))
            return $this->registeredPhones[$phoneNumber];

        return null;
    }

    public function connect($dialPhone, $phoneNumberToDial)
    {
        $phoneToDial = $this->getPhoneByNumber($phoneNumberToDial);
        
        if($phoneToDial && $phoneToDial->getStatus() === Phone::PHONE_STATUS_IDLE)
        {
            $dialPhone->setStatus(Phone::PHONE_STATUS_DIALING); 
            $phoneToDial->setStatus(Phone::PHONE_STATUS_ONCALL);

            //new sesson for this connection
            $session = [
                "dialPhone" => $dialPhone,
                "phoneToDial" => $phoneToDial
            ];

            $sessionId = md5($dialPhone->getPhoneNumber().$phoneToDial->getPhoneNumber());
            $this->sessions[$sessionId] = $session;

            $dialPhone->setSessionId($sessionId);
            $phoneToDial->setSessionId($sessionId);
            
            if($phoneToDial->onCall){
                $callback = $phoneToDial->onCall;
                $callback($phoneToDial, $dialPhone);
            }

            //$callback->bindTo($phoneToDial, $phoneToDial);
            

            
        }
    }


    public function acceptCall($accpetedPhone)
    {
        $sessionId = $accpetedPhone->getSessionId();

        if(isset($this->sessions[$sessionId]))
        {
            $session = $this->sessions[$sessionId];
            $session["dialPhone"]->setStatus(Phone::PHONE_STATUS_CONNECTED);
            $session["phoneToDial"]->setStatus(Phone::PHONE_STATUS_CONNECTED);

            if($session["dialPhone"]->onAnswered)
            {               
                $callback = $session["dialPhone"]->onAnswered;                
                $callback($session["dialPhone"], $accpetedPhone);
            }
        }
    }   

    public function sendVoice($phone, $voice)
    {
         echo $voice."\n";

        $sessionId = $phone->getSessionId();


        if(isset($this->sessions[$sessionId]))
        {
            $session = $this->sessions[$sessionId];
            $phoneToSend = $session["dialPhone"] === $phone ? $session["phoneToDial"]  : $session["dialPhone"] ;
            
            if($phoneToSend->onRecieveVoice)
            {
                $callback = $phoneToSend->onRecieveVoice;
                $callback($voice, $phoneToSend, $phone);
            }
        }
    }   
    
}

$telcom = new Telcom();

$myPhone = new Phone();
$yourPhone = new Phone();

$telcom->registerPhone($myPhone, "8888");
$telcom->registerPhone($yourPhone, "9999");


$myPhone->onRecieveVoice = function($voice, $phone, $couterpartPhone) {

    //After Jack has answered, I need say something to him
    if($voice === "Yes, I'm Jack, Who are you?")
        $phone->sendVoice("I'm ken. How do you do?");
};

$yourPhone->onCall= function($phone, $couterpartPhone) {

    if($couterpartPhone->getPhoneNumber() === "8888")
    {    
        $phone->acceptCall();
    }
};

$yourPhone->onRecieveVoice = function($voice, $phone, $couterpartPhone) {

    //Say something to the counterpart 
    if($voice === "Is this Jack?")
        $phone->sendVoice("Yes, I'm Jack, Who are you?");
};



$myPhone->dial("9999", function($phone, $couterpartPhone){    
    //when the couterpart accepts the call
    $phone->sendVoice("Is this Jack?");
});
















