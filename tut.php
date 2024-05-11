<?php


#$stringOne = "My Name is";
#$stringTwo = "Abbaaas";
#echo "hey my name is $stringTwo ".$stringOne;

#$len = strlen($stringOne);

#echo "$len";

$blogs = [
    ['Author' => 'Geele', 'Book' => 'Geeljire', 'Pages' => 284, 'Likes' => 124123],
    ['Author' => 'Abdii', 'Book' => 'Ducaale', 'Pages' => 211, 'Likes' => 1231223]
];

echo 'For Loop <br>';
for ($i = 0; $i < count($blogs); $i++) {
    print_r('Book Author : ');
    print_r($blogs[$i]['Author']. '<br />');
}

echo '<br />';
echo 'For each Statement <br>';
foreach($blogs as $blog) {echo '{ ' . $blog['Author'] . ' - ' . $blog['Book'] . ' - ' . $blog['Pages'] . ' - ' . $blog['Likes'] . ' }<br/>' ;}

echo '<br />';
echo "Testing While Loop <br />";
$i = 0;
while ($i < count($blogs)) {
    echo '{ ' . $blogs[$i]['Author'] . ' - ' . $blogs[$i]['Book'] . ' - ' . $blogs[$i]['Pages'] . ' - ' . $blogs[$i]['Likes'] . ' }<br/>';
    $i++;
}

// echo count($blogs);

#to add to the array

$blogs[] = ['Author' => 'Gaal', 'Book' => 'Gaaljecle', 'Pages' => 12312, 'Likes' => 12];
echo '<br>';
// print_r($blogs);

// echo "<br> testing some question <br>";
// $x = 5;
// echo $x;
// echo "<br />";
// echo $x+++$x++;
// echo "<br />";
// echo $x;
// echo "<br />";
// echo $x---$x--;
// echo "<br />";
// echo $x;
$q = 'question';
$test = function(&$q){
echo "Testing $q";
};
$j='kool';
$test($j);