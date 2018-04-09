<?php
/**
 *  * Created by PhpStorm.
 * User: ilopez
 * Date: 4/9/18
 * Time: 4:59 PM
 */

namespace Library\Dto;


/**
 * Class PoolElementNumberDto
 * @package Library\Dto
 */
class PoolElementNumberDto extends AbstractDto
{
    /**
     * @var
     */
    private $number;
    /**
     * @var
     */
    private $multiples;
    /**
     * @var
     */
    private $title;

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getMultiples()
    {
        return $this->multiples;
    }

    /**
     * @param mixed $multiples
     */
    public function setMultiples($multiples)
    {
        $this->multiples = $multiples;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

}