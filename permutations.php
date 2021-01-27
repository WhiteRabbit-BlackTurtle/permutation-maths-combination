<?php

function swap($str, $index1, $index2)
{
    $charArray = str_split($str);
    $temp = $charArray[$index1];
    $charArray[$index1] = $charArray[$index2];
    $charArray[$index2] = $temp;
    return implode($charArray);
}

function shouldSwap($str, $start, $curr)
{
    for ($i = $start; $i < $curr; $i++)
        if ($str[$i] == $str[$curr])
            return false;
    return true;
}

//index = start index, n = string length 
function findPermutations($str,  $index,  $n, &$permutations)
{
    if ($index >= $n) {
        array_push($permutations, $str);
    }

    for ($i = $index; $i < $n; $i++) {

        // Proceed further for $str[i] only if it 
        // doesn't match with any of the characters
        // after $str[$index]
        $check = shouldSwap($str, $index, $i);
        if ($check) {
            $str = swap($str, $index, $i);
            findPermutations($str, $index + 1, $n, $permutations);
        }
    }
}

function checkValidPlatform($id, $platforms)
{
    for ($i = 0; $i < count($platforms); $i++) {
        if ($id == $platforms[$i]) {
            return true;
        }
    }
    return false;
}

?>