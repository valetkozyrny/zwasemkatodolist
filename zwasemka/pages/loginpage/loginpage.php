<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

/*echo "<h2> 2222 </h2>";
$numbers = [1,3,3];
$colors = ['red','green','blue'];
var_dump($colors);


$num = 214;
if (is_int($num)) {
    echo "123";
}
*/
$datum = "18.12.2003";
list($den,$mesic,$rok) = explode(".",$datum);
list($den, $mesic, $rok) = explode(".", $datum);
$timestamp = mktime(0, 0, 0, $mesic, $den, $rok);

echo $timestamp;

function getdatum($datum)
{
    list($den,$mesic,$rok) = explode(".",$datum);

}


?>
</body>
</html>
