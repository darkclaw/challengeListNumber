<?php
/**
 *  * Created by PhpStorm.
 * User: ilopez
 * Date: 4/9/18
 * Time: 1:34 AM
 */

namespace Library;

use Catalog\AbstractCatalog;
use Library\Utilities\Mapper;

/**
 * Class ListNumber
 * @package Library
 */
class ListNumber extends AbstractCatalog
{
    /**
     * @var array
     */
    private  $listNumber = [];

    /**
     * @var string
     */
    private  $titleMatchMultiple = "Match Number Multiple";

    /**
     * @var null
     */
    private $poolObject = null;

    /**
     * @param $number
     * @param $title
     * @return array
     */
    public  function changeNameOfMultiple($number, $title) {
        $this->listNumber  = [];
        $mapper = new Mapper();
        if(is_null($this->poolObject)){
            $resultPool =  $this->poolNumberMod($number, $title);
        }else{
            $resultPool =  $this->updatePoolNumberMod($number, $title);
            $this->poolObject = $resultPool;
            $resultPool = $this->updatePoolNumberMultiples();
        }

        $this->listNumber = $mapper->mapToListNumber($resultPool);
        $this->poolObject = $resultPool;

        return $this->listNumber;
    }

    /**
     * @param $number
     * @param $title
     * @return array
     */
    private function poolNumberMod($number, $title) {
        $elementIterator = $this->getElementIterator();
        $listNumber = [];

        $mapper = new Mapper();
        while ($elementIterator->hasNextElement()) {
            $element = $elementIterator->getNextElement();
            $itemNumber =  (int) $element->getName();
            if(!($itemNumber % (int) $number)){
                $listNumber [] = $mapper->mapToPoolElementNumberDto($itemNumber, (string) $number, $title);
            }else{
                $listNumber [] = $mapper->mapToPoolElementNumberDto($itemNumber, 0, $itemNumber);
            }
        }

        return $listNumber;
    }

    /**
     * @param $number
     * @param $newTitle
     * @return array
     */
    private function updatePoolNumberMod($number, $newTitle){
        $poolObject = $this->poolObject;
        $listNumber = [];
        $mapper = new Mapper();
        foreach ($poolObject as $key => $numberDto){
            if(!($numberDto->getNumber() % (int) $number)){
                $multiples = $numberDto->getMultiples();
                if($multiples == 0){
                    $multiples = $number;
                }else{
                    $multiples= $multiples.','.$number;
                }
                $listNumber [] = $mapper->mapToPoolElementNumberDto($numberDto->getNumber(), $multiples, $newTitle);
            }else{
                $listNumber [] = $numberDto;
            }
        }
        return $listNumber;
    }

    /**
     * @return array
     */
    private function updatePoolNumberMultiples(){
        $poolObject = $this->poolObject;
        $listNumber = [];
        $mapper = new Mapper();
        foreach ($poolObject as $key => $numberDto){
            $multiples = $numberDto->getMultiples();
            if($multiples == 0){
                $listNumber [] = $numberDto;
            }else{
                $count = count(explode(',',$multiples));
                if ($count > 1){
                    $numberDto->setTitle($this->getTitleMatchMultiple());
                    $listNumber [] = $numberDto;
                }else{
                    $listNumber [] = $numberDto;
                }
            }
        }
        return $listNumber;
    }

    /**
     * @return string
     */
    public function getTitleMatchMultiple()
    {
        return $this->titleMatchMultiple;
    }

    /**
     * @param string $titleMatchMultiple
     */
    public function setTitleMatchMultiple($titleMatchMultiple)
    {
        $this->titleMatchMultiple = $titleMatchMultiple;
    }

}