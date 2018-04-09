<?php
/**
 *  * Created by PhpStorm.
 * User: ilopez
 * Date: 4/9/18
 * Time: 5:17 PM
 */

namespace Library\Dto;


/**
 * Class NumberDto
 * @package Library\Dto
 */
class NumberDto extends AbstractDto
{
    /**
     * @var
     */
    private $number;
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