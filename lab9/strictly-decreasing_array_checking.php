<?php

function checkArr($arr, $n)
{
    //modify is behave like counter
    $modify = 0;
    //check whether last element need to be modify
    if ($arr[$n - 1] >= $arr[$n - 2]) {
        $arr[$n - 1] = $arr[$n -2];
        $modify++;
    }

    //check whether first element need to be modify
    if ($arr[0] <= $arr[1]) {
        $arr[0] = $arr[1];
        $modify++;
    }

    // check from 2nd element to the 2nd last element 
    for ($i = $n - 2; $i > 0; $i--) {
        if (($arr[$i - 1] <= $arr[$i] && $arr[$i + 1] <= $arr[$i]) || ($arr[$i - 1] >= $arr[$i] && $arr[$i + 1] >= $arr[$i])) {

            //modifyinf arr[i]
            $arr[$i] = ($arr[$i - 1] + $arr[$i + 1]) / 2;
            $modify++;

            if($arr[$i] == $arr[$i - 1] || $arr[$i] == $arr[$i + 1])
                return false;
        }
    }

    //If more  than 1 modification required
    if($modify > 1){
        return false;
    }
    return true;
}

$arr = array(12,9,10,5,4);
$n = sizeof($arr);
if(checkArr($arr,$n)){
    echo "Yes";
} else {
    echo "No";
}
