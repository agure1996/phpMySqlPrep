<?php

if (isset($_POST['submit'])) :


    #setting cookies, cookies arent part of sessions so we can instantiate it here before the session start() is invoked

    //set cookie for gender
    setcookie('gender',$_POST['gender'],time() + (846400/5));
    session_start();

    #store name value in session variable also called name
    $_SESSION['name'] = $_POST['name'];

    // echo $_SESSION['name'];

    header('location: index.php');

endif;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tut</title>
</head>

<body>
    <!-- have the action occur on the current page -->
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="text" name="name">
        <select name="gender" >
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>