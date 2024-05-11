<?php

#file system tutorial - part 1
#quote style - when done like this it display the number of bits in the txt file at the end of the file read
// $quotes = readfile('readme.txt');
// echo $quotes;

#better style to check if file exists using built in php functions

$file = 'file.txt';
if (!file_exists($file)) :
    echo 'file does not exist' . '<br/>';

    else :
        // #read the file  
        // // echo readfile($file);

        // #we can even copy the file, even if file doesnt exist it will create file in the name provided which in ours is 'quotes.txt'
        // copy($file,$quotes = 'quotes.txt');        
        // echo readfile($quotes) . '<br/>' ;


        // #get real path
        // echo realpath($quotes) . '<br/>';

        // #file size
        // echo filesize($quotes) . '<br/>';

        // #can even rename file - once you run the page it should rename the file in the folder
        // rename($file, 'file.txt');

        #make new directory
        // mkdir($quote_folder = 'quote_directory');

        // echo readdir('quote_directory');
endif;
?>
