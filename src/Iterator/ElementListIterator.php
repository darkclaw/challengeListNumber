<?php
/**
 *  * Created by PhpStorm.
 * User: ilopez
 * Date: 4/9/18
 * Time: 2:52 AM
 */

namespace Iterator;


/**
 * Class ElementListIterator
 * @package Iterator
 */
class ElementListIterator
{
    /**
     * @var ElementList
     */
    protected $elementList;

    /**
     * @var int
     */
    protected $currentElement = 0;

    /**
     * ElementListIterator constructor.
     * @param ElementList $elementList_in
     */
    public function __construct(ElementList $elementList_in) {
        $this->elementList = $elementList_in;
    }

    /**
     * @return mixed|null
     */
    public function getCurrentElement() {
        if (($this->currentElement > 0) &&
            ($this->elementList->getElementCount() >= $this->currentElement)) {
            return $this->elementList->getElement($this->currentElement);
        }
    }

    /**
     * @return mixed|null
     */
    public function getNextElement() {
        if ($this->hasNextElement()) {
            return $this->elementList->getElement(++$this->currentElement);
        } else {
            return NULL;
        }
    }

    /**
     * @return bool
     */
    public function hasNextElement() {
        if ($this->elementList->getElementCount() > $this->currentElement) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}