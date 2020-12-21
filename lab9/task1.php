<?php
$arr = [1,2,3,4,5];
function Mean($arr) #Mean and average are same
{
   $avg = array_sum($arr)/count($arr);  #sizeof alias of count
   return $avg;
}
function Median($arr)
{
   sort($arr);
   $n = count($arr);
   if($n % 2 != 0)
    return (float)$arr[$n / 2];
   return (double)($arr[$n - 1] / 2 + $arr[$n - 2] / 2);
}
echo "<h2>Question#1</h2><br/>Mean or Average = ".Mean($arr)."<br/> Median = ".Median($arr)."<br/>";
function CheckingNumber($num)
{
    if($num > 0){
        echo "Your enter value is positive";
    } else if($num < 0){
        echo "Your enter value is negative";
    } else if($num % 2 == 0){
        echo "Your enter value is 0";
    } else {
        echo "Please enter number";
    }
}
echo "<h2>Question#2</h2><br/>";
CheckingNumber($num = 5);
function Factorial($val)    //using Recursion
{
   if($val == 0)
    return 1;
   return $val * Factorial($val - 1);
}
echo "<h2>Question#3</h2><br/>Factorial of 4 is ".Factorial(4);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task1</title>
    <style>
    html,body {
        font-size: 24px;
        text-align: center;
        height: 100vh;
    }
    </style>
</head>
<body>
    
</body>
</html>