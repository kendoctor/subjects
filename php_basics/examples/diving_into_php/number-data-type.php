<?php

/**
 * A number is a quantity or amount and holds an arithmetical value.

 * 1. Numbers are devided into categories, integer and float(double, real numbers)
 * 2. The size of a number depends on the system. 
 * 3. A number has its limit because the size is limited.
 * 4. A number can be represented in decimal, hexadecimal, otcal or binary form.
 * 5. A number maybe be negative or positive. 
 * 6. A number can be NaN. This value presents an undefined or unpresentable value in floating-point calculations.
 */


    $age = 22;
    echo gettype($age);
    echo "\n";

    $width = 10;
    $height = 20;

    $area = $width * $height;

    //Use string to present the unit of a number
    $myMoney = 1000.12;
    echo "I have $myMoney$\n";
    echo gettype($myMoney);
    echo "\n";

    //scientific presentation
    $highPrecision = 1.3e-4;
    echo $highPrecision;
    echo "\n";

    echo 1.3e2 === 1.3 * 10**2;
    echo "\n";

    $negative = -10;
    $zero = 0;
    $positive = 10;

    //UNIT is byte
    echo PHP_INT_SIZE;
    echo "\n";

    echo PHP_INT_MAX;
    echo "\n";
    echo PHP_INT_MIN;
    echo "\n";


    $decimal = 100;
    $octal = 010;
    $hexa = 0xFF;
    $binary = 0b10;

    echo sprintf("d:%s, o:%s, h:%s, b:%s\n", $decimal, $octal, $hexa, $binary);

    echo gettype(NAN);
    echo "\n";

    echo is_numeric(1.0e3);
    echo "\n";

    //if a string holds a valid number
    echo is_numeric("10.10");
    echo "\n";

    //Arithmatic expressions
    $addition = 1+1;
    $subtraction = 1-1;
    $multiplication = 2*2;
    $devision = 4/2;
    $modulo = 10%3;
    $exponentiation = 2**8;

    //increment the value by 1
    $increment = 1;
    $increment++;

    //decrement the value by 1
    $decrement = 0;
    $decrement--;




