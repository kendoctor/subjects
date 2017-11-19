<?php
/*
 * 1. User click `Add a vocabulary` at the list page
 * 2. Server Display form for collect vocabulary data
 * 3. User input vocabulary data and click submit
 * 4. Server Get data, validate data, save vocabulary
 *      * If succeed, continue to step 2
 *      * If failed, continue to step 1 and show failure tips
 */


require_once("func.php");


//determine if the request is a `POST` method, it means the user submitted the form
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    //Get submitted form data
    $data = get_submitted_data();

    $result = validate($data);

    if(count($result["errors"]) === 0)
    {
        //if validation is passed, do storage stuff
        add_vocabulary($result["data"]);

        add_notification("add_vocabulary", "Vocabulary successfully added.");

        //todo: save successful added info and show in the redirect page.
        redirectTo("create.php");
    }
}




?>

<html>
<head>
    <title>My dictionary - Add a vocabulary</title>
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
<h2>Add a vocabulary.</h2>
<?php if(count($notifications = fetch_notifications())) :?>
    <ul>
        <?php foreach($notifications as $notification) :?>
            <li><?php echo $notification; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<form action="create.php" method="POST">
    <div class="form-control">
        <label for="headword">Headword</label>
        <input id="headword" type="text" name="headword"/>
        <?php if($result && isset($result["errors"]["headword"])) :?>
        <div class="error">
            <?php echo $result["errors"]["headword"]; ?>
        </div>
        <?php endif; ?>
    </div>
    </ul>
    <div class="form-control">
        <label for="explanation">Explanation</label>
        <input id="explanation" type="text" name="explanation"/>
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