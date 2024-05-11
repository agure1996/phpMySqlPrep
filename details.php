<?php
include('./config/db_connect.php');

//check for the GET request id parameter
#ill place the get request in a value
$getId = $_GET['id'];

if (isset($getId)) :

    $id = mysqli_real_escape_string($dbconn, $getId);


    #Make the query to the sql for the individual record
    #1 - prepare the query statment
    $query = "SELECT * FROM pizza WHERE id = $id";

    #2 - pass the query statement and record the query result to a value
    $result = mysqli_query($dbconn, $query);

    #3 - format the result into assoc array format
    $pizza = mysqli_fetch_assoc($result);


    #free the result, to free up memory and close connection
    mysqli_free_result($result);
    mysqli_close($dbconn);
#print the values ( was used for testing )
// print_r($pizza);

endif;

?>

<!DOCTYPE html>
<html>

<?php include('header.php'); ?>

       <!-- Delete Form -->

       <?php

#check if delete button is clicked

if (isset($_POST['delete'])) :



    $id_to_delete = mysqli_real_escape_string($dbconn, $_POST['id_to_delete']);

    $deletion_query = "DELETE  FROM pizza WHERE id = $id_to_delete";

    $deletion_result = mysqli_query($dbconn, $deletion_query);

    if (!$deletion_query) :echo 'Query Error: ' . mysqli_error($dbconn); 
        

    else : header('Location: index.php');
    endif;

endif;

?>

<div class="container center grey-text">
    <?php if ($pizza) : ?>

        <h4><?php echo htmlspecialchars($pizza['title']) ?></h4>
        <p>Created by <?php echo htmlspecialchars($pizza['email']) ?></p>
        <p>Date Created: <?php echo date($pizza['created_at']) ?></p>
        <h5>Ingredients:</h5>
        <p><?php echo htmlspecialchars($pizza['ingredients']) ?></p>

     

        <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
        </form>
    <?php else : ?>
        <div class="container center">
            <h5> This Pizza does not exist with us anymore :(</h5>
        </div>
    <?php endif; ?>

</div>


<?php include('footer.php'); ?>

</html>