<?php
session_start();

require_once('connection.php');

$query = "SELECT * FROM emails";
$emails = fetch_all($query);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Success Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id='container'>

            <div id='success'>
                <p>The email address you entered (<?=$_SESSION['email']?>) is a VALID email address! Thank you!</p>
            </div>
            <table>
                <h2>Email Addresses Entered</h2>
    <?php
                foreach($emails as $email)
                {  ?>
                <tr>
                    <td><?= $email["email"] ?></td>
                    <td><?= $email["created_at"] ?></td>
                    <td>
                        <form action="process.php" method="post">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?= $email["id"] ?>">
                            <input id="delete" type="submit" class="delete" value="delete">
                        </form>
                    </td>
                </tr>
    <?php
                }  ?>
            </table>
        </div>
    </body>
</html>
