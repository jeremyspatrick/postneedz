<?php
function genRandStr($minLen, $maxLen, $alphaLower = 1, $alphaUpper = 1, $num = 1, $batch = 1) {
    
    $alphaLowerArray = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
    $alphaUpperArray = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    $numArray = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
    
    if (isset($minLen) && isset($maxLen)) {
        if ($minLen == $maxLen) {
            $strLen = $minLen;
        } else {
            $strLen = rand($minLen, $maxLen);
        }
        $merged = array_merge($alphaLowerArray, $alphaUpperArray, $numArray);
        
        if ($alphaLower == 1 && $alphaUpper == 1 && $num == 1) {
            $finalArray = array_merge($alphaLowerArray, $alphaUpperArray, $numArray);
        } elseif ($alphaLower == 1 && $alphaUpper == 1 && $num == 0) {
            $finalArray = array_merge($alphaLowerArray, $alphaUpperArray);
        } elseif ($alphaLower == 1 && $alphaUpper == 0 && $num == 1) {
            $finalArray = array_merge($alphaLowerArray, $numArray);
        } elseif ($alphaLower == 0 && $alphaUpper == 1 && $num == 1) {
            $finalArray = array_merge($alphaUpperArray, $numArray);
        } elseif ($alphaLower == 1 && $alphaUpper == 0 && $num == 0) {
            $finalArray = $alphaLowerArray;
        } elseif ($alphaLower == 0 && $alphaUpper == 1 && $num == 0) {
            $finalArray = $alphaUpperArray;                        
        } elseif ($alphaLower == 0 && $alphaUpper == 0 && $num == 1) {
            $finalArray = $numArray;
        } else {
            return FALSE;
        }
        
        $count = count($finalArray)-1;
        
        if ($batch == 1) {
            $str = '';
            $i = 1;
            while ($i <= $strLen) {
                $rand = rand(0, $count);
                $newChar = $finalArray[$rand];
                $str .= $newChar;
                $i++;
            }
            $result = $str;
        } else {
            $j = 1;
            $result = array();
            while ($j <= $batch) { 
                $str = '';
                $i = 1;
                while ($i <= $strLen) {
                    $rand = rand(0, $count);
                    $newChar = $finalArray[$rand];
                    $str .= $newChar;
                    $i++;
                }
                $result[] = $str;
                $j++;
            }
        }
        
        return $result;
    }
}
