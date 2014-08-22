<?php
session_start();

require_once("connection.php");
if (isset($_POST['action']) && $_POST['action'] == 'add')
{
    $_SESSION['email'] = $_POST['email'];

    if(!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL))
    {
        $_SESSION['error'] = 'email error';
        header('Location: index.php');
    }
    else
    {
        $sql = "INSERT INTO emails (email, created_at, updated_at) VALUES('".$_POST['email']."', NOW(), NOW())";
        run_mysql_query($sql);
        header('Location: success.php');
    }
}
elseif (isset($_POST['action']) && $_POST['action'] == 'delete')
{
    $sql = "DELETE FROM emails WHERE id = " . $_POST['id'];
    run_mysql_query($sql);
    header('Location: success.php');
}

  // ----end of file
