<?php

class A {
    public $closure;

    function __construct($val) {
        $this->val = $val;
    }

    function getClosure() {
        //returns closure bound to this object and scope
        return $this->closure;
    }
}

//$ob1 = new A(1);
$ob2 = new A(2);
$ob2->closure = function() { return $this->val; };

$cl = $ob2->getClosure();
//echo $cl(), "\n";
$cl = $cl->bindTo($ob2);
var_dump($cl);

//echo $cl(), "\n";
?>
