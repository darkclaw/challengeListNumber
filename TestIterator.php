<?php
/**
 *  * Created by PhpStorm.
 * User: ilopez
 * Date: 4/9/18
 * Time: 3:56 AM
 */

require __DIR__ . '/vendor/autoload.php';

use Iterator\Element;
use Iterator\ElementList;
use Iterator\ElementListIterator;


$firstElement = new Element("primer elemento");
$secondElement = new Element("segundo elemento");
$thirdElement = new Element("tercer elemento");

$elements = new ElementList();
$elements->addElement($firstElement);
$elements->addElement($secondElement);
$elements->addElement($thirdElement);

writeln('Test Iterator');

$elementsIterator = new ElementListIterator($elements);

while ($elementsIterator->hasNextElement()) {
    $element = $elementsIterator->getNextElement();
    writeln($element->getName());
    writeln('');
}

function writeln($line_in) {
    echo $line_in."\n";
}