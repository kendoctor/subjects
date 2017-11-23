<?php

/**
 * how to deal with string
 */

//escaped characters;
echo "this is a new line character -> \n";
echo "this is a tab character -> \t";
echo "\n";
echo "this is a return character -> \r";
echo "\n";
echo "normally one line string will terminate with -> \r\n";


//string concatenation 
echo "one string"."the other\n";
$var = "injected string";
echo "put $var here.\n";


//remove white spaces both left and right sides of a string
echo trim("     no spaces at begin and end.  \n");
echo "\n";
echo ltrim("  no left spaces.");
echo "\n";
echo rtrim("no right spaces.  ");
echo "\n";


//string comparison
echo "1234" == 1234;
echo "\n";
echo "1234" === 1234;
echo "\n";
echo strcmp("abc", "Abc");
echo "\n";

//get length of string
echo strlen(" spaces are also considered as characters.");
echo "\n";
echo strlen("\n");
echo "\n";
//get word counts of a string
echo str_word_count("How many words?");
echo "\n";

//find position of the search string in the subject string
echo strpos("here", "I'm here.");
echo "\n";

//get one portion of a string, note the start posistion is 0
echo substr("Nothing go", 7);
echo "\n";

//replace all matched string of the search string with replacement string by case-sensitive rule
echo str_replace("Jack", "Rose", "Jack is 20 years old. Jack is a developer.");
echo "\n";

//replace all matched string of the search string with replacement string by case-insensitive rule
echo str_ireplace("jack", "Rose", "Jack is 20 years old. Jack is a developer.");
echo "\n";

//split string by delimiter.
echo count(explode("_", "you_are_my_friends"));
echo "\n";

//join array elements as a string
echo implode("_", array("you","are","my","friends"));
echo "\n";


//get a fromatted string
echo sprintf("%s is %s years old.\n", "Jack", 25);

//pad a string to a certain length with another string
echo str_pad("Jack", 10, "*");
echo "\n";
echo str_pad("Jack", 3, "*");
echo "\n";

//repeat a string 
echo str_repeat("*=*", 10);
echo "\n";

//make a string's first character uppercase
echo ucfirst("jack is a developer.\n");

//uppercase the first character of each word in a string
echo ucwords("hello world");
echo "\n";
echo ucwords("hello|world", "|");
echo "\n";

//make a string lowercase
echo strtolower("HELLO WORLD");
echo "\n";

//make a string uppercase
echo strtoupper("hello world");
echo "\n";


/**
 * how to deal with array
 */

//iteration for an array
$arr = [1,2,3,4];
for($i=0; $i<count($arr); $i++)
{
    echo $arr[$i];
}
echo "\n";

foreach($arr as $value)
{
    echo $value;
}
echo "\n";

foreach($arr as $key => $value)
{
    echo $key.":".$value;
}
echo "\n";


//filters values of an array using a callback function
$arr = array_filter(
    ["red", "bed", "rip", "led", "zed"],
    function($v, $k){
        return substr($v, 1) == "ed";
    },
    ARRAY_FILTER_USE_BOTH
);
print_r($arr);


//exchanges all keys with their associated values in an array
$arr = array_flip(["red", "blue", "green"]);
print_r($arr);


$arr = [
    "first" => null,
    "second" => "yes"
];
//if the element value is null will be considered as nothing
echo isset($arr["first"]);
echo "\n";
//check if the given key or index exists in the array
echo array_key_exists("first", $arr);
echo "\n";

//return all the keys or a subset of the keys of an array
$arr = [
    "name" => "jack",
    "sex" => "male",
];
print_r(array_keys($arr));

//return all the values of an array
print_r(array_values($arr));


//apply the callback to the elements of the given array
$arr = [1, 2, 3, 4];
print_r(array_map(
    function($v) {
        return $v*$v;
    },
    $arr
));


//merge two or more arrays
$arr1 = [
    "name" => "jack",
    "age" => 22
];

$arr2 = [
    "name" => "rose",
    "weight" => 54
];
print_r(array_merge($arr1, $arr2));


//pop the element off the end of an array
$arr = [1,2,3,4];
echo array_pop($arr);
print_r($arr);
echo "\n";

//push one or more elements onto the end of an array
$arr = [1,2,3,4];
print_r(array_push($arr, 5));
print_r(array_push($arr, 6, 7));
$arr[] = 8;
print_r($arr);

//shift the element off the beginning of an array
$arr = [1,2,3,4];
echo array_shift($arr);
print_r($arr);
echo "\n";

//prepend one or more elements to the beginning of an array
$arr = [1,2,3,4];
array_unshift($arr, 0, -1);
print_r($arr);


//remove duplicate values from an array
$arr = [1,2,3,2,1];
print_r(array_unique($arr));

//apply a user supplied function to every element of an array
$arr = [
    "name" => "jack",
    "age" => 12
];
array_walk($arr, function(&$value, $key) {
    $value = $key.":".$value;
});
print_r($arr);


//create an array containing variables and their values
$name = "jack";
$age = 22;
print_r(compact("name", "age"));

//import varaibles into current scope from an array
$arr = [
    "city" => "New York",
    "country" => "USA"
];
extract($arr);
echo $city.":".$country;
echo "\n";

//assign variables with the value from an array by order
$arr = [ "red", 123, "male"];
list($color, $age, $sex) = $arr;
echo sprintf("%s:%s:%s", $color, $age, $sex);
echo "\n";


//check if a value exists in an array
$arr = [1,3,4,5];
echo in_array(1, $arr);
echo "\n";


//sort an array
$arr = [ 3, "3", "001", "a", "b1", "ab"];
sort($arr);
print_r($arr);

//sort an array and maintain index association, arsort for in reversed order
$arr = [ 3, "3", "001", "a", "b1", "ab"];
asort($arr);
print_r($arr);

//sort an array by key
$arr = [
    "mike" => "teacher",
    "jack" => "developer",
    "rose" => "nurse"
];
ksort($arr);
print_r($arr);



/**
 * How about `Operators`
 */


    