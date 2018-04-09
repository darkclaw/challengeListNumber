<?php
/**
 *  * Created by PhpStorm.
 * User: ilopez
 * Date: 4/9/18
 * Time: 6:08 AM
 */

namespace Catalog;

use Iterator\Element;
use Iterator\ElementList;
use Iterator\ElementListIterator;

/**
 * Class AbstractCatalog
 * @package Catalog
 */
abstract class AbstractCatalog
{
    /**
     * @var int
     */
    private $size = 0;

    /**
     * @var int
     */
    private $initialNumber= 1;

    /**
     * @var ElementList
     */
    private $elementList;

    /**
     * @var
     */
    private $elementIterator;

    /**
     * AbstractCatalog constructor.
     * @param $size
     */
    function __construct($size)
    {
        if (!empty($size) && !is_null($size)){
            $this->size = $size;
        }

        $this->elementList = new ElementList();
        for ($i = $this->initialNumber; $i <= $size; $i++) {
            $element = new Element($i);
            $this->elementList->addElement($element);
        }
    }

    /**
     * @return mixed
     */
    public function get() {
        return $this->getElementIterator();
    }

    /**
     * @return array
     */
    public function getArray() {
        $elementsArray = [];
        $this->elementIterator = $this->getElementIterator();
        while ($this->elementIterator->hasNextElement()) {
            $element = $this->elementIterator->getNextElement();
            $elementsArray [] = $element->getName();
        }

        return $elementsArray;
    }

    /**
     * @param $delimiter
     * @return string
     */
    public function geByDelimiter($delimiter) {
        $elementsArray = $this->getArray();
        $strElements = "";
        $count = count($elementsArray);
        foreach ($elementsArray as $key => $item){
            $strElements .= (string)$item;
            $countItem = $key +1;
            if ($count > $countItem){
                $strElements .= $delimiter;
            }
        }
        return $strElements;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return int
     */
    public function getInitialNumber()
    {
        return $this->initialNumber;
    }

    /**
     * @param int $initialNumber
     */
    public function setInitialNumber($initialNumber)
    {
        $this->initialNumber = $initialNumber;
    }

    /**
     * @return ElementList
     */
    public function getElementList()
    {
        return $this->elementList;
    }

    /**
     * @return mixed
     */
    public function getElementIterator()
    {

       return new ElementListIterator($this->getElementList());
    }

    /**
     * @param ElementList $elementList
     */
    public function setElementList($elementList)
    {
        $this->elementList = $elementList;
    }

    /**
     * @param mixed $elementIterator
     */
    public function setElementIterator($elementIterator)
    {
        $this->elementIterator = $elementIterator;
    }

}