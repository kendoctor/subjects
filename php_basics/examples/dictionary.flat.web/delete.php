<?php

/*
 * 1. User click `Delete` link which the vocabulary want to be removed on list page.
 * 2. Server Display the vocabulary to confirm the delete.
 * 3. User click the `Confirm`
 * 4. Server Delete the vocabulary and redirect to list page.
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


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    delete_vocabulary($data, $dict);

    add_notification("delete_vocabulary", "Vocabulary $headword successfully deleted.");

    redirectTo("index.php");
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
<h2>Confirmation for delete vocabulary : <?php echo $data["headword"]; ?></h2>
<form action="delete.php?hw=<?php echo htmlspecialchars($headword); ?>" method="POST">
    <h3><?php echo htmlspecialchars($data["headword"]); ?></h3>
    <p><?php echo htmlspecialchars($data["explanation"]); ?></p>
    <div class="form-control">
        <input type="submit" value="Submit"/>
    </div>
</form>

<div>
    <a href="index.php">Return list page</a>
</div>
</body>
</html>