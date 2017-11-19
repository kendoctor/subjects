<?php

define("storage_filename", __DIR__ . "/dict.dat");


/**
 * Get submitted data
 *
 * @return array
 */
function get_submitted_data()
{
    $data = [];
    //Get submitted form data
    $data["headword"] = isset($_POST["headword"]) ? trim($_POST["headword"]) : "";
    $data["explanation"] = isset($_POST["explanation"]) ? trim($_POST["explanation"]) : "";

    return $data;
}

/**
 * Validate form data
 *
 * @param $data
 * @return array
 */
function validate($data)
{
    $result = [
        "errors" => [],
        "data" => $data
    ];

    $t = $result["data"]["headword"];
    if(empty($t))
    {
        $result["errors"]["headword"] = "Headword should not be empty.";
    }


    $t = $result["data"]["explanation"];
    if (empty($t)) {
        $result["errors"]["explanation"] = "Explanation should not be empty.";
    }


    return $result;
}

/**
 * Add vocabulary to the dictionary
 *
 * @param $data
 */
function add_vocabulary($data)
{
    $dict = load_dictionary();
    $dict[$data["headword"]] = $data;
    save_dictionary($dict);
}

/**
 * Update vocabulary to the dictionary
 * todo: if headword changed, it's possible there's the same headword in the dictionary. We can say, headword is unique, then can not replace the old one
 *
 * @param $headword
 * @param $data
 * @param null $dict
 */
function save_vocabulary($headword, $data, $dict = null)
{
    if(!$dict)
        $dict = load_dictionary();
    unset($dict[$headword]);

    $dict[$data["headword"]] = $data;

    save_dictionary($dict);
}

/**
 * Delete vocabulary from the dictionary
 *
 * @param $data
 * @param null $dict
 */
function delete_vocabulary($data, $dict = null)
{

    if(!$dict)
        $dict = load_dictionary();

    unset($dict[$data["headword"]]);

    save_dictionary($dict);
}
/**
 * Find vocabulary by headword
 *
 * @param $headword
 * @param null $dict
 * @return null
 */
function find_vocabulary_by_headword($headword, $dict = null)
{
    if($dict === null)
        $dict = load_dictionary();

    return isset($dict[$headword]) ? $dict[$headword] : null;
}

/**
 * Load dictionary from storage
 */
function load_dictionary()
{
    $dict = [];


    if (!file_exists(storage_filename)) {
        return $dict;
    }

    $handle = fopen(storage_filename, "r");
    while ($line = trim(fgets($handle))) {
        if (preg_match("/^([^=]+)=(.+)/", $line, $matches)) {
            $dict[$matches[1]] = [
                "headword" => $matches[1],
                "explanation" => $matches[2]
            ];
        }
    }

    fclose($handle);

    return $dict;
}

/**
 * Update dictionary to storage
 *
 * @param $dict
 */
function save_dictionary($dict)
{
    $handle = fopen(storage_filename, "w");

    ksort($dict);

    foreach ($dict as $vocabulary) {
        fputs($handle, sprintf("%s=%s\r\n", $vocabulary["headword"], $vocabulary["explanation"]));
    }

    fclose($handle);
}



/**
 * Redirect to the specific address
 *
 * @param $url
 */
function redirectTo($url)
{
    header("location:$url");
    exit;
}


function fetch_notifications()
{
    session_start();
    $data = [];

    foreach($_SESSION as $key => $notification)
    {
        if(preg_match("/^notifications_(.+)/", $key, $matches))
        {
            $data[$matches[1]] = $notification;
            unset($_SESSION[$key]);
        }
    }

    return $data;
}

function add_notification($key, $value)
{
    session_start();

    $_SESSION["notifications_$key"] = $value;
}