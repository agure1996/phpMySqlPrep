<?php
include('./config/db_connect.php');


#setting the empty fields first upon window loading
$email = $title = $ingredients = '';
$errors = array('email' => '', 'title' => '', 'ingredients' => '');

if (isset($_POST['submit'])) {
    #No email input
    if (empty($_POST['email'])) {
        $errors['email'] = "No email provided <br>";
    } else {
        $email = htmlspecialchars($_POST['email']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Please provide a valid email address <br>";
    }
    #No title input
    if (empty($_POST['title'])) {
        $errors['title'] = "Pizza has no title <br>";
    } else {
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) $errors['title'] = 'Title must be letters and spaces only';
    }
    #No ingredients input
    if (empty($_POST['ingredients'])) { {
            $errors['ingredients'] = "At least one ingredient is required <br>";
        }
    } else {
        $ingredients = $_POST['ingredients'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['ingredients'] = "Ingredients must be letters and spaces only, must be a comma seperated list";
        }
    }   

    #Effectively we want to see if there are no errors, as we designed the error array values to be empty, if the array filters through the error array and finds its value for its K-V pairs '' still? then that means there was no error
    if (array_filter($errors)) {
        #echo 'There are errors in the Form';
    } else {

        #to prevent malicious content being put into

        $email = mysqli_real_escape_string($dbconn,$_POST['email']);
        $title = mysqli_real_escape_string($dbconn, $_POST['title']);
        $ingredients = mysqli_real_escape_string($dbconn, $_POST['ingredients']);

        #create sql
        $sql = "INSERT INTO `pizza`(`title`,`email`,`ingredients`) VALUES ('$title','$email','$ingredients')";

        #save to database and then check
        if (!mysqli_query($dbconn, $sql)) : echo 'Query Error : ' . mysqli_error($dbconn);
        #redirect to the index
        else : header('Location: index.php');
        endif;
    }
} #End of POST check
?>

<!DOCTYPE html>
<html>

<?php include('header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Add Pizza</h4>
    <!-- Instead of metioning the php filename in action we decide to use a php superglobal that is associated with the filename itself -->
    <form action="<?php $_SERVER['PHP_SELF']?>" class="white" method="POST">
        <label>Email</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"><?php echo $errors['email'] ?></div>

        <label>Pizza Title</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
        <div class="red-text"><?php echo $errors['title'] ?></div>

        <label>Ingredients (Comma Seperated Please):</label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
        <div class="red-text"><?php echo $errors['ingredients'] ?></div>

        <div class="center">
            <input type="submit" value="submit" name="submit" class="btn brand z-depth-0" />
        </div>

    </form>
</section>

<?php include('footer.php'); ?>

</html>