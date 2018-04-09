<?php
/**
 *  * Created by PhpStorm.
 * User: ilopez
 * Date: 4/9/18
 * Time: 5:01 PM
 */

namespace Library\Utilities;


use Library\Dto\NumberDto;
use Library\Dto\PoolElementNumberDto;
use Library\ListNumber;

/**
 * Class Mapper
 * @package Library\Utilities
 */
class Mapper
{

    /**
     * @param $number
     * @param $multiples
     * @param $title
     * @return PoolElementNumberDto
     */
    public function mapToPoolElementNumberDto($number, $multiples, $title){
        $poolElementNumberDto = new PoolElementNumberDto();
        $poolElementNumberDto->setNumber($number);
        $poolElementNumberDto->setMultiples($multiples);
        $poolElementNumberDto->setTitle($title);
        return $poolElementNumberDto;
    }

    /**
     * @param $arrayObj
     * @return array
     */
    public function mapToListNumber($arrayObj){
        $listNumber = [];
        if(is_array($arrayObj)){
            foreach ($arrayObj as $key => $item){
                if($item instanceof PoolElementNumberDto){
                    $listNumber[] = $this->mapToNumberDto($item->getNumber(), $item->getTitle());
                }
            }
        }
        return $listNumber;
    }


    /**
     * @param $number
     * @param $title
     * @return NumberDto
     */
    public function mapToNumberDto($number, $title){
        $numberDto = new NumberDto();

        $numberDto->setNumber($number);
        $numberDto->setTitle($title);

        return $numberDto;
    }

}