<?php

#file system - part 2

$file = 'quotes.txt';

#open file for reading
// $handle = fopen($file,'r');
#r+ overwrites from the beginning of the file
#w or w+ is write only, opens and clears the contents of the file effectively overwritting its contents
#a+ appends at the end of the file
$handlewrite = fopen($file,'w+');



#write to a file

fwrite($handlewrite,"Everything already exists just fineer.");

#read file
// echo fread($handle,filesize($file)) . "<br/>";

#read a single line
echo fgets(fopen('quotes.txt','r')) . '<br>';
// echo fgets($handle) . '<br>';

#read a single character
// echo fgetc($handle);

#dont forget to close the file when done


fclose($handlewrite);

#also if you want to delete the file use unlink method

unlink($file);


?>