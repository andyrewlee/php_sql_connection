<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <div id='container'>
<?php
    if(isset($_SESSION['error']))
{ ?>
        <div id='error'>
            <p>The email address you entered (<?=$_SESSION['email']?>) is NOT a valid email address!</p>
        </div>
<?php } ?>

        <h1>Please enter your email address:</h1>
        <form action='process.php' method='post'>
            <input type='hidden' name="action" value='add'>
            <input type='text' name='email' placeholder='email address'>
            <input type='submit' value='Submit'>
        </form>

    </div>
</body>
</html>
