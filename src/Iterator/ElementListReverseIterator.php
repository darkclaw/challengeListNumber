<?php
/**
 *  * Created by PhpStorm.
 * User: ilopez
 * Date: 4/9/18
 * Time: 2:55 AM
 */

namespace Iterator;


/**
 * Class ElementListReverseIterator
 * @package Iterator
 */
class ElementListReverseIterator
{
    /**
     * ElementListReverseIterator constructor.
     * @param ElementList $elementList_in
     */
    public function __construct(ElementList $elementList_in) {
        $this->elementList = $elementList_in;
        $this->currentElement = $this->elementList->getElementCount() + 1;
    }

    /**
     * @return mixed|null
     */
    public function getNextElement() {
        if ($this->hasNextElement()) {
            return $this->elementList->getElement(--$this->currentElement);
        } else {
            return NULL;
        }
    }

    /**
     * @return bool
     */
    public function hasNextElement() {
        if (1 < $this->currentElement) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}