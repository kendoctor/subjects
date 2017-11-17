<?php
/*
 * 1. User click `Edit` link which the vocabulary want to be modified on list page.
 * 2. Server Display form for editing
 *      * Get vocabulary by headword
 * 3. User input vocabulary data and click submit
 * 4. Server Get data, validate data, save vocabulary
 *      * If succeed, continue to list page
 *      * If failed, continue to step 2 and show failure tips
 */


require_once("func.php");


if(!isset($_GET["hw"]))
{
    header("HTTP/1.0 404 Not Found");
    echo "Page not found.";
    exit;
}

$headword = trim($_GET["hw"]);

$dict = load_dictionary();

$data = find_vocabulary_by_headword($headword);

if($data === null)
{
    header("HTTP/1.0 404 Not Found");
    echo "Vocabulary not found";
    exit;
}

//determine if the request is a `POST` method, it means the user submitted the form
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    //Get submitted form data
    $data = get_submitted_data();

    $result = validate($data);

    if(count($result["errors"]) === 0)
    {
        //if validation is passed, do storage stuff
        save_vocabulary($headword, $result["data"], $dict);

        add_notification("update_vocabulary", "Vocabulary $headword successfully updated.");

        redirectTo("index.php");
    }
}

?>

<html>
<head>
    <title>My dictionary - update vocabulary : <?php echo $data["headword"]; ?></title>
    <style>
        .form-control { padding: .5em; }
        .form-control .error {
            margin: .25em 0;
            padding: .5em; font-size: 75%;
            background: lightgrey;
        }
    </style>
</head>
<body>
<h2>Update vocabulary : <?php echo $data["headword"]; ?></h2>
<form action="update.php?hw=<?php echo htmlspecialchars($headword); ?>" method="POST">
    <div class="form-control">
        <label for="headword">Headword</label>
        <input id="headword" type="text" name="headword" value="<?php echo htmlspecialchars($data["headword"]); ?>"/>
        <?php if($result && isset($result["errors"]["headword"])) :?>
            <div class="error">
                <?php echo $result["errors"]["headword"]; ?>
            </div>
        <?php endif; ?>
    </div>
    </ul>
    <div class="form-control">
        <label for="explanation">Explanation</label>
        <input id="explanation" type="text" name="explanation" value="<?php echo htmlspecialchars($data["explanation"]); ?>"/>
        <?php if($result && isset($result["errors"]["explanation"])) :?>
            <div class="error">
                <?php echo $result["errors"]["explanation"]; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-control">
        <input type="submit" value="Submit"/>
    </div>
</form>

<div>
    <a href="index.php">Return list page</a>
</div>
</body>
</html>