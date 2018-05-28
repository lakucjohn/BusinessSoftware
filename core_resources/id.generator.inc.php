<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/12/18
 * Time: 1:40 PM
 */

$stringSet = '0000000111111122222223333333444444455555556666666777777788888889999999';
$stringSet = str_shuffle($stringSet);

function getUniqueId($length){
    global $stringSet;
    return substr($stringSet,0,$length);
}
?>