+<?php
/**
 *  * Created by PhpStorm.
 * User: ilopez
 * Date: 4/9/18
 * Time: 1:10 AM
 */


require __DIR__ . '/vendor/autoload.php';

use Library\ListNumber;

$listNumber = new ListNumber(105);
$titleMultiple = "Linianos";
$listNumber->setTitleMatchMultiple($titleMultiple);
$listNumber->changeNameOfMultiple(3, "Linio");
$listNumber = $listNumber->changeNameOfMultiple(5, "IT");

var_dump($listNumber);
