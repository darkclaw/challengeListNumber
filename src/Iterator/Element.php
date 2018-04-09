<?php
/**
 *  * Created by PhpStorm.
 * User: ilopez
 * Date: 4/9/18
 * Time: 1:57 AM
 */

namespace Iterator;


/**
 * Class Element
 * @package Iterator
 */
class Element
{
    /**
     * @var
     */
    private $name;

    /**
     * Element constructor.
     * @param $name
     */
    function __construct($name){
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->name;
    }
}