<?php
/**
 *  * Created by PhpStorm.
 * User: ilopez
 * Date: 4/9/18
 * Time: 2:09 AM
 */

namespace Iterator;


/**
 * Class ElementList
 * @package Iterator
 */
class ElementList
{
    /**
     * @var array
     */
    private $elements = array();

    /**
     * @var int
     */
    private $elementCount = 0;

    /**
     * ElementList constructor.
     */
    public function __construct() {
    }

    /**
     * @return int
     */
    public function getElementCount() {
        return $this->elementCount;
    }

    /**
     * @param $newCount
     */
    private function setElementCount($newCount) {
        $this->elementCount = $newCount;
    }

    /**
     * @param $elementNumberToGet
     * @return mixed|null
     */
    public function getElement($elementNumberToGet) {
        if ( (is_numeric($elementNumberToGet)) &&
            ($elementNumberToGet <= $this->getElementCount())) {
            return $this->elements[$elementNumberToGet];
        } else {
            return NULL;
        }
    }

    /**
     * @param Element $element_in
     * @return int
     */
    public function addElement(Element $element_in) {
        $this->setElementCount($this->getElementCount() + 1);
        $this->elements[$this->getElementCount()] = $element_in;
        return $this->getElementCount();
    }

    /**
     * @param Element $element_in
     * @return int
     */
    public function removeElement(Element $element_in) {
        $counter = 0;
        while (++$counter <= $this->getElementCount()) {
            if ($element_in->getName() == $this->elements[$counter]->getName()) {
                for ($x = $counter; $x < $this->getElementCount(); $x++) {
                    $this->elements[$x] = $this->elements[$x + 1];
                }
                $this->setElementCount($this->getElementCount() - 1);
            }
        }
        return $this->getElementCount();
    }

}

