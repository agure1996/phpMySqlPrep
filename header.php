<?php

session_start();
if ($_SERVER['QUERY_STRING'] == 'noname') :
    unset($_SESSION['name']);
endif;

$name = $_SESSION['name'] ?? 'Guest';

//get cookie

$gender = $_COOKIE['gender'] ?? 'Unknown';
?>

<head>

    <title>Gure Pizza</title>
    <!-- Materialise css     -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body class="yellow lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">Pizza Delivery</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="grey-text"> Welcome <?php echo htmlspecialchars($name); ?></li>
                
                <li class="grey-text"> (<?php echo  htmlspecialchars($gender);?>)</li>
                <li><a href="add.php" class="btn brand  z-depth-0">Add Pizza</a></li>
            </ul>
        </div>
    </nav>