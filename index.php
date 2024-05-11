<?php

include('config/db_connect.php');

#Write query to store all pizza

// $sqlStatement = 'SELECT id, title, ingredients FROM pizza';

$sqlStatement = 'SELECT id, title, ingredients FROM pizza ORDER BY created_at';

#make the query to the database and store the result

$resultOfQuery = mysqli_query($dbconn, $sqlStatement);

#method for displaying the result in associative array format

$pizzaList = mysqli_fetch_all($resultOfQuery, MYSQLI_ASSOC);

#free the result variable from memory, save memory (good practise)

mysqli_free_result($resultOfQuery);

#then close the connection to the database
mysqli_close($dbconn);

#print value
// print_r($pizzaList);

#explode is a function used to seperate csv values into an array. it takes the splitter val (e.g. ',') as one of its arguments
// foreach($pizzaList as $pizza) print_r(explode(',',$pizza['ingredients']));

?>

<!DOCTYPE html>
<html>

<?php include('header.php'); ?>


<h4 class="center brown-text">Pizzas</h4>

<div class="container">
    <div class="row">
        <!-- opening { braces replaced by colon and end of curly brace below replaced with endforeach} -->
        <?php foreach ($pizzaList as $pizza) : ?>

            <div class="col s6 md3 ">
                <div class="card z-depth-1">
                    <div class="card-content center">
                        <img src="./img/image.png" class="pizza">
                        <h6><?php echo htmlspecialchars($pizza['title']) ?></h6>
                        <ul>
                            <?php foreach (explode(',', $pizza['ingredients']) as $ing) : ?>
                                <li><?php echo htmlspecialchars($ing);  ?>

                                </li>
                            <?php endforeach  ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a href="details.php?id=<?php echo $pizza['id']?>" class="brand-text">More Info</a>
                    </div>


                </div>
            </div>
        <?php endforeach; ?>

        <!-- <?php if (count($pizzaList) >= 2) : ?>
            <p>There are 2 or more pizzas</p>
        <?php else : ?>
            <p>There are less than 3 pizzas</p>
        <?php endif; ?> -->
    </div>
</div>

<?php include('footer.php'); ?>

</html>