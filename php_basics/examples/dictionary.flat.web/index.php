<?php
/*
 * 1. User opens the list page
 * 2. Server get all vocabularies for display
 *      * load dictionary from storage file
 *      * use repeating statement to output the list
 */

require_once("func.php");

$vocabularies = load_dictionary();


?>

<html>
    <head>
        <title>My dictionary - List all vocabularies</title>
    </head>
    <body>
        <h2>List all vocabularies</h2>
        <?php if(count($notifications = fetch_notifications())) :?>
            <ul>
                <?php foreach($notifications as $notification) :?>
                    <li><?php echo $notification; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <ul class="vocabularies">
            <?php foreach($vocabularies as $vocabulary) :?>
            <li class="vocabulary">
                <h3>
                    <a href="update.php?hw=<?php echo htmlspecialchars($vocabulary["headword"]); ?>">Edit</a>
                    <a href="delete.php?hw=<?php echo htmlspecialchars($vocabulary["headword"]); ?>">Delete</a>
                    <?php echo htmlspecialchars($vocabulary["headword"]); ?></h3>
                <p><?php echo htmlspecialchars($vocabulary["explanation"]); ?></p>
            </li>
            <?php endforeach; ?>
        </ul>
        <div>
            <a href="create.php">Add a vocabulary</a>
        </div>
    </body>
</html>